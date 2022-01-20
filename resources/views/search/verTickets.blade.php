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
                <br>
                <table class="table table-bordered container-fluid m-auto">
                    <thead>
                        <tr>
                            <th scope="col-1"># Reclamo</th>
                            <th scope="col-1">Denunciante</th>
                            <th scope="col-1">Denunciado</th>
                            <th scope="col-1">Producto / Servicio</th>
                            <th scope="col-4">Asunto</th>
                            <th scope="col-1">Estado</th>
                            <th scope="col-2">Acciónes</th>
                        </tr>
                    </thead>
                    {{-- 
                        SI SE RECIBE UN ARRAY DE TICKETS SE MUESTRAN TODOS VERIFICANDO QUE NO SEA UN ARRAY VACIO O UN OBJETO. 
                        --}}
                    @if(($tickets != null) & ($tickets instanceof(\App\Models\Reclamo::class) == false ) & (($tickets->count()) >= 1))
                        @foreach ($tickets as $ticket)
                            <tbody class="col-12">
                                @if($ticket->estado == 'Abierto')
                                    @if($ticket->prioridad == 'Alto' || $ticket->prioridad == 'Muy Alto')
                                        <tr class="table-success">
                                            <th scope="col-1">{{$ticket->id}}</th>
                                            @if(($clientes instanceof \App\Models\Denunciante)==false)
                                                @foreach ($clientes as $cliente)
                                                    @if ($cliente->id == $ticket->denunciante_id)
                                                        <th scope="col-1">{{$cliente->name_denunciante}} {{$cliente->apellido_denunciante}}</th>
                                                    @endif
                                                @endforeach
                                            @else
                                                <th scope="col-1">{{$clientes->name_denunciante}} {{$clientes->apellido_denunciante}}</th>
                                            @endif
                                            @foreach ($denunciados as $denunciado)
                                                @if ($denunciado->id == $ticket->denunciado_id)
                                                    <th scope="col-1">{{$denunciado->razon_social}}</th>
                                                    <th scope="col-1">{{$denunciado->objeto_denunciado}}</th>
                                                @endif
                                            @endforeach
                                            <th scope="col-4">{{$ticket->asunto}}</th>
                                            <th scope="col-1" class="bg-success p-2 text-dark bg-opacity-50">{{$ticket->estado}}</th>
                                            <th scope="col-2">
                                                <a href="{{ route('editTicket', ['id'=>$ticket->id]) }}" class="btn btn-success">
                                                    <span class="icon-pencil2"></span> Editar
                                                </a>
                                            </th>
                                        </tr>
                                    @else
                                        @if($ticket->prioridad == 'Medio')
                                            <tr class="table-warning">
                                                <th scope="col-1">{{$ticket->id}}</th>
                                                @if(($clientes instanceof \App\Models\Denunciante)==false)
                                                    @foreach ($clientes as $cliente)
                                                        @if ($cliente->id == $ticket->denunciante_id)
                                                            <th scope="col-1">{{$cliente->name_denunciante}} {{$cliente->apellido_denunciante}}</th>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <th scope="col-1">{{$clientes->name_denunciante}} {{$clientes->apellido_denunciante}}</th>
                                                @endif
                                                @foreach ($denunciados as $denunciado)
                                                    @if ($denunciado->id == $ticket->denunciado_id)
                                                        <th scope="col-1">{{$denunciado->razon_social}}</th>
                                                        <th scope="col-1">{{$denunciado->objeto_denunciado}}</th>
                                                    @endif
                                                @endforeach
                                                <th scope="col-4">{{$ticket->asunto}}</th>
                                                <th scope="col-1" class="bg-success p-2 text-dark bg-opacity-50">{{$ticket->estado}}</th>
                                                <th scope="col-2">
                                                    <a href="{{ route('editTicket', ['id'=>$ticket->id]) }}" class="btn btn-success">
                                                        <span class="icon-pencil2"></span> Editar
                                                    </a>
                                                </th>
                                            </tr>
                                        @else
                                            @if($ticket->prioridad == 'Bajo' || $ticket->prioridad =='Muy bajo')
                                                <tr class="table-secondary">
                                                    <th scope="col-1">{{$ticket->id}}</th>
                                                    @if(($clientes instanceof \App\Models\Denunciante)==false)
                                                        @foreach ($clientes as $cliente)
                                                            @if ($cliente->id == $ticket->denunciante_id)
                                                                <th scope="col-1">{{$cliente->name_denunciante}} {{$cliente->apellido_denunciante}}</th>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <th scope="col-1">{{$clientes->name_denunciante}} {{$clientes->apellido_denunciante}}</th>
                                                    @endif
                                                    @foreach ($denunciados as $denunciado)
                                                        @if ($denunciado->id == $ticket->denunciado_id)
                                                            <th scope="col-1">{{$denunciado->razon_social}}</th>
                                                            <th scope="col-1">{{$denunciado->objeto_denunciado}}</th>
                                                        @endif
                                                    @endforeach
                                                    <th scope="col-4">{{$ticket->asunto}}</th>
                                                    <th scope="col-1" class="bg-success p-2 text-dark bg-opacity-50">{{$ticket->estado}}</th>
                                                    <th scope="col-2">
                                                        <a href="{{ route('editTicket', ['id'=>$ticket->id]) }}" class="btn btn-success">
                                                            <span class="icon-pencil2"></span> Editar
                                                        </a>
                                                    </th>
                                                </tr>
                                            @endif
                                        @endif
                                    @endif
                                @else
                                    <tr>
                                        <th scope="col-1">{{$ticket->id}}</th>
                                        @if(($clientes instanceof \App\Models\Denunciante)==false)
                                            @foreach ($clientes as $cliente)
                                                @if ($cliente->id == $ticket->denunciante_id)
                                                    <th scope="col-1">{{$cliente->name_denunciante}} {{$cliente->apellido_denunciante}}</th>
                                                @endif
                                            @endforeach
                                        @else
                                            <th scope="col-1">{{$clientes->name_denunciante}} {{$clientes->apellido_denunciante}}</th>
                                        @endif
                                        @foreach ($denunciados as $denunciado)
                                            @if ($denunciado->id == $ticket->denunciado_id)
                                                <th scope="col-1">{{$denunciado->razon_social}}</th>
                                                <th scope="col-1">{{$denunciado->objeto_denunciado}}</th>
                                            @endif
                                        @endforeach
                                        <th scope="col-4">{{$ticket->asunto}}</th>
                                        <th scope="col-1" class="bg-danger  p-2 text-dark bg-opacity-50">{{$ticket->estado}}</th>
                                        <th scope="col-2">
                                            <a href="{{ route('editTicket', ['id'=>$ticket->id]) }}" class="btn btn-success">
                                                <span class="icon-pencil2"></span> Editar
                                            </a>
                                        </th>
                                    </tr>
                                @endif
                            </tbody>
                        @endforeach
                        <tfoot class="col-12">
                            <th colspan="7" class="m-auto text-center justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        @if ($tickets->onFirstPage())
                                            <li class="page-item disabled">
                                                <a class="page-link" href="{{ $tickets->url(1) }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="{{ $tickets->previousPageUrl() }}" aria-label="Previous">
                                                    <span class="sr-only">Anterior</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $tickets->url(1) }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="{{$tickets->previousPageUrl()}}">Anterior</a>
                                            </li>
                                        @endif
                                        @for($i=0; $i<$tickets->lastPage(); $i++)
                                            @if ($tickets->currentPage() == $i+1)
                                                <li class="page-item active"><a class="page-link" href="{{$tickets->url($i+1)}}">{{$i+1}}</a></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{$tickets->url($i+1)}}">{{$i+1}}</a></li>
                                            @endif
                                        @endfor
                                        @if($tickets->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{$tickets->nextPageUrl()}}">Siguiente</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $tickets->url($tickets->lastPage()) }}" aria-label="Previous">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class="page-link" href="{{$tickets->nextPageUrl()}}">Siguiente</a>
                                            </li>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="{{ $tickets->url($tickets->lastPage()) }}" aria-label="Previous">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </th>
                        </tfoot>
                    @else
                        {{-- 
                            SI EL TICKET ES SOLO UN OBJETO Y NO UN ARREGLO SE MUESTRA EL TICKET EN LA PANTALLA SIN PAGINACION
                            --}}
                        @if(($tickets instanceof(\App\Models\Reclamo::class)) && $tickets->count() >= 1)
                            <tbody class="col-12">
                                @if($tickets->estado == 'Abierto')
                                    @if($tickets->prioridad == 'Alto' || $tickets->prioridad == 'Muy Alto')
                                        <tr class="bg-success p-2 text-dark bg-opacity-25">
                                            <th scope="col-1">{{$tickets->id}}</th>
                                            {{-- check if the $clientes var is an object of denunciantes --}}
                                            @if ($clientes->id == $tickets->denunciante_id)
                                                <th scope="col-1">{{$clientes->name_denunciante}} {{$clientes->apellido_denunciante}}</th>
                                            @endif
                                            <th scope="col-1">{{$denunciados->razon_social}}</th>
                                            <th scope="col-1">{{$denunciados->objeto_denunciado}}</th>
                                            <th scope="col-4">{{$tickets->asunto}}</th>
                                            <th scope="col-1" class="bg-success p-2 text-dark bg-opacity-50">{{$tickets->estado}}</th>
                                            <th scope="col-2">
                                                <a href="{{ route('editTicket', ['id'=>$tickets->id]) }}" class="btn btn-success">
                                                    <span class="icon-pencil2"></span> Editar
                                                </a>
                                            </th>
                                        </tr>
                                    @else
                                        @if($tickets->prioridad == 'Medio')
                                            <tr class="bg-warning p-2 text-dark bg-opacity-25">
                                                <th scope="col-1">{{$tickets->id}}</th>
                                                {{-- check if the $clientes var is an object of denunciantes --}}
                                                @if ($clientes->id == $tickets->denunciante_id)
                                                <th scope="col-1">{{$clientes->name_denunciante}} {{$clientes->apellido_denunciante}}</th>
                                                @endif
                                                <th scope="col-1">{{$denunciados->razon_social}}</th>
                                                <th scope="col-1">{{$denunciados->objeto_denunciado}}</th>
                                                <th scope="col-4">{{$tickets->asunto}}</th>
                                                <th scope="col-1" class="bg-success p-2 text-dark bg-opacity-50">{{$tickets->estado}}</th>
                                                <th scope="col-2">
                                                    <a href="{{ route('editTicket', ['id'=>$tickets->id]) }}" class="btn btn-success">
                                                        <span class="icon-pencil2"></span> Editar
                                                    </a>
                                                </th>
                                            </tr>
                                        @else
                                            @if($tickets->prioridad == 'Bajo' || $tickets->prioridad =='Muy bajo')
                                                <tr class="bg-secondary p-2 text-dark bg-opacity-25">
                                                    <th scope="col-1">{{$tickets->id}}</th>
                                                    {{-- check if the $clientes var is an object of denunciantes --}}
                                                    @if ($clientes->id == $tickets->denunciante_id)
                                                        <th scope="col-1">{{$clientes->name_denunciante}} {{$clientes->apellido_denunciante}}</th>
                                                    @endif
                                                    <th scope="col-1">{{$denunciados->razon_social}}</th>
                                                    <th scope="col-1">{{$denunciados->objeto_denunciado}}</th>
                                                    <th scope="col-4">{{$tickets->asunto}}</th>
                                                    <th scope="col-1" class="bg-success p-2 text-dark bg-opacity-50">{{$tickets->estado}}</th>
                                                    <th scope="col-2">
                                                        <a href="{{ route('editTicket', ['id'=>$tickets->id]) }}" class="btn btn-success">
                                                            <span class="icon-pencil2"></span> Editar
                                                        </a>
                                                    </th>
                                                </tr>
                                            @endif
                                        @endif
                                    @endif
                                @else
                                    <tr>
                                        <th scope="col-1">{{$tickets->id}}</th>
                                        {{-- check if the $clientes var is an object of denunciantes --}}
                                        @if ($clientes->id == $tickets->denunciante_id)
                                        <th scope="col-1">{{$clientes->name_denunciante}} {{$clientes->apellido_denunciante}}</th>
                                        @endif
                                        <th scope="col-1">{{$denunciados->razon_social}}</th>
                                        <th scope="col-1">{{$denunciados->objeto_denunciado}}</th>
                                        <th scope="col-4">{{$tickets->asunto}}</th>
                                        <th scope="col-1" class="bg-danger p-2 text-dark bg-opacity-50">{{$tickets->estado}}</th>
                                        <th scope="col-2">
                                            <a href="{{ route('editTicket', ['id'=>$tickets->id]) }}" class="btn btn-success">
                                                <span class="icon-pencil2"></span> Editar
                                            </a>
                                        </th>
                                    </tr>
                                @endif
                            </tbody>
                        @endif
                        @if($tickets == null || $tickets->count() == 0)
                            <tbody class="col-12">
                                <tr>
                                    <th scope="col-1">No hay reclamos</th>
                                </tr>
                            </tbody>
                        @endif
                    @endif
                </table>

                    
            </div>
        </div>
    </div>
</div>

@endsection