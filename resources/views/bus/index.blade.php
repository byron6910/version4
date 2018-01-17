@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Buses <a href="bus/create"><button>Nuevo </button></a></h3>
            @include('bus.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Matricula </th>
                        <th>Marca</th>
                        <th>Capacidad</th>
                        <th>Condicion</th>
                        <th>Cooperativa</th>
                        <th>Foto_Bus</th>

                        <th>Opciones</th>
                    </thead>
                    @foreach($buses as $bus)
                    <tr>
                        <td> {{$bus->id_bus}}</td>
                        <td> {{$bus->marca}}</td>
                        <td> {{$bus->capacidad}}</td>
                        <td> {{$bus->condicion}}</td>
                        <td> {{$bus->cooperativa->nombre}}</td>
                        <td> 
                            <img src="{{asset('imagenes/buses/fotos/'.$bus->foto)}}" alt="{{$bus->foto}}" 
                             height="100px" width="100px" class="img-thumbnail">
                        </td>
                        
                        <td>
                        <a href="{{URL::action('BusController@edit',$bus->id_bus)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$bus->id_bus}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('bus.modal')
                    @endforeach
                </table>
            </div>
            {{$buses->render()}}
        </div>

    </div>
@endsection