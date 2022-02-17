@extends('layout.base')

@section('title', 'Create Ticket')

@section('content')
{{-- 9320904 --}}
<div class="row mt-4">
    <form class="col-12"  role="form" method="POST" action="{{ url('/create_ticket') }}">
        {{ csrf_field() }}

        @if(session()->has('modal'))
            <div class="p-3 mt-3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                <div class="modal-dialog bg-white">
                    <div class="modal-content">
                        <div class="modal-header alert-success">
                            <h5 class="modal-title" id="exampleModalLabel">Completado!</h5>
                        </div>
                    </div>
                    <div class="p-2 rouded-3 border-black">
                        <h2>{{ session()->get('modal') }}</h2>
                    </div>
                </div>
            </div>
            <a href="{{route('viewTicket', compact('client'))}}" class="btn btn-success rounded-pill col-12">Listo</a>
        @else

        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                <div class="alert alert-success mt-3 col-12" role="alert">
                        <strong>CLIENTE ENCONTRADO</strong> 
                </div>
            {{-- DATOS DE CLIENTE HABILITADOS --}}
            <h3 class="col-12 text-decoration-none">Datos del Cliente</h3>
            
            @if ($client == null || $id == null)
                <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="name_denunciante" name="name_denunciante" class="form-control col-12" placeholder="Nombre" required >
                        <label autofocus class="" for="name_denunciante">&nbsp;&nbsp;&nbsp;Nombre</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="apellido_denunciante" name="apellido_denunciante" class="form-control col-12" required >
                        <label class="" for="apellido_denunciante">&nbsp;&nbsp;&nbsp;Apellido</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="dni_denunciante" name="dni_denunciante" class="form-control col-12" required >
                        <label class="" for="dni_denunciante">&nbsp;&nbsp;&nbsp;DNI</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="correo_denunciante" name="correo_denunciante" class="form-control col-12" >
                        <label class="" for="correo_denunciante">&nbsp;&nbsp;&nbsp;Correo</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="telefono_denunciante" name="telefono_denunciante" class="form-control col-12" required >
                        <label class="" for="telefono_denunciante">&nbsp;&nbsp;&nbsp;Teléfono</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="direccion_denunciante" name="direccion_denunciante" class="form-control col-12" >
                        <label class="" for="direccion_denunciante">&nbsp;&nbsp;&nbsp;Dirección</label>
                    </div>
                </div>
            @else
                <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="name_denunciante" name="name_denunciante" class="form-control col-12" placeholder="Nombre" required readonly value="{{$client->name}}">
                        <label autofocus class="" for="name_denunciante">&nbsp;&nbsp;&nbsp;Nombre</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="apellido_denunciante" name="apellido_denunciante" class="form-control col-12" required readonly value="{{$client->lastname}}">
                        <label class="" for="apellido_denunciante">&nbsp;&nbsp;&nbsp;Apellido</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="dni_denunciante" name="dni_denunciante" class="form-control col-12" required readonly value="{{$client->dni}}">
                        <label class="" for="dni_denunciante">&nbsp;&nbsp;&nbsp;DNI</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="correo_denunciante" name="correo_denunciante" class="form-control col-12" value="{{$client->mail}}">
                        <label class="" for="correo_denunciante">&nbsp;&nbsp;&nbsp;Correo</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="telefono_denunciante" name="telefono_denunciante" class="form-control col-12" required value="{{$client->phone}}">
                        <label class="" for="telefono_denunciante">&nbsp;&nbsp;&nbsp;Teléfono</label>
                    </div>
                    <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                        <input placeholder=" " type="text" id="direccion_denunciante" name="direccion_denunciante" class="form-control col-12" value="{{$client->location}}">
                        <label class="" for="direccion_denunciante">&nbsp;&nbsp;&nbsp;Dirección</label>
                    </div>
                </div>
            @endif

            {{-- FIN DATO DE CLIENTE HABILITADOS --}}

            {{-- DATOS DEL DENUNCIADO --}}
            <div class="row m-2 p-3 rounded-3 text-center">
                <h3 class="col-12 text-decoration-none">Datos del denunciado</h3>

                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <input placeholder=" " type="text" id="razon_social" name="razon_social" class="form-control col-12">
                    <label class="" for="razon_social">&nbsp;&nbsp;&nbsp;Nombre o Razon social</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <input placeholder=" " type="text" id="objeto_denunciado" name="objeto_denunciado" class="form-control col-12">
                    <label class="" for="objeto_denunciado">&nbsp;&nbsp;&nbsp;Producto / servicio</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <input placeholder=" " type="text" id="direccion_denunciado" name="direccion_denunciado"
                        class="form-control col-12">
                    <label class="" for="direccion_denunciado">&nbsp;&nbsp;&nbsp;Direccion</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <input placeholder=" " type="text" id="departamento_denunciado" name="departamento_denunciado" class="form-control col-12">
                    <label class="" for="departamento_denunciado">&nbsp;&nbsp;&nbsp;Departamento</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <select placeholder=" " class="rounded-3 form-control" name="provincia_denunciado" id="provincia_denunciado" required >
                        <option readonly value="">Seleccionar...</option>
                        <option value="Buenos Aires"> Buenos Aires </option>
                        <option value="Capital"> Capital Federal </option>
                        <option value="Catamarca"> Catamarca </option>
                        <option value="Chaco"> Chaco </option>
                        <option value="Chubut"> Chubut </option>
                        <option value="Cordoba"> Córdoba </option>
                        <option value="Corrientes"> Corrientes </option>
                        <option value="Entre Rios"> Entre Ríos </option>
                        <option value="Formosa"> Formosa </option>
                        <option value="Jujuy"> Jujuy </option>
                        <option value="La pampa"> La Pampa </option>
                        <option value="La rioja"> La Rioja </option>
                        <option value="Mendoza"> Mendoza </option>
                        <option value="Misiones"> Misiones </option>
                        <option value="Neuquen"> Neuquén </option>
                        <option value="Rio Negro"> Río Negro </option>
                        <option value="Salta"> Salta </option>
                        <option value="San Juan"> San Juan </option>
                        <option value="San Luis"> San Luis </option>
                        <option value="Santa Cruz"> Santa Cruz </option>
                        <option value="Santa Fe"> Santa Fe </option>
                        <option value="Santiago del estero"> Santiago del Estero </option>
                        <option value="Tierra del fuego"> Tierra del Fuego </option>
                        <option value="Tucumán"> Tucumán </option>
                    </select>
                    <label class="" for="provincia_denunciado">Provincia</label>
                </div>
            </div>
            {{-- FIN DATOS DEL DENUNCIADO --}}
            
            {{-- DATOS DEL RECLAMO --}}
            <div class="row m-2 p-3 rounded-3 justify-content-center text-center">
                <h3 class="col-12 text-decoration-none">Datos del Reclamo</h3>
                <div class="form-floating col-12 mt-3 mb-1 m-auto">
                    <input placeholder=" " type="text" id="asunto" name="asunto" class="form-control col-12 text-uppercase">
                    <label class="" for="asunto">&nbsp;&nbsp;&nbsp;Asunto</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <select class="rounded-3 form-control" name="sector" id="sector" required>
                        <option value="" >Seleccionar...</option>
                        <option value="Defensa al Consumdor">Defensa al consumidor</option>
                        <option value="Dirección de Tecnología">Dirección de Tecnología</option>
                        <option value="Secretaría de cultura y deporte">Secretaría de cultura y deporte</option>
                        <option value="Secretaría de hacienda y finanzas">Secretaría de hacienda y finanzas</option>
                        <option value="Secretaría de inclusión social">Secretaría de inclusión social</option>
                        <option value="Secretaría de infraestructura">Secretaría de infraestructura</option>
                        <option value="Secretaría de planificación y gestión">Secretaría de planificación y gestión</option>
                        <option value="Secretaría de salud">Secretaría de salud</option>
                        <option value="Dirección de turismo">Dirección de turismo</option>
                    </select>
                    <label class="" for="sector">Sector</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <select class="rounded-3 form-control" name="prioridad" id="prioridad">
                        <option value="Muy bajo">1 - Muy bajo</option>
                        <option value="Bajo">2 - Bajo</option>
                        <option value="Normal">3 - Normal</option>
                        <option value="Alto">4 - Alto</option>
                        <option value="Muy Alto">5 - Muy Alto</option>
                    </select>
                    <label class="" for="prioridad">Prioridad</label>
                </div>
                <div class="form-floating col-12 mt-3 mb-1 m-auto">
                    <select name="comprobante_reclamo" id="comprobante_reclamo" class="form-control">
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                    <label for="comprobante_reclamo">¿Tiene Comprobante?</label>
                </div>
                <div class="form-floating col-12 mt-3 mb-1 m-auto">
                    <textarea type="text" id="motivo" name="motivo" class="form-control" style="height: 150px" placeholder=" " required></textarea>
                    <label for="motivo">&nbsp;&nbsp;&nbsp;Ingrese el Motivo</label>
                </div>
            </div>
            <div class="row m-2 p-3 rounded-3 justify-content-center text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill">Enviar</button>
            </div>
        </div>
        </div>
    </form>
    @endif

</div>

@endsection
