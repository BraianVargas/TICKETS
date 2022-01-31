<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Callers;

class CallersController extends Controller
{
    public function index()
    {
        return ('hola');
    }

    public function create()
    {
        return view('callers.create-new');
    }

    public function create_new()
    {
        $client = Callers::where('dni', request('dni_denunciante'))->first();
        if($client != null)
        {
            return redirect()->route('create-ticket', compact('client'))->with('message', 'El cliente ya existe, realice una nueva busqueda');
        }
        else
        {
            $denunciante = Callers::create(
                [
                'name' => request('name_denunciante'),
                'lastname' => request('apellido_denunciante'),
                'dni' => request('dni_denunciante'),
                'mail' => request('correo_denunciante'),
                'phone' => request('telefono_denunciante'),
                'location' => request('direccion_denunciante'),
                ]
            );
            $denunciante->save();
            return redirect()->route('create-ticket', compact('client'))->with('success', 'Denunciante creado correctamente');
        }
        
    }
}
