@extends('template.admin')
@section('content')
    <h3> reserva </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar reserva: {{$reserva->id_reserva}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($reserva,['method'=>'PATCH','route'=>['reserva.update',$reserva->id_reserva]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_reserva">ID reserva:</label>
                <input type="number" class="form-control" disable readonly value="{{$reserva->id_reserva}}"  name="id_reserva">

            </div>
            
          
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label for="fecha_reserva">Fecha Reserva:</label>
                <input type="date" class="form-control" value="{{$reserva->fecha_reserva}}" name="fecha_reserva"  required>

             </div>
            </div>

          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label for="hora_reserva">Hora Reserva:</label>
                <input type="time" class="form-control" value="{{$reserva->hora_reserva}}" name="hora_reserva"  required>

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
                    <select name="id" class="form-control selectpicker" data-live-search="true">
                        @foreach($users as $user)
                        @if($user->id==$reserva->id)
                        <option value="{{$user->id}} " selected> {{$user->nombre.' '. $user->id}}</option>
                        @else
                        <option value="{{$user->id}} " > {{$user->name.' '. $user->id}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
        </div>


    
             
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

           

            {!!Form::close()!!}
        </div>
    </div>
@endsection