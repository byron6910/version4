@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo detalle </h3>
            @include('Mensajes.error')

            {{!!Form::open(['url'=>'detalle','method'=>'POST','autocomplete'=>'off'])!!}}
            {{Form::token()}}

            
          
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" placeholder="Escriba Cantidad" name="pcantidad" id="pcantidad">

            </div>

         
            <div class="form-group">
                <label for="id_origen_destino">Origen-Destino:</label>
                <select name="pid_origen_destino" class="form-control selectpicker" data-live-search="true" id=pid_origen_destino>
                     @foreach($origenes as $origen)
                            <option value="{{$origen->id_origen_destino}} "> {{$origen->origen.' - '.$origen->destino}}</option>

                     @endforeach

                     
                </select>
             
              </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                     <label for="id_reserva">Reserva:</label>
                        <select name="id_reserva" class="form-control selectpicker" data-live-search="true">
                     @foreach($reservas as $reserva)
                            <option value="{{$reserva->id_reserva}} "> {{$reserva->id_reserva}}</option>

                     @endforeach

                     
                        </select>
                 </div>

            
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection