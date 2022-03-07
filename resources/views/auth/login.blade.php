@extends('layout.base')


@section('title', 'Login')

@section('content')

{{-- Login Form with auth --}}

<form method="POST" class="col-md-4 m-auto p-4 mt-5 bg-white rounded-3 shadow" action="{{ route('login') }}">
    @csrf
    <h1 class="text-center bolder fs-2 p-2">Iniciar Sesión</h1>
    <div class="form-floating m-3">
        <input id="email" type="email" class="rounded-3 shadow form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
        <label for="email">{{ __('Email') }}</label>
    </div>
    <div class="form-floating m-3">
        <input id="password" type="password" class="rounded-3 shadow form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        <label class="form-label" for="password">{{ __('Contraseña') }}</label>
    </div>
    <button type="submit" class="btn btn-primary shadow rounded-pill col-12 text-center mt-4">
        Iniciar Sesión
    </button>
    
    @error('message')
        <label class="col-12 mt-4 mb-3 text-danger p-2 border-danger border rounded-3 opacity-3 shadow text-center">
            {{ $message }}
        </label>
    @enderror
</form>


@endsection