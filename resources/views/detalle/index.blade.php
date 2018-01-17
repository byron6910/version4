@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Detalles Reservas <a href="detalle/create"><button>Nuevo </button></a></h3>
            @include('detalle.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Cantidad</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Precio</th>
                       
                        <th>Fecha de Reserva</th>
                        <th>Hora de reserva</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Numero</th>

                        <th>Opciones</th>
                    </thead>
                    @foreach($detalles as $detalle)
                    <tr>
                        <td> {{$detalle->id_detalle}}</td>
                        <td> {{$detalle->cantidad}}</td>
                        <td> {{$detalle->Origen_Destino->origen}}</td>
                        <td> {{$detalle->Origen_Destino->destino}}</td>
                        <td> {{$detalle->Origen_Destino->precio}}</td>
                        
                        <td> {{$detalle->Reserva->fecha_reserva}}</td>
                        <td> {{$detalle->Reserva->hora_reserva}}</td>
                        <td> {{$detalle->Reserva->estado}}</td>
                        
                        <td> {{$detalle->Reserva->id}}</td>
                        <td> {{$detalle->Reserva}}</td>

 
                        
                        <td>
                        <a href="{{URL::action('DetalleController@edit',$detalle->id_detalle)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$detalle->id_detalle}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('detalle.modal')
                    @endforeach
                </table>
            </div>
            {{$detalles->links()}}
        </div>

    </div>
@endsection