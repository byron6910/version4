@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Reserva </h3>
            @include('Mensajes.error')
         </div>
    </div>

            {{!!Form::open(['url'=>'reserva','method'=>'POST','autocomplete'=>'off'])!!}}
            {{Form::token()}}
    <div class="row">
      
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="fecha_reserva">Fecha Reserva:</label>
                <input type="date" class="form-control" placeholder="Escriba Fecha" name="fecha_reserva"  required value="{{old('fecha_reserva')}}">

            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" placeholder="Escriba Hora" name="hora_reserva" required value="{{old('hora_reserva')}}")}}>

            </div>
            
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control">
                        
                        <option value="0"> No Disponible</option>
                        <option value="1 "> Disponible</option>


                    </select>
                </div>
        </div> 


      

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="id">Nombre:</label>
                    <select name="id" class="form-control selectpicker" id="id" data-live-search="true">
                        @foreach($users as $user)
                        <option value="{{$user->id}} "> {{$user->id.'- '. $user->name}}</option>

                        @endforeach
                    </select>
                </div>
        </div>

    </div>

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-body">
                     <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                            <div class="form-group">
                               <label for="id">Origen Destino:</label>
                                 <select name="pid_origen_destino" class="form-control selectpicker" id="pid_origen_destino" data-live-search="true">
                                  @foreach($detalles as $detalle)
                                 <option value="{{$detalle->id_origen_destino}} "> {{$detalle->Origen_Destino->origen.'- '. $detalle->Origen_Destino->destino}}</option>

                                  @endforeach
                                 </select>

                            </div>
                     </div>
                     <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                         <div class="form-group">
                         <label for="cantidad">Cantidad:</label>
                          <input type="number" class="form-control" placeholder="Escriba Cantidad" name="pcantidad" id="pcantidad">

                         </div>
                    </div>

                       <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                         <div class="form-group">
                         <label for="precio">Precio:</label>
                          <input type="number" class="form-control" placeholder="Escriba Cantidad" name="pprecio" id="pprecio">

                         </div>
                    </div>

                      <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
                         <div class="form-group">

                          <button class="btn btn-primary" type="button" id="bt_add">Agregar</button>

                         </div>
                    </div>

                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                         <table id="detalles" class="table table-bordered table-striped table-condensed table-hover ">

                            <thead style="background-color: #A9D0F5">
                                <th>Opciones</th>
                                <th>Origen-Destino</th>
                                <th>Cantidad</th>
                                <th>Precio Compra</th>

                            </thead>

                            <tfoot>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><h4 id="total">$0.00 </h4></th>

                            </tfoot>
                            <tbody>
                                
                            </tbody>
                         </table>

                    </div>

                </div>
            </div>


    
        </div>
        

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
             <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token() }}">

                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

        </div>

  
            
            

            {!!Form::close()!!}

@push ('scripts')
    <script >

        $(document).ready(function(){
            $('#bt_add').click(function(){
                agregar();
            });
        });

        var cont=0;
        total=0;
        subtotal=[];

        $("#guardar").hide();

        function agregar(){
            id_origen_destino=$("#pid_origen_destino").val();
            origen_destino=$("#pid_origen_destino option:selected").text();
            cantidad=$('#pcantidad').val();
            precio=$('#pprecio').val();

            if(id_origen_destino!="" && cantidad!="" &&cantidad>0 &&precio!="" ){
                subtotal[cont]=(cantidad*precio);
                total=total+subtotal[cont];

                var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button</td><td><input type="hidden" name="id_origen_destino[]" value="'+id_origen_destino+'">'+origen_destino+'</td> <td><input type="number" name="cantidad[]" value="'+cantidad+'"></td> <td><input type="number" name="precio[]" value="'+precio+'"></td><td>'+subtotal[cont]+'</td> </tr>';
                cont++;
                limpiar();
                $("#total").html("$"+total);
                evaluar();
                $('#detalles').append(fila);

            }else 
            {
                alert("Error revise los datos");
            }
        }

        function limpiar(){
            $("#pid_origen_destino").val("");
            $("#pcantidad").val("");
            $("#pprecio").val("");

        }

        function evaluar(){
            if(total>0){
                $("#guardar").show();
            }
            else{
                $("#guardar").hide();
            }
        }

        function eliminar(index){
            total=total-subtotal[index];
            $("#total").html("$"+total);
            $("#fila"+index).remove();
            evaluar();
        }

    </script>
@endpush
       
@endsection