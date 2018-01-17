@extends('layouts.app')



@section('content')
    <h1>{{ $user->name }}</h1>
    
    <p>Estado de Cuenta:
        @if($user->verified)
            Verified
      

       

        @else
            Not Verified
        @endif
    </p>
    @if( !$user->verified )
        <p>
          <a href="{{ route('user-verify') }}">Verifica tu cuenta ahora</a>
        </p>
    @endif
@endsection
