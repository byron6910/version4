<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Origen_Destino;
use App\Cooperativa;

use App\Http\Middleware\onceAuth;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests\OrigenDestinoRequest;

class OrigenDestino_Controller extends Controller
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
            // $origenes=DB::table('origen_destino')->where('origen','like','%'.$query.'%')
            // //->where ('condicion','=','1')        
            // ->orderBy('id_origen_destino','desc')
            // ->paginate(8);
           
            if($query){
                $origenes=Origen_Destino::where('id_origen_destino',$query)->orwhere('origen',$query)->paginate(5);
               
                 } 
            else{
                $origenes=Origen_Destino::orderBy('id_origen_destino','desc')->paginate(5);
            
             }

             return view('origen_destino.index',['origenes'=>$origenes,'searchText'=>$query]);
             
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
            return view('origen_destino.create',['cooperativas'=>$cooperativas]);
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(OrigenDestinoRequest $request)
        {
            $origen=new Origen_Destino();
          //  $origen->id_origen_destino=$request->get('id_origen_destino');
            $origen->origen=$request->get('origen');
            $origen->destino=$request->get('destino');
           // $origen->precio=$request->get('precio');  
            $origen->fecha=$request->get('fecha');
            $origen->hora=$request->get('hora');      
            $origen->stock=$request->get('stock');
            $origen->condicion=$request->get('condicion');
            $origen->id_cooperativa=$request->get('id_cooperativa');
         
            
            $origen->save();
    
            return Redirect::to('origen_destino');
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $origen=Origen_Destino::find($id);
            
            $response=['origen_destino'=>$origen];
            
    
            if(!$origen){
                return response()->json(['mensaje'=>'no se encontro el origen'],404);
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
            $cooperativas=Cooperativa::where('activo','1')->get();
            return view('origen_destino.edit',["origen"=>Origen_Destino::findOrFail($id),'cooperativas'=>$cooperativas]);
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(OrigenDestinoRequest $request, $id)
        {
            $origen=Origen_Destino::findOrFail($id);
         
             $origen->origen=$request->get('origen');
            $origen->destino=$request->get('destino');
       
            $origen->fecha=$request->get('fecha');
            $origen->hora=$request->get('hora');      
            $origen->stock=$request->get('stock');
            $origen->condicion=$request->get('condicion');
            $origen->id_cooperativa=$request->get('id_cooperativa');

            $origen->update();
            
            return Redirect::to('origen_destino');
            
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $origen=Origen_Destino::findOrFail($id);
            $origen->delete();
            //  $origen->condicion='0';
            //  $origen->update();
            return Redirect::to('origen_destino');
    
    
        }
    }
    