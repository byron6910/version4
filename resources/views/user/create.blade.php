@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Horario </h3>
            @include('Mensajes.error')
         </div>
    </div>

            {{!!Form::open(['url'=>'reserva','method'=>'POST','autocomplete'=>'off'])!!}}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="id_reserva">ID Reserva:</label>
                <input type="number" class="form-control" placeholder="Escriba ID" name="id_reserva" required value="{{old('id_reserva')}}">

            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="fecha_reserva">Fecha Reserva:</label>
                <input type="date" class="form-control" placeholder="Escriba Fecha" name="fecha_reserva"  required value="{{old('fecha_reserva')}}">

            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" placeholder="Escriba Hora" name="hora" required value="{{old('hora')}}")}}>

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
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" placeholder="Escriba Cantidad" name="cantidad" required value="{{old('cantidad')}}")}}>

            </div>
            
        </div>
       

       
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="asiento">Asiento:</label>
                <input type="number" class="form-control" placeholder="Escriba Asietno" name="asiento" required value="{{old('asiento')}}")}}>

            </div>
            
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="ci">Nombre:</label>
                    <select name="ci" class="form-control">
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->ci}} "> {{$cliente->nombre.' '. $cliente->apellido}}</option>

                        @endforeach
                    </select>
                </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="id_viaje">Viaje:</label>
                    <select name="id_viaje" class="form-control">
                        @foreach($viajes as $viaje)
                        <option value="{{$viaje->id_viaje}} "> {{$viaje->id_viaje.'- '. $viaje->estado}}</option>

                        @endforeach
                    </select>
                </div>
        </div>

      
                @foreach($users as $user)
                <input type="hidden" class="form-control" name="name" disable readonly value="{{$user->name}}")}}>
                @endforeach
          
            
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

        </div>

    </div>
            
            

            {!!Form::close()!!}
       
@endsection