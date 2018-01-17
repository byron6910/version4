<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use App\Http\Requests;
use App\User;
use App\Http\Requests\UserRequest;
use Auth;
use Authy\AuthyApi as AuthyApi;
use DB;
use Hash;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Support\MessageBag;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    //
    public function profile(){

        return view('profile',['user'=>Auth::user()]);
    }

    public function update_profile(Request $request ){
        
        if($request->hasFile('foto')){
            
            $foto=$request->file('foto');
            $user=Auth::user();
            $extension=$user->name.'.'.$foto->getClientOriginalExtension();
            Image::make($foto)->resize(200,200)->save(public_path('imagenes/usuarios/fotos/'.$extension));
           
            $user->foto=$extension;
            $user->save();

    
    }
    return view('profile',['user'=>Auth::user()]);
    }

    public function index(Request $request){
        if($request){
        $query=trim($request->get('searchText'));
        $filtrar=$request->get('filtrar');


      if($query){
        $users=User::where('id',$query)->orwhere('name',$query)->paginate(5);
         }
        if($filtrar)
        $users=User::where('tipo',$filtrar)->paginate(5);

    else{
        $users=User::orderBy('id','desc')->paginate(5);

        }
     
     }
      
        return view('user.index',['users'=>$users,'searchText'=>$query,'filtrar'=>$filtrar]);
        
        
    }


    public function edit($id)
    {
        
        $user=User::findOrFail($id);
        
        return view('user.edit',['user'=>$user]);
    }


    public function update(UserRequest $request, $id)
    {
        $user=User::findOrFail($id);

        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=$request->get('password');        
        $user->phone_number=$request->get('phone_number');
        $user->country_code=$request->get('country_code');
        $user->tipo=$request->get('tipo');
        $user->ciudad=$request->get('ciudad');
        $user->calle=$request->get('calle');
        $user->postal=$request->get('postal');
        $user->foto=$request->get('foto');


       
    
        
   
        $user->update();
        
        return Redirect::to('user/index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('user/index');


    }






    public function createNewUser(Request $request, AuthyApi $authyApi)
    {
        $this->validate(
            $request, [
                'name' => 'required|string',
                'email' => 'required|unique:users',
                'password' => 'required',
                'country_code' => 'required',
                'phone_number' => 'required|numeric',

                'ciudad' => 'required|string|max:255',
                 'calle' => 'required|string|max:255',
                 'postal' => 'required|max:255',
                 'tipo'=>'required|in:administrador,cliente,conductor',
                 'foto'=>'required'
            ]
        );

        //$values = $request->only('name','email','password','country_code','phone_number');
        $values = $request->all();

        $values['password'] = Hash::make($values['password']);

        DB::beginTransaction();

        $newUser = new User($values);
        $newUser->save();
        Auth::login($newUser);

        $authyUser = $authyApi->registerUser(
            $newUser->email,
            $newUser->phone_number,
            $newUser->country_code
        );
        if ($authyUser->ok()) {
            $newUser->authy_id = $authyUser->id();
            $newUser->save();
            $request->session()->flash(
                'status',
                "User created successfully"
            );

            $sms = $authyApi->requestSms($newUser->authy_id);
            DB::commit();
            return redirect()->route('user-show-verify');
        } else {
            $errors = $this->getAuthyErrors($authyUser->errors());
            DB::rollback();
            return view('newUser', ['errors' => new MessageBag($errors)]);
        }
    }

    /**
     * This controller function shows the current user status
     *
     * @param Authenticatable $user Current user
     * @return mixed Response view
     */
    public function show(Authenticatable $user)
    {
        return view('showUser', ['user' => $user]);
    }

    /**
     * This controller function handles the submission form
     *
     * @param Request $request Current User Request
     * @param Authenticatable $user Current User
     * @param AuthyApi $authyApi Authy Client
     * @return mixed Response view
     */
    public function verify(Request $request, Authenticatable $user,
                           AuthyApi $authyApi, Client $client)
    {
        $token = $request->input('token');
        $verification = $authyApi->verifyToken($user->authy_id, $token);

        if ($verification->ok()) {
            $user->verified = true;
            $user->save();
            $this->sendSmsNotification($client, $user);

            return redirect()->route('user-index');
        } else {
            $errors = $this->getAuthyErrors($verification->errors());
            return view('verifyUser', ['errors' => new MessageBag($errors)]);
        }
    }

    public function Postverify(Request $request){

        $auth=Auth::user();
        $user=User::findOrFail($auth->id);
        $user->ciudad=$request->get('ciudad');
        $user->calle=$request->get('calle');        
        $user->postal=$request->get('postal');
        $user->foto=$request->get('foto');
        $user->role=$request->get('role');

        $user->save();
        
        return view('home');

    }

    /**
     * This controller function handles the verification code resent
     *
     * @param Request $request Current User Request
     * @param Authenticatable $user Current User
     * @param AuthyApi $authyApi Authy Client
     * @return mixed Response view
     */
    public function verifyResend(Request $request, Authenticatable $user,
                                 AuthyApi $authyApi)
    {
        $sms = $authyApi->requestSms($user->authy_id);

        if ($sms->ok()) {
            $request->session()->flash(
                'status',
                'Verification code re-sent'
            );
            return redirect()->route('user-show-verify');
        } else {
            $errors = $this->getAuthyErrors($sms->errors());
            return view('verifyUser', ['errors' => new MessageBag($errors)]);
        }
    }

    private function getAuthyErrors($authyErrors)
    {
        $errors = [];
        foreach ($authyErrors as $field => $message) {
            array_push($errors, $field . ': ' . $message);
        }
        return $errors;
    }

    private function sendSmsNotification($client, $user)
    {
        $twilioNumber = config('services.twilio')['number'] or die(
            "TWILIO_NUMBER is not set in the environment"
        );
        $messageBody = 'You did it! Signup complete :)';

        $client->messages->create(
            $user->fullNumber(),    // Phone number which receives the message
            [
                "from" => $twilioNumber, // From a Twilio number in your account
                "body" => $messageBody
            ]
        );
    }




}