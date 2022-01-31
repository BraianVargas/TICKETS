@extends('layout.base')

@section('title', 'Nuevo Ticket')

@section('content')

<div class="container m-auto row bg-white p-3 mt-3 rounded-3">
    <div class="table-responsive">
        <table class="table table-bordered rounded-3 mt-3">
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
                        <td>{{$ticket->status}}</td>
                        <td>{{$ticket->creation_datetime}}</td>
                        <td>{{$ticket->lastmodif_datetime}}</td>
                        <td><a href="{{ route('editTicket', ['id'=>$ticket->id]) }}">Ver más...</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="m-auto">

            <a href="{{route('create-ticket', ['client' => $client])}}" class="btn btn-primary mt-3 col-12 rounded-pill">Crear nuevo ticket</a>
        </div>
    </div>
</div>

@endsection