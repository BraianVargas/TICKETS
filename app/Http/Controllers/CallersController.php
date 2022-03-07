<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Callers;

class CallersController extends Controller
{
    public function index()
    {
        return view('callers.index');
    }

    public function create()
    {
        return view('callers.create-new');
    }

    public function create_new()
    {
        // CREATION SECTION
        $client = Callers::where('dni', request('dni_denunciante'))->first();
        if($client != null)
        {
            return back()->with('error', 'El cliente ya existe');
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
            return back()->with('success', 'Cliente creado correctamente');
        }
    }
    public function show()
    {
        return view('callers.show');
    }

    public function searchCallerByDni(){
        return view('callers.searchByDni');
    }
    public function postSearchByDni(){
        $callers = Callers::where('dni', request('dni'))->first();
        if ($callers == null)
        {
            return back()->with('error', 'El cliente no existe');
        }
        else
        {
            return view('callers.showCaller', compact('callers'));
        }
    }

    public function searchCallerById(){
        return view('callers.searchById');
    }
    public function postSearchCallerById(){
        $callers = Callers::where('id', request('idCaller'))->first();
        if ($callers == null)
        {
            return back()->with('error', 'Cliente no encontrado');
        }
        else
        {
            return view('callers.showCaller', compact('callers'));
        }
    }


    public function edit($id){
        $callers = Callers::where('id', $id)->first();
        return view('callers.editUser', compact('callers'));
    }
    public function postEdit($id){
        $callers = Callers::where('id', $id)->first();

        $callers->name = request('name');
        $callers->lastname = request('lastname');
        $callers->dni = request('dni');
        $callers->mail = request('mail');
        $callers->phone = request('phone');
        $callers->location = request('location');
        $callers->update();
        return back()->with('success', 'Cliente editado correctamente');
    }

}
