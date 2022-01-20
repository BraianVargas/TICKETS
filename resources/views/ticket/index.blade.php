@extends('layout.base')

@section('title', 'User Index')

@section('content')

<div class="mt-4 col-12 col-md-6">
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <a class="text-decoration-none text-black m-2" href="{{route('searchUser')}}">
            Nuevo Ticket
        </a>
    </div>
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <a class="text-decoration-none text-black m-2" href="{{route('viewTicket')}}">
            Ver Tickets
        </a>
    </div>
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <p class="text-decoration-none text-black m-2">Buscar Ticket</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a class="text-decoration-none text-black m-2" href="{{route('searchTicketByDni')}}">
                    Por DNI de cliente
                </a>
            </li>
            <li class="list-group-item">
                <a class="text-decoration-none text-black m-2" href="{{route('searchTicketById')}}">
                    Por ID de ticket
                </a>
            </li>
        </ul>
    </div>
</div>

@endsection