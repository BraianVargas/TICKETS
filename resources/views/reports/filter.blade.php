@extends('layout.base')

@section('title', 'Index')
 
@section('content')

<div class="mt-4 col-12  justify-content-center text-center">
    <h1 class="fw-bold text-uppercase">
       Filtrar Reportes
    </h1>
    {{-- if exist an error show it --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p class="fw-lighter fs-6 alert bg-info bg-opacity-50 p-2 w-50 m-auto mb-3">
        <span class="fw-bold fs-6">
            Atencion:
        </span>
        Se descargará automaticamente un archivo .xlsx
    </p>
    

    <div class="container text-center m-auto col-12 col-md-4 mt-3 p-3 bg-white rounded-3 shadow">
        <div class="form-group ">
            <label for="">Filtrar por:</label>
            <select name="filtro" id="filtro" class="form-control" onchange="ShowSelected()" autofocus>
                <option value="1" selected>Seleccione una opción</option>
                <option value="fecha">Fecha</option>
                <option value="idCreator">ID creador</option>
                <option value="idCaller">ID de cliente</option>
                <option value="dni">DNI de cliente</option>
            </select>
        </div>
    </div>
    <script type="text/javascript">
        function ShowSelected(){
            /* Para obtener el valor */
            var cod = document.getElementById("filtro").value;
            if(cod == "fecha"){
                document.getElementById("FiltroFecha").style.display = "block";
             }else{
                document.getElementById("FiltroFecha").style.display = "none";
            };

            if(cod == "idCreator"){
                document.getElementById("FiltroIdCreator").style.display = "block";                                                                                                                                              
             }else{
                document.getElementById("FiltroIdCreator").style.display = "none";
            };

            if(cod == "idCaller"){
                document.getElementById("FiltroIdCaller").style.display = "block";
             }else{
                document.getElementById("FiltroIdCaller").style.display = "none";
            };

            if(cod == "dni"){
                document.getElementById("FiltroDni").style.display = "block";
             }else{
                document.getElementById("FiltroDni").style.display = "none";
            };
        }
    </script>
    <form action="{{route('reports.filter')}}" method="POST" class="was-validated mt-3" id="FiltroFecha"  style="display: none">
        {{ csrf_field() }}
        <div class="bg-white mt-2 p-3 rounded shadow">
            <h3 class="text-muted text-center"><i class="bi bi-calendar-date">&nbsp;&nbsp;Fecha de creación </i></h3>
            <div class="input-group col-12 container text-center" >
                <div class="col-12 col-md-6 form-floating m-auto">
                    <input type="date" name="fecha" id="fecha" class="text-center rounded-pill shadow form-control" required autofocus placeholder=" ">
                    <label for="fecha" class="text-muted"><i class="bi bi-calendar-date">&nbsp;&nbsp;Fecha de creación </i></label>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="col-12 col-md-4 btn btn-success shadow rounded-pill">
            <i class="bi bi-funnel">&nbsp; Filtrar</i>
        </button>
    </form>
    <form action="{{route('reports.filterByIdCreator')}}" method="POST" class="was-validated mt-3"  id="FiltroIdCreator"  style="display: none">
        {{ csrf_field() }}
        <div class="bg-white mt-2 p-3 rounded shadow">
            <h3 class="text-muted text-center"><i class="bi bi-person">&nbsp;&nbsp;Filtrar por Id de Creador </i></h3>
            <div class="input-group col-12 container text-center" >
                <div class="col-12 col-md-6 form-floating m-auto">
                    <input type="text" name="idCreator" id="idCreator" class="text-center rounded-pill shadow form-control" required autofocus placeholder=" ">
                    <label for="idCreator" class="text-muted"><i class="bi bi-person">&nbsp;&nbsp;Filtrar por Id de Creador </i></label>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="col-12 col-md-4 btn btn-success shadow rounded-pill">
            <i class="bi bi-funnel">&nbsp; Filtrar</i>
        </button>
    </form>
    <form action="{{route('reports.filterByIdCaller')}}" method="POST" class="was-validated mt-3"  id="FiltroIdCaller"  style="display: none">
        {{ csrf_field() }}
        <div class="bg-white mt-2 p-3 rounded shadow">
            <h3 class="text-muted text-center"><i class="bi bi-person">&nbsp;&nbsp;Filtrar ID de cliente </i></h3>
            <div class="input-group col-12 container text-center" >
                <div class="col-12 col-md-6 form-floating m-auto">
                    <input type="text" name="idCaller" id="idCaller" class="text-center rounded-pill shadow form-control" required autofocus placeholder=" ">
                    <label for="idCaller" class="text-muted"><i class="bi bi-person">&nbsp;&nbsp;Filtrar por Id de Cliente </i></label>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="col-12 col-md-4 btn btn-success shadow rounded-pill">
            <i class="bi bi-funnel">&nbsp; Filtrar</i>
        </button>
    </form>
    <form action="{{route('reports.filterByDniCaller')}}" method="POST" class="was-validated mt-3"  id="FiltroDni"  style="display: none">
        {{ csrf_field() }}
        <div class="bg-white mt-2 p-3 rounded shadow">
            <h3 class="text-muted text-center"><i class="bi bi-person-square">&nbsp;&nbsp;Filtrar por DNI </i></h3>
            <div class="input-group col-12 container text-center" >
                <div class="col-12 col-md-6 form-floating m-auto">
                    <input type="text" name="dniCaller" id="dniCaller" class="text-center rounded-pill shadow form-control" required autofocus placeholder=" ">
                    <label for="dniCaller" class="text-muted"><i class="bi bi-person-square">&nbsp;&nbsp;Filtrar por DNI </i></label>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="col-12 col-md-4 btn btn-success shadow rounded-pill">
            <i class="bi bi-funnel">&nbsp; Filtrar</i>
        </button>
    </form>
        <div class="bg-white mt-2 p-3 rounded shadow"  style="display: none" id="FiltroIdCaller">
            <h3 class="text-muted text-center"><i class="bi bi-calendar-date">&nbsp;&nbsp;Fecha de creación </i></h3>
            <div class="input-group col-12 container text-center" >
                <div class="col-12 col-md-6 form-floating m-auto">
                    Filtro por ID de cliente
                </div>
            </div>
        </div>

    <div class="container">
        
    </div>
    
</div>
@endsection