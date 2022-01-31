@extends('layout.base')

@section('title', 'Create client')

@section('content')

<div class="row mt-4">
    <form class="col-12"  role="form" method="POST" action="{{ url('/create-client') }}">
        {{ csrf_field() }}
        
        @if(session()->has('errors'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif


        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                {{-- DATOS DE CLIENTE HABILITADOS --}}
                <h3 class="col-12 text-decoration-none">Datos del Cliente</h3>
                <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="name_denunciante" name="name_denunciante" class="form-control col-12" required>
                        <label class="" for="name_denunciante">Nombre</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="apellido_denunciante" name="apellido_denunciante" class="form-control col-12" required>
                        <label class="" for="apellido_denunciante">Apellido</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="dni_denunciante" name="dni_denunciante" class="form-control col-12" required>
                        <label class="" for="dni_denunciante">DNI</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="correo_denunciante" name="correo_denunciante" class="form-control col-12">
                        <label class="" for="correo_denunciante">Correo</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="telefono_denunciante" name="telefono_denunciante"
                            class="form-control col-12" required>
                        <label class="" for="telefono_denunciante">Teléfono</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input type="text" id="direccion_denunciante" name="direccion_denunciante" class="form-control col-12">
                        <label class="" for="direccion_denunciante">Dirección</label>
                    </div>
                </div>
                {{-- FIN DATOS DEL CLIENTE HABILITADOS --}}
            </div>
            
            <div class="row m-2 p-3 rounded-3 justify-content-center text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill">Enviar</button>
            </div>
        </div>
    </form>
</div>
@endsection