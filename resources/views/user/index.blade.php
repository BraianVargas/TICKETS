@extends('layout.base')

@section('title', 'User Index')

@section('content')

<div class="mt-4 col-12 col-md-6">
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <a class="text-decoration-none fs-4 text-black m-2" href="{{route('create-ticket')}}">
            Nuevo Ticket
        </a>
    </div>
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <a class="text-decoration-none fs-4 text-black m-2" href="{{route('viewTicket')}}">
            Ver Tickets activos / cerrados
        </a>
    </div>
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <a class="text-decoration-none fs-4 text-black m-2" href="{{route('home')}}">
            Historial de tickets por cliente
        </a>
    </div>
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <a class="text-decoration-none fs-4 text-black m-2" href="{{route('home')}}">
            Buscar ticket
        </a>
    </div>
    
</div>

@endsection