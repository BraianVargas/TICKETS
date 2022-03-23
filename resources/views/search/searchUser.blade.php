@extends('layout.base')

@section('title', 'Buscar Usuario')

@section('content')
    <div class="container-fluid mt-4">
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
                <div class="alert alert-warning" role="alert">
                    <strong>BUSCAR CLIENTE PREVIO A LA CARGA DEL RECLAMO</strong>
                </div>
                <div class="panel-heading mt-3">
                    <h3 class="panel-title">Buscar Cliente</h3>
                </div>
                <form method="POST" action="{{ url('/searchUserByDni') }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-11 form-floating">
                            <input id="dni" type="text" class="form-control" name="dni" required autofocus placeholder=" ">
                            <label for="dni" class="">&nbsp;&nbsp;&nbsp;Buscar DNI</label>
                            @if ($errors->has('dni'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('dni') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary p-3">
                                <span class="icon-search"></span> Buscar
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>  
        </div>  
    </div>
@endsection