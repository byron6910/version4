@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de ingreso <a href="ingreso/create"><button>Nuevo </button></a></h3>
            @include('ingreso.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Fecha de ingreso </th>
                        <th>Hora  de ingreso</th>
                        <th>Estado</th>
                        <th>Impuesto</th>
                       
                        
                        <th>Creado por Usuario </th>    
                        <th>Opciones</th>
                    </thead>
                    @foreach($ingresos as $ingreso)
                    <tr>
                        <td> {{$ingreso->id_ingreso}}</td>
                        <td> {{$ingreso->fecha_ingreso}}</td>
                        <td> {{$ingreso->hora_ingreso}}</td>
                        <td> {{$ingreso->estado}}</td>
                        <td> {{$ingreso->impuesto}}</td>
             
                        
                        
                   
                    
                        <td> {{$ingreso->user->name}}</td>
                        
                        <td>
                        <a href="{{URL::action('IngresoController@edit',$ingreso->id_ingreso)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$ingreso->id_ingreso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('ingreso.modal')
                    @endforeach
                </table>
            </div>
            {{$ingresos->render()}}
        </div>

    </div>
@endsection