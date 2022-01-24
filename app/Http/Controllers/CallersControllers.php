<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallersControllers extends Controller
{
    public function index()
    {
        return ('hola');
    }

    public function create()
    {
        return view('cliente.create-new');
    }

    public function create_new()
    {
        $client = Callers::where('dni', request('dni_denunciante'))->first();
        if($client != null)
        {

            // return a message that the client already exists
            return redirect()->route('create-ticket', compact('client'))->with('message', 'El cliente ya existe, realice una nueva busqueda');
        }
        else
        {
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
            $denunciante->save();
            return redirect()->route('create-ticket', compact('client'))->with('success', 'Denunciante creado correctamente');
        }
        
    }
}
