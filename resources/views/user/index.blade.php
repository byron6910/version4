@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Lista de Usuarios <a href="/user/new"><button>Nuevo </button></a></h3>
            @include('user.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID </th>
                        <th>Nombre </th>
                        <th>Correo</th>
                        <th>Codigo</th>
                        <th>Telefono</th> 
                        <th>Tipo</th> 

                        <th>Ciudad</th>  
                        <th>Calle</th>  
                        <th>Postal</th> 
                        <th>Foto</th>  

                        <th>Password</th>  

                        <th>Verificado</th> 
                        <th>Activo hasta</th> 
                                          
                        <th>Opciones</th>
                    </thead>
                    @foreach($users as $user)
                    <tr>
                        <td> {{$user->id}}</td>
                        <td> {{$user->name}}</td>
                        <td> {{$user->email}}</td>
                        <td> {{$user->country_code}}</td>
                        <td> {{$user->phone_number}}</td>
                        <td> {{$user->tipo}}</td>
                        <td> {{$user->ciudad}}</td>
                        <td> {{$user->calle}}</td>
                        <td> {{$user->postal}}</td>
                        <td> 
                            <img src="{{asset('imagenes/usuarios/fotos/'.$user->foto)}}" alt="{{$user->foto}}" 
                             height="100px" width="100px" class="img-thumbnail">
                        </td>
                        <td> {{$user->password}}</td>

                        <td> {{$user->verified}}</td>
                        <td> {{$user->deleted_at}}</td>
                        
                        <td>
                        <a href="{{URL::action('UserController@edit',$user->id)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('user.modal')
                    @endforeach
                </table>


            </div>
            {{$users->render()}}
        </div>

    </div>
@endsection