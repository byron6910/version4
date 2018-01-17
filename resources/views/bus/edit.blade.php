@extends('template.admin')
@section('content')
    <h3> Editar </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Bus: {{$bus->id_bus}} </h3>
        
            @include('Mensajes.error')

            {{!!Form::model($bus,['method'=>'PATCH','route'=>['bus.update',$bus->id_bus]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_bus">PLACA:</label>
                <input type="text" class="form-control" disable readonly value="{{$bus->id_bus}}" placeholder="Escriba Placa" name="id_bus">

            </div>
            
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" value="{{$bus->marca}}" placeholder="Escriba Marca" name="marca">

            </div>
           

            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" class="form-control" value="{{$bus->capacidad}}" placeholder="Escriba Capacidad" name="capacidad">
                
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
                        @if($cooperativa->id_cooperativa==$bus->id_cooperativa)
                    <option value="{{$cooperativa->id_cooperativa}} "selected> {{$cooperativa->nombre}}</option>
                        @else
                    <option value="{{$cooperativa->id_cooperativa}} "> {{$cooperativa->nombre}}</option>
                        @endif
                    @endforeach
                </select>
             </div>

               <div class="form-group">
                
                <label for="foto">Foto:</label>
                     <input type="file" class="form-control"  name="foto">
                    @if(($bus->foto)!="")
                        <img src="{{asset('imagenes/buses/fotos/'.$bus->foto)}}"  height="200px" width="200px">
                        <p> {{$bus->foto}}<p>
                     @endif
                
            </div>

            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection