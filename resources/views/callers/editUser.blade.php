@extends('layout.base')

@section('title', 'Create client')

@section('content')

<div class="row mt-4">
    <form class="col-12"  role="form" method="POST">
        {{ csrf_field() }}
        @if(session()->has('success'))
            <div class="alert alert-success fw-bolder text-center">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger fw-bolder text-center">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                <h3 class="col-12 text-decoration-none">Datos del Cliente</h3>
                <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="name" name="name" value="{{$callers->name}}" class="form-control col-12" required>
                        <label class="" for="name">Nombre</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="lastname" name="lastname" value="{{$callers->lastname}}" class="form-control col-12" required>
                        <label class="" for="lastname">Apellido</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="dni" name="dni" value="{{$callers->dni}}" class="form-control col-12" required>
                        <label class="" for="dni">DNI</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="mail" name="mail" value="{{$callers->mail}}" class="form-control col-12">
                        <label class="" for="mail">Correo</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="phone" value="{{$callers->phone}}" name="phone"
                            class="form-control col-12" required>
                        <label class="" for="phone">Teléfono</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="location" name="location" value="{{$callers->location}}" class="form-control col-12">
                        <label class="" for="location">Dirección</label>
                    </div>
                </div>
            </div>
            
            <div class="row m-2 p-3 rounded-3 justify-content-center text-center">
                <button type="submit"  class="btn btn-primary btn-lg btn-block rounded-pill">Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection