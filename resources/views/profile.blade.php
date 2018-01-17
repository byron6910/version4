@extends('layouts.app')

@section('content')

            <div class="panel panel-primary">
                <div class="panel-heading">Perfil {{$user->name}}</div>
                </div>
                    <div class="col-md-6 ">
                         <img src="/imagenes/{{$user->foto}}" style="width:100px; height:100px; float:left; border-radius:50%; margin-right:25px;">
                    </div>
                   
                        <h2>{{$user->name}}</h2> 
                          <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label> Actualizar Foto de Perfil</label>
                        <input type="file" name="foto">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">

                 </form>
                    
                
            </div>
       
       
@endsection
