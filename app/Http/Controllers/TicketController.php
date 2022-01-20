<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denunciante;
use App\Models\Denunciado;
use App\Models\Reclamo;

class TicketController extends Controller
{
    public function create($client=null)
    {
        return view('ticket.create', compact('client'));
    }
    public function index(){
        return view('ticket.index');
    }

    
    public function store(request $request){

        // if dni denunciante is duplicated in denunciantes table then drop an alert
        $client = Denunciante::where('dni_denunciante', request('dni_denunciante'))->first();
        if($client!=null){
            $denunciado = Denunciado::create(
                [
                'razon_social' => request('razon_social'),
                'objeto_denunciado' => request('objeto_denunciado'),
                'direccion_denunciado' => request('direccion_denunciado'),
                'departamento_denunciado' => request('departamento_denunciado'),
                'provincia_denunciado' => request('provincia_denunciado'),
                ]
            );
            $reclamo = Reclamo::create(
                [
                    'denunciante_id' => $client->id,
                    'denunciado_id' => $denunciado->id,
                    'asunto' => request('asunto'),
                    'sector' => request('sector'),
                    'prioridad' => request('prioridad'),
                    'comprobante_reclamo' => request('comprobante_reclamo'),
                    'motivo' => request('motivo'),
                    'estado' => 'Abierto'
                ]
            );

            $reclamo->save();
            $denunciado->save();
            return redirect('/create_ticket')->with('success', 'Reclamo creado correctamente');
        }else{
            
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
            $reclamo = Reclamo::create(
                [
                    'denunciante_id' => $client->id,
                    'denunciado_id' => $denunciado->id,
                    'asunto' => request('asunto'),
                    'sector' => request('sector'),
                    'prioridad' => request('prioridad'),
                    'comprobante_reclamo' => request('comprobante_reclamo'),
                    'motivo' => request('motivo'),
                    'estado' => 'Abierto'
                ]
            );
            
            $reclamo->save();
            $denunciado->save();
            $denunciante->save();
        }
        
        return redirect('/create_ticket');
    }

    public function showWithId($dni){
        $clientes = Denunciante::where('dni_denunciante', $dni)->first();
        $tickets = Reclamo::where('denunciante_id', $clientes->id)->paginate(10);
        $denunciados = Denunciado::all();
        
        if($tickets!=null){
            return view('search.verTickets', compact('tickets','clientes','denunciados'));
        }else{
            return redirect('/search_ticket')->with('error', 'No se encontró el reclamo');
        }
    }

    public function show()
    {
        $clientes = Denunciante::all();
        $denunciados = Denunciado::all();
        $tickets = Reclamo::orderBy('id', 'asc')->paginate(10);
        
        return response()
            -> view('search.verTickets', compact('tickets','clientes','denunciados'));
        // return view('search.verTickets', compact('tickets','clientes','denunciados'));

    }

    //  ****************************************** BUSCA CLIENTES (USUARIOS) POR DNI **************************************************
    public function searchUser()
    {
        return view('search.searchUser');
    }

    public function PostSearchUser()
    {
        $client = Denunciante::where('dni_denunciante', request('dni'))->first();

        if($client){
            // return redirect('/create_ticket', 302, $client=[$result]);
            return view('ticket.create', compact('client'));
        }else{
            return back()->withErrors(['message' => 'Cliente no encontrado']);
        }

    }

    // ***************************************** CONTROLA BUSQUEDAS BY DNI DE CLIENTE ************************************************
    public function searchTicketByDni()
    {
        return view('ticket.searchByDni'); 
    }

    public function postSearchTicketByDni()
    {
        return redirect()->route('viewTicketWithId', ['dni' => request('dni')]);
    }
    
    
    // ***************************************** CONTROLA BUSQUEDAS BY ID DE RECLAMO ************************************************
    public function searchTicketById()
    {
        return view('ticket.searchById'); 
    }

    public function postSearchTicketById()
    {
        $tickets = Reclamo::where('id', request('id'))->first();
        
        if($tickets){
            $clientes = Denunciante::where('id', $tickets->denunciante_id)->first();
            $denunciados = Denunciado::where('id', $tickets->denunciado_id)->first();
            return view('search.verTickets', compact('tickets','clientes','denunciados'));
        }else{
            return back()->withErrors(['message' => 'Reclamo no encontrado']);
        }
    }
    // ***************************************** CONTROLA EDICION DEL RECLAMO ************************************************
    public function editTicket($id)
    {
        // $clientes = Denunciante::where('dni_denunciante', $dni)->first();
        // $denunciados = Denunciado::where('id', $denunciado_id)->first();
        $tickets = Reclamo::where('id', $id)->first();
        return view('ticket.edit', compact('tickets'));
    }
}


