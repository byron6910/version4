@extends('layouts.app')



@section('content')
    <h1>Confirmacion de cuenta...</h1>
    <p>
      Tu Cuenta a sido creada revisa tu celular para activalar y envia el numero adjunto
    </p>
    {!! Form::open(['url' => route('user-verify')]) !!}
        <div class="form-group">
            {!! Form::label('token') !!}
            {!! Form::text('token', '', ['class' => 'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-primary">Verify Token</button>
    {!! Form::close() !!}

    <hr>
    {!! Form::open(['url' => route('user-verify-resend')]) !!}
        <button type="submit" class="btn">Resend code</button>
    {!! Form::close() !!}
@endsection
