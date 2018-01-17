@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Bus </h3>
            @include('Mensajes.error')

            {{!!Form::open(['url'=>'bus','method'=>'POST','autocomplete'=>'off','files'=>'true'])!!}}
            {{Form::token()}}

     

            <div class="form-group">
                <label for="id_bus">PLACA:</label>
                <input type="text" class="form-control" value="{{old('id_bus')}}" placeholder="Escriba Placa" name="id_bus">

            </div>
 

            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" placeholder="Escriba Nombre" value="{{old('marca')}}" name="marca">

            </div>

  
            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" class="form-control" placeholder="Escriba Capacidad" value="{{old('capacidad')}}" name="capacidad">
                
            </div>
   

            <div class="form-group">
                <label for="condicion">Condicion:</label>
                <select name="condicion" class="form-control">
                   
                            <option value="1"> En circulacion </option>
                            <option value="0"> En mantenimiento</option>
                    </select>

            </div>

                 <div class="form-group">
                     <label for="id_cooperativa">Cooperativa:</label>
                        <select name="id_cooperativa" class="form-control selectpicker" data-live-search="true">
                     @foreach($cooperativas as $cooperativa)
                            <option value="{{$cooperativa->id_cooperativa}} "> {{$cooperativa->nombre}}</option>

                     @endforeach

                     
                        </select>
                 </div>

                  <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" class="form-control"  name="foto">
                  </div>
          

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@endsection