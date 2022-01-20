@extends('layout.base') 
@section('title', 'Editar Reclamo')

@section('content')
    <div class="container-fluid mt-4">
        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                <div class="panel-heading mt-3">
                    <h2 class="text-center">Editar Reclamo</h2>
                </div>
                <form action="" method="post">
                    <div class="bg-primary p-2 text-dark bg-opacity-50 rounded m-auto w-50 border border-3 border-primary mb-3">
                        <label class="text-center" for="">Reclamo N° {{ $tickets->id }}</label>
                    </div>

                    <div class="mb-3 text-center">
                        <label for="" class="fs-3">Prioridad: {{ $tickets->prioridad }}</label>
                    </div>

                    <div class="mb-3 text-center">
                        <label for="" class="fs-3">Asunto: {{ $tickets->asunto }}</label>
                    </div>

                    <div class="mb-3 text-center">
                        <label for="" class="fs-3">Sector: {{ $tickets->sector }}</label>
                    </div>

                    <div class="mb-3 text-center">
                        <label for="" class="fs-3">Con comprobante: {{ $tickets->comprobante_reclamo }}</label>
                    </div>

                    <div class="mb-3 text-center">
                        <label for="" class="fs-3">Motivo: <br>{{ $tickets->motivo }}</label>
                    </div>

                    <div class="mb-3 text-center">
                        {{-- create a select for estado with abierto and cerrado --}}
                        <label for="" class="fs-3">Estado:</label>
                        <select name="estado" id="" class="form-control">
                            <option value="abierto">Abierto</option>
                            <option value="cerrado">Cerrado</option>
                        </select>
                    </div>

                    {{-- btn submit --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection