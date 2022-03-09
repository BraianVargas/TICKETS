@extends('layout.base')

@section('title', 'Index')
 
@section('content')

<div class="mt-4 col-12  justify-content-center text-center">
    <h1 class="fw-bold text-uppercase">
       Reportes
    </h1>
    <div class="container">
        <p class="fw-bold fs-5">
            Elegir una opción
        </p>
        {{-- <p class="fw-lighter fs-6 alert bg-info bg-opacity-50 p-2 w-50 m-auto mb-3">
            <span class="fw-bold fs-6">
                Atencion:
            </span>
            Se descargará automaticamente un archivo .xlsx
        </p> --}}
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="{{route('reports.tickets')}}" class="list-group-item-action active text-decoration-none">
                    <i class="toHoverOptions bi bi-file-earmark-arrow-up">&nbsp; Exportar Tickets</i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('reports.clients')}}" class="list-group-item-action active text-decoration-none">
                    <i class="toHoverOptions bi bi-person-lines-fill">&nbsp;Exportar clientes</i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('reports.filter')}}" class="list-group-item-action active text-decoration-none">
                    <i class="toHoverOptions bi bi-funnel">&nbsp; Filtrar</i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('logout')}}" class="list-group-item-action active text-decoration-none">
                    <i class="toHoverOptions bi bi-door-open">&nbsp; Cerrar Sesión</i>
                </a>
            </li>
        </ul>
    </div>
    
</div>
@endsection