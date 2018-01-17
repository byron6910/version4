<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Cooperativa;

use App\Http\Requests\BusRequest;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('admin1',['only'=>['index','store','update','destroy']]);
      }
    public function index(Request $request)
    {
       if($request){
              $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
     
              if($query){
                $buses=Bus::where('id_bus',$query)->orwhere('estado',$query)->paginate(5);
                
                 } 
            else
                $buses=Bus::orderBy('id_bus','desc')->paginate(5);
                
                return view('bus.index',['buses'=>$buses,'searchText'=>$query]);
             
              }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       $cooperativas=Cooperativa::where('activo','1')->get();
        
        return view('bus.create',['cooperativas'=>$cooperativas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusRequest $request)
    {
        $bus=new Bus();
        $bus->id_bus=$request->get('id_bus');
        $bus->marca=$request->get('marca');
        $bus->capacidad=$request->get('capacidad');
        $bus->condicion=$request->get('condicion');        
        $bus->id_cooperativa=$request->get('id_cooperativa');
        $bus->foto=$request->get('foto');

         if(Input::hasFile('foto')){
                 $file=Input::file('foto');
                 
                 $file->move(public_path().'/imagenes/buses/fotos',$file->getClientOriginalName());

                 $bus->foto=$file->getClientOriginalName();
             }//subir archivo de foto al servidor


        
        $bus->save();

        return Redirect::to('bus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus=Bus::find($id);
        
        $response=['bus'=>$bus];
        

        if(!$bus){
            return response()->json(['mensaje'=>'no se encontro el bus'],404);
        }

        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $bus=Bus::findOrFail($id);
    
      $cooperativas=Cooperativa::where('activo','1')->get();
        

       
        return view('bus.edit',["bus"=>$bus,'cooperativas'=>$cooperativas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusRequest $request, $id)
    {
        $bus=Bus::findOrFail($id);
        $bus->marca=$request->get('marca');
        $bus->capacidad=$request->get('capacidad');
        $bus->condicion=$request->get('condicion');                
        $bus->id_cooperativa=$request->get('id_cooperativa');

         if(Input::hasFile('foto')){
                 $file=Input::file('foto');
                 $file->move(public_path().'/imagenes/buses/fotos',$file->getClientOriginalName());
                 $bus->foto=$file->getClientOriginalName();
             }//subir archivo de foto al servidor


        $bus->update();
        
        return Redirect::to('bus');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus=Bus::findOrFail($id);
        $bus->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('bus');


    }
}
