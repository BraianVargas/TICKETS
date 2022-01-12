@extends('layout.base')

@section('title', 'Buscar Usuario')

@section('content')
    <div class="container">
        <link rel="stylesheet" href="https://i.icomoon.io/public/temp/dbcba7dd7e/UntitledProject/style.css">
        <div class="col-12">
            <div class="panel-heading mt-3">
                <h3 class="panel-title">Buscar Usuario</h3>
            </div>
            <form method="POST" action="{{ url('/searchUserByDni') }}">
                {{csrf_field()}}
                <table class="col-12">
                    <tr class="col-12 mt-3">
                        <td class="col-12 col-md-9">
                            <div class="form-floating">
                                <input id="dni" type="text" class="form-control {{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni"  autofocus>
                                <label for="dni" class="">Buscar DNI</label>
                                @if ($errors->has('dni'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="col-12 col-md-3 text-center">
                            <button type="submit" class="btn btn-primary justify-content-center">
                                <span class="icon-search"></span> Buscar
                            </button>
                        </td>                 
                    </tr>
                    @if ($client!=null)
                    <tr>
                        <td class="col-12 col-md-12">
                                {{-- DATOS DE CLIENTE DESHABILITADOS Y CARGADOS AUTOMATICAMENTE --}}
                                <div class="row rounded-3  text-center">
                                    <h3 class="col-12 text-decoration-none">Datos del Cliente</h3>
                                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                                        <input value="{{$client->name_denunciante}}" disabled type="text" id="name_denunciante" name="name_denunciante" class="py-2 form-control col-12" required>
                                        <label class="" for="name_denunciante">Nombre</label>
                                    </div>
                                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                                        <input value="{{$client->apellido_denunciante}}" disabled type="text" id="apellido_denunciante" name="apellido_denunciante" class="form-control col-12" required>
                                        <label class="" for="apellido_denunciante">Apellido</label>
                                    </div>
                                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                                        <input value="{{$client->dni_denunciante}}" disabled type="text" id="dni_denunciante" name="dni_denunciante" class="form-control col-12" required>
                                        <label class="" for="dni_denunciante">DNI</label>
                                    </div>
                                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                                        <input value="{{$client->correo_denunciante}}" disabled type="text" id="correo_denunciante" name="correo_denunciante" class="form-control col-12">
                                        <label class="" for="correo_denunciante">Correo</label>
                                    </div>
                                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                                        <input value="{{$client->telefono_denunciante}}" disabled type="text" id="telefono_denunciante" name="telefono_denunciante"
                                            class="form-control col-12" required>
                                        <label class="" for="telefono_denunciante">Teléfono</label>
                                    </div>
                                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                                        <input value="{{$client->direccion_denunciante}}" disabled type="text" id="direccion_denunciante" name="direccion_denunciante" class="form-control col-12">
                                        <label class="" for="direccion_denunciante">Dirección</label>
                                    </div>
                                </div>
                                {{-- FIN DATOS DEL CLIENTE DESHABILITADOS --}}
                            </td>
                        </tr>
                    @else
                        <tr class="col-12 mt-3">
                            <td class="col-12 mt-3">
                                <div class="alert alert-danger" role="alert">
                                    <strong>No se encontró el usuario</strong>
                                </div>
                            </td>
                        </tr>
                    @endif
                </table>

            </form>
        </div>
    </div>
@endsection