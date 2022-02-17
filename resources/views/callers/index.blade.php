@extends('layout.base')

@section('title', 'Inicio Clientes')

@section('content')

<div class="mt-4 col-12 col-md-6">
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <a class="text-decoration-none text-black m-2" href="{{route('client.create')}}">
            Nuevo Cliente
        </a>
    </div>
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <a class="text-decoration-none text-black m-2" href="{{route('callers.show')}}">
            Ver Clientes
        </a>
    </div>
    <div class="p-2 m-2 bg-white shadow rounded-3 col-12 col-md-9 justify-content-left">
        <p class="text-decoration-none text-black m-2">Buscar Clientes</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a class="text-decoration-none text-black m-2" href="{{route('callers.searchByDni')}}">
                    Por DNI
                </a>
            </li>
            <li class="list-group-item">
                <a class="text-decoration-none text-black m-2" href="{{route('callers.searchById')}}">
                    Por ID de cliente
                </a>
            </li>
        </ul>
    </div>
</div>

@endsection