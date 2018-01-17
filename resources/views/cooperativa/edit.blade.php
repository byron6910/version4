@extends('template.admin')
@section('content')
    <h3> Editar Cooperativa </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Cooperativa: {{$cooperativa->id_cooperativa}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($cooperativa,['method'=>'PATCH','route'=>['cooperativa.update',$cooperativa->id_cooperativa]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_cooperativa">ID:</label>
                <input type="number" class="form-control" disable readonly value="{{$cooperativa->id_cooperativa}}"  name="id_cooperativa">

            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" value="{{$cooperativa->nombre}}"  name="nombre">

            </div>
           
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" value="{{$cooperativa->direccion}}"  name="direccion">

            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" value="{{$cooperativa->telefono}}" placeholder="Escriba Nombre" name="telefono">

            </div>



            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" disable readonly value="{{$cooperativa->correo}}" placeholder="Escriba Correo" name="correo">
                
            </div>

             <div class="form-group">
                <label for="activo">Activo:</label>
                <select name="activo" class="form-control">
                   
                            <option value="0"> NO ACTIVO </option>
                            <option value="1"> Activo</option>
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