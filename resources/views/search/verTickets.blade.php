@extends('layout.base')

@section('title','Ver Ticket')

@section('content')

<div class="container">
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/dbcba7dd7e/UntitledProject/style.css">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        Ver Ticket
                        <i class="fa fa-ticket" aria-hidden="true"></i>
                    </h4>
                </div>
                {{-- select estado of ticket with radio button--}}
                {{-- <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="selectEstado">Estado</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="selectEstado" id="selectEstado" value="Abierto" checked>
                                        Abierto
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="selectEstado" id="selectEstado" value="Cerrado">
                                        Cerrado
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <br>
                <table class="table table-bordered container-fluid m-auto">
                    <thead>
                        <tr>
                            <th scope="col-1"># Ticket</th>
                            <th scope="col-1">Denunciante</th>
                            <th scope="col-1">Denunciado</th>
                            <th scope="col-1">Producto / Servicio</th>
                            <th scope="col-4">Asunto</th>
                            <th scope="col-1">Estado</th>
                            <th scope="col-2">Acciónes</th>
                        </tr>
                    </thead>
                    @foreach ($tickets as $ticket)
                    <tbody class="col-12">
                        <tr>
                          <th scope="col-1">{{$ticket->id}}</th>
                          <th scope="col-1">{{$ticket->name_denunciante}} {{$ticket->apellido_denunciante}}</th>
                          <th scope="col-1">{{$ticket->razon_social}}</th>
                          <th scope="col-1">{{$ticket->objeto_denunciado}}</th>
                          <th scope="col-4">{{$ticket->asunto}}</th>
                          <th scope="col-1">{{$ticket->estado}}</th>
                          <th scope="col-2">
                            <a href="" class="btn btn-primary">
                                <span class="icon-pencil2"></span> Editar
                            </a>
                            <a href="" class="btn btn-danger">
                                <span class="icon-bin2"></span> Borrar
                            </a>
                          </th>
                          {{-- {{route('ticket.destroy',$ticket->id)}}
                          {{route('ticket.edit',$ticket->id)}} --}}
                        </tr>
                      </tbody>
                        {{-- @if (request('selectEstado') == $ticket->estado )
                        @endif --}}
                    @endforeach
                    </table>       

                    
            </div>
        </div>
    </div>
</div>

@endsection