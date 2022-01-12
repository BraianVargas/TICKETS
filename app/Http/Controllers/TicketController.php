<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denunciante;
use App\Models\Denunciado;
use App\Models\Reclamo;

class TicketController extends Controller
{
    public function create()
    {
        return view('ticket.create');
    }
    
    public function store(){
        $reclamo = Reclamo::create(
            [
            'name_denunciante' => request('name_denunciante'),
            'apellido_denunciante' => request('apellido_denunciante'),
            'dni_denunciante' => request('dni_denunciante'),
            'correo_denunciante' => request('correo_denunciante'),
            'telefono_denunciante' => request('telefono_denunciante'),
            'direccion_denunciante' => request('direccion_denunciante'),
            'razon_social' => request('razon_social'),
            'objeto_denunciado' => request('objeto_denunciado'),
            'direccion_denunciado' => request('direccion_denunciado'),
            'departamento_denunciado' => request('departamento_denunciado'),
            'provincia_denunciado' => request('provincia_denunciado'),
            'asunto' => request('asunto'),
            'sector' => request('sector'),
            'prioridad' => request('prioridad'),
            'comprobante_reclamo' => request('comprobante_reclamo'),
            'motivo' => request('motivo'),
            'estado' => 'Abierto'
            ]
        );

        $denunciante = Denunciante::create(
            [
            'name_denunciante' => request('name_denunciante'),
            'apellido_denunciante' => request('apellido_denunciante'),
            'dni_denunciante' => request('dni_denunciante'),
            'correo_denunciante' => request('correo_denunciante'),
            'telefono_denunciante' => request('telefono_denunciante'),
            'direccion_denunciante' => request('direccion_denunciante'),
            ]
        );
        
        $denunciado = Denunciado::create(
            [
            'razon_social' => request('razon_social'),
            'objeto_denunciado' => request('objeto_denunciado'),
            'direccion_denunciado' => request('direccion_denunciado'),
            'departamento_denunciado' => request('departamento_denunciado'),
            'provincia_denunciado' => request('provincia_denunciado'),
            ]
        );

        
        $reclamo->save();
        $denunciado->save();
        $denunciante->save();

        return redirect('/create_ticket');
    }

    public function show()
    {
        // // find all reclamos
        // if(request('selectEstado') == 'Todos'){
        //     $tickets = Reclamo::all();
        // }else{
        //     $tickets = Reclamo::where('estado', request('selectEstado'))->get();
        // }
        $tickets = Reclamo::all();
        return view('search.verTickets', compact("tickets"));
    }

    // search usre by dni
    public function searchUser()
    {
        return view('search.searchUser');
    }

    public function PostSearchUser()
    {
        $client = Denunciante::where('dni_denunciante', request('dni_denunciante'))->first();
        return view('search.searchUser', compact('client'));
    }

}