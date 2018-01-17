@extends('template.admin')
@section('content')
    <h3> Editar detalle </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar detalle: {{$detalle->id_detalle}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($detalle,['method'=>'PATCH','route'=>['detalle.update',$detalle->id_detalle]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_detalle">ID:</label>
                <input type="number" class="form-control" disable readonly value="{{$detalle->id_detalle}}"  name="id_detalle">

            </div>
            
      

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" value="{{$detalle->cantidad}}" placeholder="Escriba Cantidad" name="cantidad">

            </div>




             <div class="form-group">
                <label for="origen">Origen:</label>
                <select name="id_origen_destino" class="form-control">
                    @foreach($origenes as $origen)
                        @if($detalle->id_origen_destino==$origen->id_origen_destino)
                    <option value="{{$origen->id_origen_destino}} "selected> {{$origen->origen.'-'.$origen->destino}}</option>
                        @else
                    <option value="{{$origen->id_origen_destino}} "> {{$origen->origen.'-'.$origen->destino}}</option>
                        @endif
                    @endforeach
                </select>
             </div>




             <div class="form-group">
                <label for="reserva">Reserva:</label>
                <select name="id_reserva" class="form-control">
                    @foreach($reservas as $reserva)
                        @if($detalle->id_reserva==$reserva->id_reserva)
                    <option value="{{$reserva->id_reserva}} "selected> {{$reserva->id}}</option>
                        @else
                    <option value="{{$reserva->id_reserva}} "> {{$reserva->id}}</option>
                        @endif
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