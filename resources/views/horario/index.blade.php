@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Horarios <a href="horario/create"><button>Nuevo </button></a></h3>
            @include('horario.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Fecha</th>
                        <th>Hora</th>
                                           
                        <th>Opciones</th>
                    </thead>
                    @foreach($horarios as $horario)
                    <tr>
                        <td> {{$horario->id_horario}}</td>
                        <td> {{$horario->fecha_horario}}</td>
                        <td> {{$horario->hora}}</td>
                    
                        
                        <td>
                         <a href="{{URL::action('HorariosController@show',$horario->id_horario)}}"><button class="btn btn-info">Ver</button></a>
                        <a href="{{URL::action('HorariosController@edit',$horario->id_horario)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$horario->id_horario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('horario.modal')
                    @endforeach
                </table>
            </div>
            {{ $horarios->links() }}
        </div>

    </div>
@endsection