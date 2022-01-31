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
                            <th scope="col-1">Última Modificación</th>
                            <th scope="col-2">Acciónes</th>
                        </tr>
                    </thead>
                    @if(($tickets != null) && (($tickets instanceof App\Models\Tickets) == false) )
                        <tbody class="col-12">
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->id}}</td>
                                    @php
                                        $target = App\Models\Denunciado::where('id',$ticket->target_id)->first();
                                        $caller = App\Models\Callers::where('id',$ticket->caller_id)->first();
                                    @endphp
                                    <td>{{$caller->name}}</td>
                                    <td>{{$target->razonSocial}}</td>
                                    <td>{{$target->objectService}}</td>
                                    <td>{{$ticket->subject}}</td>
                                    @if($ticket->status == 'Cerrado')
                                        <td class="bg-danger p-2 text-dark bg-opacity-50">{{$ticket->status}}</td>
                                    @else
                                        <td class="bg-success p-2 text-dark bg-opacity-50">{{$ticket->status}}</td>
                                    @endif
                                    <td>{{$ticket->lastmodif_datetime}}</td>
                                    <td><a href="{{ route('editTicket', ['id'=>$ticket->id])}}">Ver más...</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="col-12">
                            <th colspan="9" class="m-auto text-center justify-content-center">
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
                        <tbody class="col-12">
                            <tr>
                                <td>{{$tickets->id}}</td>
                                @php
                                    $target = App\Models\Denunciado::where('id',$tickets->target_id)->first();
                                    $caller = App\Models\Callers::where('id',$tickets->caller_id)->first();
                                @endphp
                                <td>{{$caller->name}}</td>
                                <td>{{$target->razonSocial}}</td>
                                <td>{{$target->objectService}}</td>
                                <td>{{$tickets->subject}}</td>
                                @if($tickets->status == 'Cerrado')
                                    <td class="bg-danger p-2 text-dark bg-opacity-50">{{$tickets->status}}</td>
                                @else
                                    <td class="bg-success p-2 text-dark bg-opacity-50">{{$tickets->status}}</td>
                                @endif
                                <td>{{$tickets->lastmodif_datetime}}</td>
                                <td><a href="{{ route('editTicket', ['id'=>$tickets->id])}}">Ver más...</a></td>
                            </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

@endsection