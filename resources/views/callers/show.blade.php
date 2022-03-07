@extends('layout.base')

@section('title', 'Ver Clientes')

@section('content')
    <div class="container rounded-3 bg-white mt-4 m-2 p-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Clientes</h1>
            </div>
        </div>
        <div class="row p-2 ">
            <table class="table table-bordered rounded-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dni</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $callers = App\Models\Callers::orderBy('id', 'asc')->paginate(10);;
                    @endphp
                    @foreach ($callers as $caller)
                        <tr>
                            <td>{{$caller->id}}</td>
                            <td>{{$caller->name}}</td>
                            <td>{{$caller->lastname}}</td>
                            <td>{{$caller->dni}}</td>
                            <td>{{$caller->mail}}</td>
                            <td>{{$caller->phone}}</td>
                            <td>{{$caller->location}}</td>
                            <td>
                                <a class="btn btn-primary rounded-pill" href="{{route('callers.editUser', ['id'=>$caller->id])}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="col-12 m-auto justify-content-center text-center">
                    <th colspan="9" class="m-auto text-center justify-content-center">
                        <nav class="d-flex m-auto ">
                            <ul class="pagination m-auto">
                                @if ($callers->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="{{ $callers->url(1) }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="{{ $callers->previousPageUrl() }}" aria-label="Previous">
                                            <span class="sr-only">Anterior</span>
                                        </a>
                                    </li>
                                    <li class="page-item disabled"><a class="page-link" href="{{$callers->url(1)}}">1</a></li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $callers->url(1) }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{$callers->previousPageUrl()}}">Anterior</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="{{$callers->url(1)}}">1</a></li>
                                @endif
                                
                                <li class="page-item disabled"><a class="page-link" href="">&nbsp;</a></li>
                                <li class="page-item disabled"><a class="page-link" href="">. . .</a></li>
                                <li class="page-item disabled"><a class="page-link" href="">{{$callers->currentPage()}}</a></li>
                                <li class="page-item disabled"><a class="page-link" href="">. . .</a></li>
                                <li class="page-item disabled"><a class="page-link" href="">&nbsp;</a></li>
    
                                @if($callers->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{$callers->url($callers->lastPage())}}">{{$callers->lastPage()}}</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{$callers->nextPageUrl()}}">Siguiente</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $callers->url($callers->lastPage()) }}" aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled"><a class="page-link" href="{{$callers->url($callers->lastPage())}}">{{$callers->lastPage()}}</a></li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="{{$callers->nextPageUrl()}}">Siguiente</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="{{ $callers->url($callers->lastPage()) }}" aria-label="Previous">
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
    </div>
@endsection