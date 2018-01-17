<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CooperativaRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;

use App\Cooperativa;

use DB;


class Cooperativa_Controller extends Controller
{
    public function __construct(){
        $this->middleware('admin1',['only'=>['index','store','update','destroy']]);
       }
      public function index(Request $request)
      {
          if($request){
              $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
              // $cooperativas=DB::table('cooperativa')->where('nombre','like','%'.$query.'%')
              // //->where ('condicion','=','1')        
              // ->orderBy('id_cooperativa','desc')
              // ->paginate(8);
              if($query){
                $cooperativas=Cooperativa::where('id_cooperativa',$query)->orwhere('nombre',$query)->paginate(5);
                
                 } 
            else
                $cooperativas=Cooperativa::orderBy('id_cooperativa','DESC')->paginate(5);
                
                return view('cooperativa.index',['cooperativas'=>$cooperativas,'searchText'=>$query]);
             
             
              
              
              }
          }
      
          /**
           * Show the form for creating a new resource.
           *
           * @return \Illuminate\Http\Response
           */
          public function create()
          {
          
              return view('cooperativa.create');
          

          }
      
          /**
           * Store a newly created resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @return \Illuminate\Http\Response
           */
          public function store(CooperativaRequest $request)
          {
              $cooperativa=new Cooperativa();
              $cooperativa->id_cooperativa=$request->get('id_cooperativa');
              $cooperativa->nombre=$request->get('nombre');
              $cooperativa->direccion=$request->get('direccion');
              $cooperativa->telefono=$request->get('telefono');        
              $cooperativa->correo=$request->get('correo');
              $cooperativa->activo=$request->get('activo');
      
              $cooperativa->save();
      
              return Redirect::to('cooperativa');
          }
      
          /**
           * Display the specified resource.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function show($id)
          {
              $cooperativa=cooperativa::find($id);
              
              $response=['cooperativa'=>$cooperativa];
              
      
              if(!$cooperativa){
                  return response()->json(['mensaje'=>'no se encontro el cooperativa'],404);
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
            

              return view('cooperativa.edit',["cooperativa"=>Cooperativa::findOrFail($id)]);
          }
      
          /**
           * Update the specified resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function update(CooperativaRequest $request, $id)
          {
              $cooperativa=Cooperativa::findOrFail($id);
           
              $cooperativa->nombre=$request->get('nombre');
              $cooperativa->direccion=$request->get('direccion');
              $cooperativa->telefono=$request->get('telefono');        
              $cooperativa->correo=$request->get('correo');
              $cooperativa->activo=$request->get('activo');
    
  
              $cooperativa->update();
              
              return Redirect::to('cooperativa');
              
          }
      
          /**
           * Remove the specified resource from storage.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function destroy($id)
          {
              $cooperativa=Cooperativa::findOrFail($id);
              $cooperativa->delete();
              //  $cooperativa->condicion='0';
              //  $cooperativa->update();
              return Redirect::to('cooperativa');
      
      
          }
      }