@extends('layout.base')

@section('title', 'Create Ticket')

@section('content')

<div class="row mt-4">
    <form class="col-12"  role="form" method="POST" action="{{ url('/create_ticket') }}">
        {{ csrf_field() }}
        {{-- DATOS DEL CLIENTE --}}
        <div class="col-12 bg-white rounded-3 shadow">
            <div class="row m-2 p-3 rounded-3  justify-content-center text-center">
                <h3 class="col-12 text-decoration-none">Datos del Cliente</h3>
                <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                    <input type="text" id="name_denunciante" name="name_denunciante" class="py-2 form-control col-12" required>
                    <label class="" for="name_denunciante">Nombre</label>
                </div>
                <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                    <input type="text" id="apellido_denunciante" name="apellido_denunciante" class="form-control col-12" required>
                    <label class="" for="apellido_denunciante">Apellido</label>
                </div>
                <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                    <input type="text" id="dni_denunciante" name="dni_denunciante" class="form-control col-12" required>
                    <label class="" for="dni_denunciante">DNI</label>
                </div>
                <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                    <input type="text" id="correo_denunciante" name="correo_denunciante" class="form-control col-12">
                    <label class="" for="correo_denunciante">Correo</label>
                </div>
                <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                    <input type="text" id="telefono_denunciante" name="telefono_denunciante"
                        class="form-control col-12" required>
                    <label class="" for="telefono_denunciante">Teléfono</label>
                </div>
                <div class="form-floating col-12 col-md-4 mt-3 mb-1 m-auto">
                    <input type="text" id="direccion_denunciante" name="direccion_denunciante" class="form-control col-12">
                    <label class="" for="direccion_denunciante">Dirección</label>
                </div>
            </div>
            {{-- FIN DATOS DEL CLIENTE --}}



            {{-- DATOS DEL DENUNCIADO --}}
            <div class="row m-2 p-3 rounded-3 text-center">
                <h3 class="col-12 text-decoration-none">Datos del denunciado</h3>

                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <input type="text" id="razon_social" name="razon_social" class="form-control col-12">
                    <label class="" for="razon_social">Nombre o Razon social</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <input type="text" id="objeto_denunciado" name="objeto_denunciado" class="form-control col-12">
                    <label class="" for="objeto_denunciado">Producto / servicio</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <input type="text" id="direccion_denunciado" name="direccion_denunciado"
                        class="form-control col-12">
                    <label class="" for="direccion_denunciado">Direccion</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <input type="text" id="departamento_denunciado" name="departamento_denunciado" class="form-control col-12">
                    <label class="" for="departamento_denunciado">Departamento</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <select class="rounded-3 form-control" name="provincia_denunciado" id="provincia_denunciado" required >
                        <option value="">Seleccionar...</option>
                        <option value="buenos_aires"> Buenos Aires </option>
                        <option value="capital"> Capital Federal </option>
                        <option value="catamarca"> Catamarca </option>
                        <option value="chaco"> Chaco </option>
                        <option value="chubut"> Chubut </option>
                        <option value="cordoba"> Córdoba </option>
                        <option value="corrientes"> Corrientes </option>
                        <option value="entre"> Entre Ríos </option>
                        <option value="formosa"> Formosa </option>
                        <option value="jujuy"> Jujuy </option>
                        <option value="la_pampa"> La Pampa </option>
                        <option value="la_rioja"> La Rioja </option>
                        <option value="mendoza"> Mendoza </option>
                        <option value="misiones"> Misiones </option>
                        <option value="neuquen"> Neuquén </option>
                        <option value="rio_negro"> Río Negro </option>
                        <option value="salta"> Salta </option>
                        <option value="san_juan"> San Juan </option>
                        <option value="san_luis"> San Luis </option>
                        <option value="santa_cruz"> Santa Cruz </option>
                        <option value="santa_fe"> Santa Fe </option>
                        <option value="santiago_del_estero"> Santiago del Estero </option>
                        <option value="tierra_del_fuego"> Tierra del Fuego </option>
                        <option value="tucumán"> Tucumán </option>
                    </select>
                    <label class="" for="provincia_denunciado">Provincia</label>
                </div>
            </div>
            {{-- FIN DATOS DEL DENUNCIADO --}}



            {{-- DATOS DEL RECLAMO --}}
            <div class="row m-2 p-3 rounded-3 justify-content-center text-center">
                <h3 class="col-12 text-decoration-none">Datos del Reclamo</h3>
                <div class="form-floating col-12 mt-3 mb-1 m-auto">
                    <input type="text" id="asunto" name="asunto" class="form-control col-12">
                    <label class="" for="asunto">Asunto</label>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3 mb-1 m-auto">
                    <select class="rounded-3 form-control" name="sector" id="sector" required>
                        <option value="" >Seleccionar...</option>
                        <option value="Defensa_al_Consumdor">Defensa al consumidor</option>
                        <option value="Dirección_de_Tecnología">Dirección de Tecnología</option>
                        <option value="Secretaría_de_cultura_y_deporte">Secretaría de cultura y deporte</option>
                        <option value="Secretaría_de_hacienda_y_finanzas">Secretaría de hacienda y finanzas</option>
                        <option value="Secretaría_de_inclusión_social">Secretaría de inclusión social</option>
                        <option value="Secretaría_de_infraestructura">Secretaría de infraestructura</option>
                        <option value="Secretaría_de_planificación_y_gestión">Secretaría de planificación y gestión</option>
                        <option value="Secretaría_de_salud">Secretaría de salud</option>
                        <option value="Dirección_de_turismo">Dirección de turismo</option>
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
                    <textarea type="text" id="motivo" name="motivo" class="form-control"
                        style="height: 150px"></textarea>
                    <label for="motivo">Ingrese el Motivo</label>
                </div>
            </div>
            <div class="row m-2 p-3 rounded-3 justify-content-center text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill">Enviar</button>
            </div>
        </div>
        {{-- FIN DATOS DEL RECLAMO --}}
    </form>
</div>

@endsection
