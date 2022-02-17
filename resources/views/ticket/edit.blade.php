@extends('layout.base') 
@section('title', 'Editar Reclamo')

@section('content')
    <div class="container-fluid mt-4">
        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                @error('message')
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
                <form method="POST" class="row">
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
                                <textarea name="detail" id="detail" class="form-control px-2" placeholder=" "  style="height: 150px" required>{{$tickets->detail}}</textarea>
                                <label for="detail">&nbsp;&nbsp;&nbsp;Detalle</label>
                            </div>
                        </div>
                    @else
                        @if($tickets->status == 'Cerrado' && Auth()->user()->role == 'admin')
                            <div class="row text-center">
                                <h2 class="text-center">Agregar Detalle</h2>
                                <div class="col-12 m-auto form-floating">
                                    <textarea name="detail" id="detail" class="form-control px-2" placeholder=" "  style="height: 150px" required>{{$tickets->detail}}</textarea>
                                    <label for="detail">&nbsp;&nbsp;&nbsp;Detalle</label>
                                </div>
                            </div>
                        @elseif($tickets->status == 'Cerrado' && Auth()->user()->role == 'user')
                            <div class="row text-center">
                                <h2 class="text-center">Agregar Detalle</h2>
                                <div class="col-12 m-auto form-floating">
                                    <textarea name="detail" id="detail" class="form-control px-2" placeholder=" " style="height: 150px" required disabled>{{$tickets->detail}}</textarea>
                                    <label for="detail">&nbsp;&nbsp;&nbsp;Detalle</label>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="row text-center mt-3">
                        <h2 class="text-center">Estado</h2>
                        <div class="col-12 m-auto form-floating">
                            @if($tickets->status == 'Abierto')
                                <select class="form-control col-4 m-auto" name="status" id="status" enabled>
                                    <option value="Abierto">Abierto</option>
                                    <option value="Cerrado">Cerrado</option>
                                </select>
                                <label for="status">&nbsp;&nbsp;&nbsp;Estado</label>
                            @else
                                @if($tickets->status == 'Cerrado' && Auth()->user()->role == 'admin')
                                    <select class="form-control col-4 m-auto" name="status" id="status" enabled>
                                        <option value="Abierto">Abierto</option>
                                        <option value="Cerrado">Cerrado</option>
                                    </select>
                                    <label for="status">&nbsp;&nbsp;&nbsp;Estado</label>
                                @elseif($tickets->status == 'Cerrado' && Auth()->user()->role == 'user')
                                    <label for="status">&nbsp;&nbsp;&nbsp;Estado</label>
                                    <select class="form-control col-4 m-auto" name="status" id="status" disabled>
                                        <option value="Abierto">Abierto</option>
                                        <option value="Cerrado">Cerrado</option>
                                    </select>
                                    <label for="status">&nbsp;&nbsp;&nbsp;Estado</label>
                                @endif
                            @endif
                        </div>
                    </div>
                    @if($tickets->status == 'Abierto')
                        <div class="row text-center mt-3">
                            <div class="col-12 m-auto form-floating">
                                <button  type="submit" class="btn btn-primary col-12 rounded-pill">Guardar</button>
                            </div>
                        </div>    
                    @else
                        @if($tickets->status == 'Cerrado' && Auth()->user()->role == 'admin')
                            <div class="row text-center mt-3">
                                <div class="col-12 m-auto form-floating">
                                    <button action="{{route('editTicket', ['id'=>$tickets->id])}}" type="submit" class="btn btn-primary col-12 rounded-pill">Guardar</button>
                                </div>
                            </div>
                        @elseif($tickets->status == 'Cerrado' && Auth()->user()->role == 'user')
                            <div class="row text-center mt-3">
                                <div class="col-12 m-auto form-floating">
                                    <button action="{{route('editTicket', ['id'=>$tickets->id])}}" type="submit" class="btn btn-primary col-12 rounded-pill" disabled>Guardar</button>
                                </div>
                            </div>
                        @endif
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection