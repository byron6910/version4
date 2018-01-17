<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IngresoRequest;

use DB;
use Illuminate\Support\Facades\Redirect;
use App\Reserva;
use App\User;
use App\Detalle;



class ReservaController extends Controller
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
            $reservas=Reserva::where('id_reserva',$query)->orwhere('fecha_reserva',$query)->paginate(5);
            
             } 
        else{
            $reservas=Reserva::orderBy('id_reserva','desc')->paginate(10);
            $detalles=Detalle::all();
        }
                
                return view('reserva.index',['reservas'=>$reservas,'detalles'=>$detalles,'searchText'=>$query]);

        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users=User::all();
        $detalles=Detalle::all();


        return view('reserva.create',['users'=>$users,'detalles'=>$detalles]);

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngresoRequest $request)
    {
        try{
        
        DB::beginTransaction();

        $reserva=new Reserva();
       // $reserva->id_reserva=$request->get('id_reserva');
        $reserva->fecha_reserva=$request->get('fecha_reserva');  

        $reserva->hora_reserva=$request->get('hora_reserva');    

        $reserva->estado=$request->get('estado');

        $reserva->tipo_comprobante=$request->get('tipo_comprobante');


        $reserva->num_comprobante=$request->get('num_comprobante');

        
        $reserva->id=auth()->user()->id;
       
        
        $reserva->save();


        $id_origen_destino=$request->get('id_origen_destino');
        $cantidad=$request->get('cantidad');
        $precio=$request->get('precio');

        
        $cont=0;
        while($cont<$count($id_origen_destino)){
            $detalle=new Detalle();
            $detalle->id_detalle=$reserva->id_reserva;
            $detalle->id_origen_destino=$id_origen_destino[$cont];
            $detalle->cantidad=$cantidad[$cont];
            $detalle->precio=$precio[$cont];
            $detalle->save();

            $cont=$cont+1;

        
        }
        DB::commit();

        }catch(\Exception $e){
            DB::rollback();
        }

        return Redirect::to('reserva');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva=Reserva::find($id);
        $detalle=Detalle::find($id);
        
        $response=['reserva'=>$reserva];
        

        if(!$reserva){
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
        
        $reserva=Reserva::findOrFail($id);
        
        $users=User::all();
        $detalle=Detalle::find($id);
        return view('reserva.edit',['reserva'=>$reserva,'detalle'=>$detalle,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservaRequest $request, $id)
    {
        $reserva=Reserva::findOrFail($id);
       

        $reserva->fecha_reserva=$request->get('fecha_reserva');    
        $reserva->hora_reserva=$request->get('hora_reserva');    

        $reserva->estado=$request->get('estado');

        
        $reserva->id=auth()->user()->id;
       

   
        $reserva->update();
        
        return Redirect::to('reserva');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva=Reserva::findOrFail($id);
        $reserva->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('reserva');


    }
}
