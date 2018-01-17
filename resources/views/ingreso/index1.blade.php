@extends('layouts.app')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Reserva <a href="reserva/create"><button>Nuevo </button></a></h3>
            @include('reserva.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Fecha de Reserva </th>
                        <th>Estado</th>
                        <th>Numero de Asientos</th>
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Telefono</th>    
                        <th>Id Viaje</th>   
                        <th>Editado por Usuario </th>    
                        <th>Opciones</th>
                    </thead>
                    @foreach($reservas as $reserva)
                    <tr>
                        <td> {{$reserva->id_reserva}}</td>
                        <td> {{$reserva->fecha_reserva}}</td>
                        <td> {{$reserva->estado}}</td>
                        <td> {{$reserva->asiento}}</td>
                        <td> {{$reserva->cantidad}}</td>
                        <td> {{$reserva->cliente->nombre}}</td>
                        <td> {{$reserva->cliente->telefono}}</td>                        
                        <td> {{$reserva->viaje->id_viaje}}</td>
                        <td> {{$reserva->user->name}}</td>
                       
                        
                        <td>
                        <a href="{{URL::action('ReservaController@edit',$reserva->id_reserva)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$reserva->id_reserva}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('reserva.modal')
                    @endforeach
                </table>
            </div>
            {{ $reservas->links() }}
        </div>

    </div>
@endsection