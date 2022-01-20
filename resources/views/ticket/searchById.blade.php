@extends('layout.base')

@section('title', 'Buscar Usuario')

@section('content')
    <div class="container-fluid mt-4">
        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                <div class="panel-heading mt-3">
                    <h3 class="panel-title">Buscar Reclamo</h3>
                </div>
                <form method="POST" action="{{ route('searchTicketById') }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-11 form-floating">
                            <input id="id" type="text" class="form-control {{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" required autofocus>
                            <label for="id" class="">Ingresar Id de reclamo</label>
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
                    @error('message')
                    <div class="alert alert-danger mt-3" role="alert">
                        <strong>{{ $message }}</strong> 
                    </div>
                    @enderror

                </form>
            </div>  
        </div>  
    </div>
@endsection