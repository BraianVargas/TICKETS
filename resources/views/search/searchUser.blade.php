@extends('layout.base')

@section('title', 'Buscar Usuario')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Buscar Usuario</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ url('/searchUserByDni') }}">
                            <div class="col-12 col-md-10 form-floating">
                                <input id="dni" type="text" class="col-12 form-control {{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni"  autofocus>
                                @if ($errors->has('dni'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                                @endif
                                <label for="dni" class="">Buscar DNI</label>
                            </div>
                            <button type="submit" class="btn btn-primary col-2"><span class="icon-search"></span></button>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection