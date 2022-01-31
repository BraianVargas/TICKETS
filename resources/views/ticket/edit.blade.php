@extends('layout.base') 
@section('title', 'Editar Reclamo')

@section('content')
    <div class="container-fluid mt-4">
        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                @error('success')
                <div class="alert alert-danger mt-3" role="alert">
                    <strong>{{ $message }}</strong> 
                </div>
                @enderror
                <div class="panel-heading mt-3 mb-3 ">
                    <h2 class="text-center">Detalles</h2>
                    <h2 class="text-center">Ticket #{{$tickets->id}}</h2>
                    @if ($tickets->status == 'Cerrado')
                        <h2 class="text-center rounded-pill bg-danger p-2 text-dark bg-opacity-50">Estado: {{$tickets->status}}</h2>
                    @else
                        <h2 class="text-center rounded-pill bg-success p-2 text-dark bg-opacity-50">Estado: {{$tickets->status}}</h2>
                    @endif
                </div>
                <form action="{{route('editTicket', ['id'=>$tickets->id])}}" method="POST" class="row">
                    @csrf
                    @php
                        $reclamos = App\Models\Reclamo::where('ticket_id',$tickets->id)->get();
                    @endphp
                    <table class="table table-bordered rounded-3 mt-3">
                        <thead class="">
                            <th>#</th>
                            <th>Detalle</th>
                            <th>Fecha</th>
                        </thead>
                        <tbody>
                            @foreach($reclamos as $reclamo)
                                <tr>
                                    <td> {{$reclamo->id}} </td>
                                    <td> {{$reclamo->detail}} </td>
                                    <td> {{$reclamo->creation_datetime}} </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @if($tickets->status == 'Abierto')
                        <div class="row text-center">
                            <h2 class="text-center">Agregar Detalle</h2>
                            <div class="col-12 m-auto form-floating">
                                <textarea name="detail" id="detail" class="form-control px-2" placeholder=" " required>{{$tickets->detail}}</textarea>
                                <label for="detail">&nbsp;&nbsp;&nbsp;Detalle</label>
                            </div>
                        </div>
                    @else
                        <div class="row text-center">
                            <h2 class="text-center">Agregar Detalle</h2>
                            <div class="col-12 m-auto form-floating">
                                <textarea name="detail" id="detail" class="form-control px-2" placeholder=" " style="height: 150px" required disabled>{{$tickets->detail}}</textarea>
                                <label for="detail">&nbsp;&nbsp;&nbsp;Detalle</label>
                            </div>
                        </div>
                    @endif
                    <div class="row text-center mt-3">
                        <div class="col-12 m-auto form-floating">
                            @if($tickets->status == 'Abierto')
                                <button type="button" class="btn btn-danger col-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal">
                                    Cerrar Ticket
                                </button>
                            @else
                                <button type="button" class="btn btn-danger col-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#modal" disabled>
                                    Cerrar Ticket
                                </button>
                            @endif
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4> Con esta acción cambiará el estado del ticket a "Cerrado" y no podrá ser modificable. </h4>
                                        <br>
                                        <h2>
                                            ¿Desea continuar?
                                        </h2>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button action="{{route('closeTicket', ['id'=>$tickets->id])}}" class="btn btn-success">Confirmar</a>
                                    
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($tickets->status == 'Abierto')
                        <div class="row text-center mt-3">
                            <div class="col-12 m-auto form-floating">
                                <button type="submit" class="btn btn-primary col-12 rounded-pill">Guardar</button>
                            </div>
                        </div>    
                    @else
                        <div class="row text-center mt-3">
                            <div class="col-12 m-auto form-floating">
                                <button type="submit" class="btn btn-primary col-12 rounded-pill" disabled>Guardar</button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection