@extends('layout.base')

@section('content')
{{-- form for register user with auth --}}
<form class="col-md-4 m-auto p-4 mt-5 bg-white rounded-3 shadow" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <h1 class="text-center bolder fs-2 p-2">Registrar</h1>

    <div class="form-floating m-3">
        <input id="name" type="text" class="rounded-3 shadow form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
        required autofocus>
        <label for="name" class="">Nombre</label>
    </div>

    <div class="form-floating m-3">
        <input id="email" type="email" class="rounded-3 shadow form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
        <label for="email" class="">Correo</label>
    </div>

    <div class="form-floating m-3">
        <select class="rounded-3 shadow form-control" name="role" id="role" required>
            <option value="">Seleccionar...</option>
            <option value="admin">Administrador</option>
            <option value="user">Usuario</option>
        </select>
        <label for="role" class="">Rol/Tipo</label>
    </div>

    <div class="form-floating m-3">
        <input id="password" type="password" class="rounded-3 shadow form-control @error('password') is-invalid @enderror" name="password" required>
        <label for="password" class="">Contraseña</label>
    </div>

    <div class="form-floating m-3">
        <input id="password-confirm" type="password" class="rounded-3 shadow form-control @error('password') is-invalid @enderror" name="password_confirmation" required>
        <label for="password-confirm" class="">Confirmar contraseña</label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary rounded-pill col-12">
            Registrar
        </button>
    </div>

    @error('message')
        <label class="col-12 mt-4 mb-3 text-danger p-2 border-danger border rounded-3 opacity-3 shadow text-center">
            {{ $message }}
        </label>
    @enderror

</form>

@endsection
