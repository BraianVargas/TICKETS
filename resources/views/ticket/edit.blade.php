@extends('layout.base') 
@section('title', 'Editar Reclamo')

@section('content')
    <div class="container-fluid mt-4">
        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                <div class="panel-heading mt-3 mb-3 ">
                    <h2 class="text-center">Editar Reclamo</h2>
                </div>
                <form action="{{route('editTicket', ['id'=>$tickets->id])}}" method="post" class="row">
                    @error('success')
                    <div class="alert alert-danger mt-3" role="alert">
                        <strong>{{ $message }}</strong> 
                    </div>
                    @enderror
                    @csrf
                    @if($tickets->estado == 'Abierto')
                        <div class="bg-primary p-2 text-dark bg-opacity-50 rounded-pill m-auto w-50 border border-3 border-primary mb-3">
                            <label id="idTicket" class="text-center fw-bolder fs-3" for="">N° {{ $tickets->id }}</label>
                        </div>

                        <div class="bg-warning p-2 text-dark bg-opacity-50 rounded-pill border border-3 border-warning mb-3 col-12">
                            <label for="" class="fs-3 text-uppercase fw-bolder text-decoration-underline">Asunto:</label>
                            <label class="fs-4">{{ $tickets->asunto }}</label>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="fs-4 fw-bolder" for="prioridad">Prioridad</label>
                            <select class="rounded-3 form-control" name="prioridad" id="prioridad">
                                <option  {{ $tickets->prioridad ==  'Muy bajo' ? 'selected' : '' }} value="Muy bajo">1 - Muy bajo</option>
                                <option  {{ $tickets->prioridad ==  'Bajo' ? 'selected' : '' }} value="Bajo">2 - Bajo</option>
                                <option  {{ $tickets->prioridad ==  'Medio' ? 'selected' : '' }} value="Normal">3 - Normal</option>
                                <option  {{ $tickets->prioridad ==  'Alto' ? 'selected' : '' }} value="Alto">4 - Alto</option>
                                <option  {{ $tickets->prioridad ==  'Muy alto' ? 'selected' : '' }} value="Muy Alto">5 - Muy Alto</option>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label for="" class="fs-4 fw-bolder">Sector</label>
                            <select class="rounded form-control" name="sector" id="sector" required>
                                <option value="" >Seleccionar...</option>
                                <option {{ $tickets->sector ==  'Defensa al Consumdor' ? 'selected' : '' }} value="Defensa al Consumdor">Defensa al consumidor</option>
                                <option {{ $tickets->sector ==  'Dirección de Tecnología' ? 'selected' : '' }} value="Dirección de Tecnología">Dirección de Tecnología</option>
                                <option {{ $tickets->sector ==  'Secretaría de cultura y deporte' ? 'selected' : '' }} value="Secretaría de cultura y deporte">Secretaría de cultura y deporte</option>
                                <option {{ $tickets->sector ==  'Secretaría de hacienda y finanzas' ? 'selected' : '' }} value="Secretaría de hacienda y finanzas">Secretaría de hacienda y finanzas</option>
                                <option {{ $tickets->sector ==  'Secretaría de inclusión social' ? 'selected' : '' }} value="Secretaría de inclusión social">Secretaría de inclusión social</option>
                                <option {{ $tickets->sector ==  'Secretaría de infraestructura' ? 'selected' : '' }} value="Secretaría de infraestructura">Secretaría de infraestructura</option>
                                <option {{ $tickets->sector ==  'Secretaría de planificación y gestión' ? 'selected' : '' }} value="Secretaría de planificación y gestión">Secretaría de planificación y gestión</option>
                                <option {{ $tickets->sector ==  'Secretaría de salud' ? 'selected' : '' }} value="Secretaría de salud">Secretaría de salud</option>
                                <option {{ $tickets->sector ==  'Dirección de turismo' ? 'selected' : '' }} value="Dirección de turismo">Dirección de turismo</option>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label for="" class="fs-4 fw-bolder">Comprobante</label>
                            <select name="comprobante_reclamo" id="comprobante_reclamo" class="form-control">
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label for="estado" class="fs-4 fw-bolder">Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="Abierto">Abierto</option>
                                <option value="Cerrado">Cerrado</option>
                            </select>
                        </div>
                        <div class="mb-3 text-center col-12 form-group">
                            <label for="motivo" class="fs-4 fw-bolder">Motivo</label><br>
                            <textarea class="form-control col-12 py-3 hy-2" name="motivo" id="motivo" cols="30" rows="10" value="{{ $tickets->motivo }}" placeholder="{{ $tickets->motivo }}">
                                {{ $tickets->motivo }}
                            </textarea>
                        </div>

                        <div class="text-center col-12">
                            <button type="submit" class="btn btn-primary col-12 rounded-pill">Guardar</button>
                        </div>
                    @else
                        <div class="bg-primary p-2 text-dark bg-opacity-50 rounded-pill m-auto w-50 border border-3 border-primary mb-3">
                            <label class="text-center fw-bolder fs-3" for="">N° {{ $tickets->id }}</label>
                        </div>

                        <div class="bg-danger p-2 text-dark bg-opacity-50 rounded-pill border border-3 border-danger mb-3 col-12">
                            <label for="" class="fs-3 text-uppercase fw-bolder text-decoration-underline">Estado:</label>
                            <label class="fs-4">{{ $tickets->estado }}</label>
                        </div>

                        <div class="mb-3 col-12">
                            <label for="" class="fs-3 text-uppercase fw-bolder text-decoration-underline">Asunto:</label>
                            <label class="fs-4">{{ $tickets->asunto }}</label>
                        </div>


                        {{-- message text of ticket cerrado col-12 --}}
                        <div class="alert alert-info mt-3 col-12" role="alert">
                            <strong>El ticket está cerrado y ya no es modificable.</strong> 
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection