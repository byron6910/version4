<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Detalle_Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Detalle;
use App\Reserva;
use App\Origen_Destino;


class DetalleController extends Controller
{
     public function __construct(){
         $this->middleware('admin1',['only'=>['index','store','update','destroy']]);
      }

    public function index(Request $request)
    {
        if($request){
        $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
        // $reservas=DB::table('reserva as r')
        // ->join('clientes as c','c.ci','=','r.ci')
        // ->join('viaje as v','v.id_viaje','=','r.id_viaje')
        // ->join('users as u','u.id','=','r.id')
        
        // ->select('r.id_reserva','r.fecha_reserva','r.estado','r.cantidad','r.asiento',DB::raw('CONCAT(c.nombre," ",c.apellido) as Nombre') ,'c.telefono as telefono','v.id_viaje as id_viaje','u.name as id')
        // ->where('r.estado','like','%'.$query.'%')
         
        // ->orderBy('id_reserva','desc')
        // ->paginate(8);
        if($query){
            $detalles=Detalle::where('id_detalle',$query)->orwhere('id_origen_destino',$query)->paginate(5);
             } 
        else{
            $detalles=Detalle::orderBy('id_detalle','desc')->paginate(10);
        
               
         
         }
            return view('detalle.index',['detalles'=>$detalles,'searchText'=>$query]);


       
        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $origenes=Origen_Destino::all();
       $reservas=Reserva::all();

        return view('detalle.create',['origenes'=>$origenes,'reservas'=>$reservas]);

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Detalle_Request $request)
    {
        $detalle=new Detalle();
      //  $detalle->id_detalle=$request->get('id_detalle');
        $detalle->cantidad=$request->get('cantidad');     
        $detalle->precio=$request->get('precio');     
        $detalle->id_origen_destino=$request->get('id_origen_destino');
        $detalle->id_reserva=$request->get('id_reserva');
        
        
    
        $detalle->save();

        return Redirect::to('detalle');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle=Detalle::find($id);
        
        $response=['detalle'=>$detalle];
        

        if(!$detalle){
            return response()->json(['mensaje'=>'no se encontro el reserva'],404);
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
        
       $detalle=Detalle::findOrFail($id); 
        $origenes=Origen_Destino::all();
       $reservas=Reserva::all();

        
        return view('detalle.edit',['detalle'=>$detalle,'origenes'=>$origenes,'reservas'=>$reservas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Detalle_Request $request, $id)
    {
        $detalle=Detalle::findOrFail($id);
        $detalle->cantidad=$request->get('cantidad');        
        $detalle->id_origen_destino=$request->get('id_origen_destino');
        $detalle->id_reserva=$request->get('id_reserva');
        
   
        $detalle->update();
        
        return Redirect::to('detalle');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle=Detalle::findOrFail($id);
        $detalle->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('detalle');


    }


}
