<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\IngresoRequest;

use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;

use App\Ingreso;
use App\User;
use App\Origen_Destino;
use App\Detalle_Ingreso;


use Carbon\Carbon;
use Response;

class IngresoController extends Controller
{
     public function __construct(){
         $this->middleware('admin1',['only'=>['index','store','update','destroy']]);
      }

    public function index(Request $request)
    {
        if($request){
        $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final

        if($query){
            $ingresos=Ingreso::where('id_ingreso',$query)->orwhere('fecha_ingreso',$query)->paginate(5);
            
             } 
        else{
            $ingresos=Ingreso::orderBy('id_ingreso','desc')->paginate(10);
            
        }
            $detalles=Detalle_Ingreso::all();    

                return view('ingreso.index',['ingresos'=>$ingresos,'detalles'=>$detalles,'searchText'=>$query]);

        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users=User::where('verified','1')->get();
        $detalles=Detalle_Ingreso::all();
       // $origen_destinos=Origen_Destino::all();

        return view('ingreso.create',['users'=>$users,'detalles'=>$detalles]);

    
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

        $ingreso=new Ingreso();
       // $ingreso->id_ingreso=$request->get('id_ingreso');
        $date=Carbon::now('America/Guayaquil');
        //$fecha = $date->format('Y-m-d');


        $ingreso->fecha_ingreso=$date->toDateTimeString();  

//$date->hour.$date->minute;
      

        $ingreso->estado=$request->get('estado');

        $ingreso->impuesto=$request->get('impuesto');
     

        
        $ingreso->id=auth()->user()->id;
       
        
        $ingreso->save();


        $id_origen_destino=$request->get('id_origen_destino');
        $cantidad=$request->get('cantidad');
        $precio_compra=$request->get('precio_compra');
        $precio_venta=$request->get('precio_venta');

        
        $cont=0;
        while($cont<$count($id_origen_destino)){
            $detalle=new Detalle_Ingreso();
            $detalle->id_detalle_ingreso=$ingreso->id_ingreso;
            $detalle->id_origen_destino=$id_origen_destino[$cont];
            $detalle->cantidad=$cantidad[$cont];
            $detalle->precio_compra=$precio_compra[$cont];
            $detalle->precio_venta=$precio_venta[$cont];

            $detalle->save();

            $cont=$cont+1;

        
        }
        DB::commit();

        }catch(\Exception $e){
            DB::rollback();
        }

        return Redirect::to('ingreso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso=Ingreso::find($id);
        $detalle=Detalle_Ingreso::find($id);
        
        $response=['ingreso'=>$ingreso];
        

        if(!$ingreso){
            return response()->json(['mensaje'=>'no se encontro el ingreso'],404);
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
        
        $ingreso=ingreso::findOrFail($id);
        
        $users=User::all();
        $detalle=Detalle::find($id);
        return view('ingreso.edit',['ingreso'=>$ingreso,'detalle'=>$detalle,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngresoRequest $request, $id)
    {
        $ingreso=ingreso::findOrFail($id);
       

        $ingreso->fecha_ingreso=$request->get('fecha_ingreso');    
        $ingreso->hora_ingreso=$request->get('hora_ingreso');    

        $ingreso->estado=$request->get('estado');

        
        $ingreso->id=auth()->user()->id;
       

   
        $ingreso->update();
        
        return Redirect::to('ingreso');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('ingreso');


    }
}
