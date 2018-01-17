<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'code_number' => 'required',
            'phone_number' => 'required|numeric|digits:9',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|min:1',
            
            
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['confirmation_code']=str_random(25);
        $user= User::create([
            'name' => $data['name'],
            'phone_number'=>$data['phone_number'],
            'code_number'=>$data['code_number'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
        
            'confirmation_code'=>$data['confirmation_code']
            
           
        ]);
//enviar correo

        Mail::send('email.confirmar',$data,function($message) use ($data){
    
            $message->from('bralvarezm@gmail.com','Prueba');
            $message->to($data['email'],$data['name'])->subject('Confirma tu correo');
            
        });
        return "Tu correo ha sido enviado";
    

        return $user;
    }

    public function verify($code){
        $user=User::where('confirmation_code',$code)->first();
        if(! $user){
            return redirect('/');
        }
        $user->confirmed=true;
        $user->confirmation_code="null";
        $user->save();

       return redirect('/login')->with('notificacion','has confirmado tu correo');
    }

    
}
