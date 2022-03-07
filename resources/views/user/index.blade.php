@extends('layout.base')

@section('title', 'Index')
 
@section('content')

<div class="mt-4 col-12  justify-conten-center text-center">
    <h1 class="fw-bold text-uppercase">
       Hola  {{ Auth::user()->name }}
    </h1>
    <div class="container">
        <p class="fw-bold fs-5">
            Elegir una opción
        </p>
        <br>
    
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="{{route('tickets')}}" class="list-group-item-action active text-decoration-none">
                    <i class="bi bi-receipt">&nbsp;Tickets</i> 
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('client.index')}}" class="list-group-item-action active text-decoration-none">
                    <i class="bi bi-people">&nbsp;Clientes</i>
                </a>
            </li>
            @if(auth()->user()->role == 'admin')
                <li class="list-group-item">
                    <a href="{{route('reports.index')}}" class="list-group-item-action active text-decoration-none">
                        <i class="bi bi-file-earmark-spreadsheet">&nbsp;Reportes</i>
                    </a>
                </li>
            @endif
            <li class="list-group-item">
                <a href="{{route('logout')}}" class="list-group-item-action active text-decoration-none">
                    <i class="bi bi-door-open">&nbsp;Cerrar Sesión</i>
                </a>
            </li>
        </ul>
    </div>
    
</div>

@endsection