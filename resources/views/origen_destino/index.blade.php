@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Origen Destino <a href="origen_destino/create"><button>Nuevo </button></a></h3>
            @include('origen_destino.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        
                        <th>Stock</th>
                         <th>Condicion</th>
                         <th>Cooperativa</th>
                         <th>Telefono_Cooperativa</th>
                         <th>Correo_Cooperativa</th>
                        
                        <th>Opciones</th>
                    </thead>
                    @foreach($origenes as $origen)
                    <tr>
                        <td> {{$origen->id_origen_destino}}</td>
                        <td> {{$origen->origen}}</td>
                        <td> {{$origen->destino}}</td>
                        <td> {{$origen->fecha}}</td>
                        <td> {{$origen->hora}}</td>
                       
                        <td> {{$origen->stock}}</td>
                        <td> {{$origen->condicion}}</td>
                        <td> {{$origen->cooperativa->nombre}}</td>
                        <td> {{$origen->cooperativa->telefono}}</td>
                        <td> {{$origen->cooperativa->correo}}</td>


                        
                        <td>
                        <a href="{{URL::action('OrigenDestino_Controller@edit',$origen->id_origen_destino)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$origen->id_origen_destino}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('origen_destino.modal')
                    @endforeach
                </table>
            </div>
            {{$origenes->links()}}
        </div>

    </div>
@endsection