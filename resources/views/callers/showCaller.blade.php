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
                    <tr>
                        <td>{{$callers->id}}</td>
                        <td>{{$callers->name}}</td>
                        <td>{{$callers->lastname}}</td>
                        <td>{{$callers->dni}}</td>
                        <td>{{$callers->mail}}</td>
                        <td>{{$callers->phone}}</td>
                        <td>{{$callers->location}}</td>
                        <td>
                            <a class="btn btn-primary rounded-pill" href="{{ route('callers.editUser', ['id'=>$callers->id]) }}">Editar</a>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
@endsection