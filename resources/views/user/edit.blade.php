@extends('template.admin')
@section('content')
    <h3> User </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Usuario: {{$user->id}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($user,['method'=>'PATCH','route'=>['user.update',$user->id]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id">ID :</label>
                <input type="number" class="form-control" disable readonly value="{{$user->id}}"  name="id">

            </div>
            
          
        
             <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name"  required>
            </div>
      
      
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" value="{{$user->email}}" disable readonly  name="email"  required>

            </div>
     


            <div class="form-group">
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" value="{{$user->country_code}}" name="country_code"  required>

            </div>


            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" value="{{$user->phone_number}}" name="phone_number"  required>

            </div>
     

    
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" value="{{$user->password}}" name="password"  required>

            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" class="form-control" value="{{$user->ciudad}}" name="ciudad"  required>
            </div>

             <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" value="{{$user->calle}}" name="calle"  required>
            </div>

      
        <div class="form-group">
                <label for="postal">Postal:</label>
                <input type="number" class="form-control" value="{{$user->postal}}" name="postal"  required>

        </div>

      
     

               <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" class="form-control selectpicker" data-live-search="true">
                    
                        @if($user->tipo="administrador")
                    <option value="administrador" selected> Administrador</option>
                    <option value="cliente" > Cliente</option>
                    <option value="conductor" > Conductor</option>

                        @elseif($user->tipo="cliente")
                    
                    <option value="cliente" selected> Cliente</option>
                    <option value="administrador" > Administrador</option>
                    <option value="conductor" > Conductor</option>
                    
                        @else($user->tipo="conductor")
                    <option value="conductor" selected> Conductor</option>
                    <option value="cliente" > Cliente</option>
                    <option value="administrador" > Administrador</option>
                    
                    @endif
                </select>
             </div>
       



            <div class="form-group">
                
                <label for="foto">Foto:</label>
                     <input type="file" class="form-control"  name="foto">
                    @if(($user->foto)!="")
                        <img src="{{asset('imagenes/usuarios/fotos/'.$user->foto)}}"  height="200px" width="200px">
                        <p> {{$user->foto}}<p>
                     @endif
                
            </div>

        


            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

               {{$user->detalles}}

            {!!Form::close()!!}

            
          
        </div>
    </div>
@endsection