@extends('template.admin')
@section('content')
    <h3> Editar Origen Destino </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Origen Destino: {{$origen->id_origen_destino}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($origen,['method'=>'PATCH','route'=>['origen_destino.update',$origen->id_origen_destino],'files'=>'true'])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id">ID:</label>
                <input type="number" class="form-control" disable readonly value="{{$origen->id_origen_destino}}"  name="id_origen_destino">

            </div>
            
            <div class="form-group">
                <label for="origen">Origen:</label>
                <input type="text" class="form-control" value="{{$origen->origen}}"  name="origen">

            </div>
           
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" class="form-control" value="{{$origen->destino}}"  name="destino">

            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="text" class="form-control" value="{{$origen->fecha}}"  name="fecha">

            </div>

            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="text" class="form-control" value="{{$origen->hora}}"  name="hora">

            </div>

          

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" value="{{$origen->stock}}"  name="stock">

            </div>


             <div class="form-group">
                <label for="condicion">Condicion:</label>
                
                <select name="condicion" class="form-control">
                   
                            <option value="1"> Disponible </option>
                            <option value="0"> No Disponible</option>
                </select>
               
            </div>

             <div class="form-group">
                <label for="id_cooperativa">Cooperativa:</label>
                <select name="id_cooperativa" class="form-control selectpicker" data-live-search="true">
                    @foreach($cooperativas as $cooperativa)
                        @if($cooperativa->id_cooperativa==$origen->id_cooperativa)
                    <option value="{{$cooperativa->id_cooperativa}} "selected> {{$cooperativa->nombre}}</option>
                        @else
                    <option value="{{$cooperativa->id_cooperativa}} "> {{$cooperativa->nombre}}</option>
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