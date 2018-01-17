@extends('layouts.app')


@section('content')
    <div class="container">
      <h1>Crear Cuenta de Usuario</h1>
      <p> Ingresa los datos </p>

      @include('Mensajes.error')

      {!! Form::open(['url' => route('user-create'),'files'=>'true']) !!}
          <div class="form-group">
              {!! Form::label('name','Nombre') !!}
              {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Escriba su nombre']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('email') !!}
              {!! Form::text('email', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese Correo']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('password') !!}
              {!! Form::password('password', ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('country_code', 'Codigo Pais') !!}
              {!! Form::text('country_code', old('country_code'), ['class' => 'form-control', 'id' => 'authy-countries']) !!}
          </div>

          <div class="form-group">
          {!! Form::label('phone_number', 'Phone number') !!}
          {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control', 'id' => 'authy-cellphone']) !!}
      </div>

 <div class="form-group">
              {!! Form::label('ciudad') !!}
              {!! Form::text('ciudad', old('ciudad'), ['class' => 'form-control', 'placeholder' => 'Ingrese Ciudad']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('calle') !!}
              {!! Form::text('calle', old('calle'), ['class' => 'form-control', 'placeholder' => 'Ingrese Calle']) !!}
          </div>

          <div class="form-group">
              {!! Form::label('postal') !!}
              {!! Form::number('postal', old('postal'), ['class' => 'form-control', 'placeholder' => 'Ingrese postal']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('tipo') !!}
              {!! Form::select('tipo', ['cliente' => 'Cliente', 'administrador' => 'Administrador', 'conductor' => 'Conductor'],'cliente') !!}
          </div> 

          <div class="form-group">
              {!! Form::label('foto') !!}
              {!! Form::file('foto') !!}
          </div> 



          <div class="form-group">
              <button type="submit" class="btn btn-primary">Crear Usuario</button>
          </div>
      {!! Form::close() !!}
    </div>
@endsection
