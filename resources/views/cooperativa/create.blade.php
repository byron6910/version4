@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Cooperativa </h3>
            @include('Mensajes.error')

            {{!!Form::open(['url'=>'cooperativa','method'=>'POST','autocomplete'=>'off'])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_cooperativa">ID:</label>
                <input type="number" class="form-control" placeholder="Escriba ID" name="id_cooperativa">

            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" placeholder="Escriba Nombre" name="nombre">

            </div>

            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" placeholder="Escriba Direccion" name="direccion">

            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" placeholder="Escriba Telefono" name="telefono">

            </div>


            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" placeholder="Escriba Correo" name="correo">
                
            </div>

           <div class="form-group">
                <label for="activo">Activo:</label>
                <select name="activo" class="form-control">
                   
                            <option value="1"> NO ACTIVO </option>
                            <option value="0"> Activo</option>
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