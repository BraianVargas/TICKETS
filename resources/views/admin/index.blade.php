@extends('layout.base')

@section('title', 'Admin Index')

@section('content')

<div class="mt-4 col-12  justify-conten-center text-center">
    <h1 class="fw-bold text-uppercase">
       Hola  {{ Auth::user()->name }}
    </h1>
    <div class="container">
        <p class="fw-bold fs-5">
            Elegir una opción
        </p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="{{route('tickets')}}" class="list-group-item-action active text-decoration-none">
                    <i class="bi bi-receipt">Tickets</i> 
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('client.index')}}" class="list-group-item-action active text-decoration-none">Clientes</a>
            </li>
            <li class="list-group-item">
                <a href="{{route('logout')}}" class="list-group-item-action active text-decoration-none">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    
</div>

@endsection