@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Cooperativa <a href="cooperativa/create"><button>Nuevo </button></a></h3>
            @include('cooperativa.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                       

                        <th>Opciones</th>
                    </thead>
                    @foreach($cooperativas as $cooperativa)
                    <tr>
                        <td> {{$cooperativa->id_cooperativa}}</td>
                        <td> {{$cooperativa->nombre}}</td>
                        <td> {{$cooperativa->direccion}}</td>
                        <td> {{$cooperativa->telefono}}</td>
                        <td> {{$cooperativa->correo}}</td>
                        <td> {{$cooperativa->activo}}</td> 
            
                        
                        <td>
                        <a href="{{URL::action('Cooperativa_Controller@edit',$cooperativa->id_cooperativa)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$cooperativa->id_cooperativa}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('cooperativa.modal')
                    @endforeach
                </table>
            </div>
            {{$cooperativas->links()}}
        </div>

    </div>
@endsection