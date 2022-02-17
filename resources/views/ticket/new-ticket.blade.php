@extends('layout.base')

@section('title', 'Nuevo Ticket')

@section('content')

<div class="container m-auto row bg-white p-3 mt-3 rounded-3">
    <div class="table-responsive">
        <table class="table table-bordered rounded-3 mt-3">
            {{ csrf_field() }}
            <thead class="">
                <th>#</th>
                <th>Denunciante</th>
                <th>Denunciado</th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Fecha de creación</th>
                <th>Última Modificación</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{$ticket->id}}</td>
                        @php
                            $target = App\Models\Denunciado::where('id',$ticket->target_id)->first();
                        @endphp
                        <td>{{$client->name}}</td>
                        <td>{{$target->razonSocial}}</td>
                        <td>{{$ticket->subject}}</td>
                        @if($ticket->status == 'Cerrado')
                            <td class="bg-danger p-2 text-dark bg-opacity-50">{{$ticket->status}}</td>
                        @else
                            <td class="bg-success p-2 text-dark bg-opacity-50">{{$ticket->status}}</td>
                        @endif
                        <td>{{$ticket->creation_datetime}}</td>
                        <td>{{$ticket->lastmodif_datetime}}</td>
                        <td>
                            <a href="{{ route('editTicket', ['id'=>$ticket->id]) }}"> Ver más...</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="col-12 m-auto justify-content-center text-center">
                <th colspan="9" class="m-auto text-center justify-content-center">
                    <nav class="d-flex m-auto ">
                        <ul class="pagination m-auto">
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
                                <li class="page-item disabled"><a class="page-link" href="{{$tickets->url(1)}}">1</a></li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tickets->url(1) }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{$tickets->previousPageUrl()}}">Anterior</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="{{$tickets->url(1)}}">1</a></li>
                            @endif
                            
                            <li class="page-item disabled"><a class="page-link" href="">&nbsp;</a></li>
                            <li class="page-item disabled"><a class="page-link" href="">. . .</a></li>
                            <li class="page-item disabled"><a class="page-link" href="">{{$tickets->currentPage()}}</a></li>
                            <li class="page-item disabled"><a class="page-link" href="">. . .</a></li>
                            <li class="page-item disabled"><a class="page-link" href="">&nbsp;</a></li>

                            @if($tickets->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{$tickets->url($tickets->lastPage())}}">{{$tickets->lastPage()}}</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="{{$tickets->nextPageUrl()}}">Siguiente</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tickets->url($tickets->lastPage()) }}" aria-label="Previous">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled"><a class="page-link" href="{{$tickets->url($tickets->lastPage())}}">{{$tickets->lastPage()}}</a></li>
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
        </table>
    </div>

    <div class="row">
        <div class="m-auto">
            @php
                $id=$client->id
            @endphp
            <a href="{{route('create-ticket', compact('client', 'id'))}}" class="btn btn-primary mt-3 col-12 rounded-pill">Crear nuevo ticket</a>
        </div>
    </div>
</div>

@endsection