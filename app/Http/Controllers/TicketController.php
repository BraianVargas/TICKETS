<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Callers;
use App\Models\Tickets;
use App\Models\Denunciado;
use App\Models\Reclamo;

class TicketController extends Controller
{
    public function index(){
        return view('ticket.index');
    }
    public function create()
    {   
        return view('ticket.create');
    }

    public function store(request $request)
    {
        $client = Callers::where('dni', request('dni_denunciante'))->first();
        if($client == null){
            $client = Callers::create(
                [
                    'name' => request('name_denunciante'),
                    'lastname' => request('apellido_denunciante'),
                    'dni' => request('dni_denunciante'),
                    'mail' => request('correo_denunciante'),
                    'phone' => request('telefono_denunciante'),
                    'location' => request('direccion_denunciante'),
                ]
            );
            $denunciado = Denunciado::create(
                [
                    'razonSocial' => request('razon_social'),
                    'objectService' => request('objeto_denunciado'),
                    'location' => request('direccion_denunciado'),
                    'department' => request('departamento_denunciado'),
                    'province' => request('provincia_denunciado'),
                ]
            );
            $tickets = Tickets::create(
                [
                    'subject' => request('asunto'),
                    // status está abierto
                    'priority' => request('prioridad'),
                    'sector' => request('sector'),
                    'comprobante' => request('comprobante_reclamo'),

                    'creator_id' => Auth::id(),
                    'modifier_id' => Auth::id(),
                    'caller_id' => $client->id,
                    'target_id' => $denunciado->id,
                    
                    'creation_datetime' => date('Y-m-d H:i:s'),
                    'lastmodif_datetime' => date('Y-m-d H:i:s'),
                ]
            );
            $reclamo = Reclamo::create(
                [
                    'detail' => request('detalle_reclamo'),
                    'ticket_id' => $tickets->id,
                    'user_id' => Auth::user()->id,
                    'creation_datetime' => date('Y-m-d H:i:s'),
                    'lastmodif_datetime' => date('Y-m-d H:i:s'),
                ]
            );
            
            $client->save();
            $tickets->save();
            $reclamo->save();
            $denunciado->save();
            return redirect('/create_ticket')->with('success', 'Reclamo creado correctamente');
        }else{
            $denunciado = Denunciado::create(
                [
                    'razonSocial' => request('razon_social'),
                    'objectService' => request('objeto_denunciado'),
                    'location' => request('direccion_denunciado'),
                    'department' => request('departamento_denunciado'),
                    'province' => request('provincia_denunciado'),
                ]
            );
            $tickets = Tickets::create(
                [
                    'subject' => request('asunto'),
                    // status está abierto
                    'priority' => request('prioridad'),
                    'sector' => request('sector'),
                    'comprobante' => request('comprobante_reclamo'),

                    'creator_id' => Auth::id(),
                    'modifier_id' => Auth::id(),
                    'caller_id' => $client->id,
                    'target_id' => $denunciado->id,
                    'creation_datetime' => date('Y-m-d H:i:s'),
                    'lastmodif_datetime' => date('Y-m-d H:i:s'),

                ]
            );
            $reclamo = Reclamo::create(
                [
                    'detail' => request('motivo'),
                    'ticket_id' => $tickets->id,
                    'user_id' => Auth::user()->id,
                    'creation_datetime' => date('Y-m-d H:i:s'),
                    'lastmodif_datetime' => date('Y-m-d H:i:s'),
                ]
            );
            
            $tickets->save();
            $reclamo->save();
            $denunciado->save();
        }
        
        return redirect('/create_ticket');
    }

    public function showWithDni($dni){
        $clientes = Callers::where('dni', $dni)->first();
        if($clientes!=null){
            $tickets = Tickets::where('caller_id', $clientes->id)->paginate(10);
            return view('search.verTickets', compact('tickets','clientes'));
        }else{
            return redirect('/search_ticket')->with('error', 'No se encontró el reclamo');
        }
    }

    public function show()
    {
        $clientes = Callers::all();
        $denunciados = Denunciado::all();
        $tickets = Tickets::orderBy('id', 'asc')->paginate(10);
        
        return response()
            -> view('search.verTickets', compact('tickets','clientes','denunciados'));
    }

    //  ****************************************** BUSCA CLIENTES (USUARIOS) POR DNI **************************************************
    public function searchUser()
    {
        return view('search.searchUser');
    }

    public function PostSearchUser()
    {
        $client = Callers::where('dni', request('dni'))->first();
        if($client!=null){
            $tickets = Tickets::where('caller_id', $client->id)->paginate(10);
            
            if($tickets){
                return view('ticket.new-ticket', compact('tickets','client'));
            }else{
                return back()->withErrors(['message' => 'No se encontraron tickets']);
            }
        }else{
            return back()->withErrors(['message' => 'No se encontró el cliente']);
        }


    }

    // ***************************************** CONTROLA BUSQUEDAS BY DNI DE CLIENTE ************************************************
    public function searchTicketByDni()
    {
        return view('ticket.searchByDni'); 
    }

    public function postSearchTicketByDni()
    {
        return redirect()->route('create-ticket', ['dni' => $caller->dni]);
    }
    
    // ***************************************** CONTROLA BUSQUEDAS BY ID DE RECLAMO ************************************************
    public function searchTicketById()
    {
        return view('ticket.searchById'); 
    }

    public function postSearchTicketById()
    {
        $tickets = Tickets::where('id', request('id'))->first();
        if($tickets){
            return view('search.verTickets', compact('tickets'));
        }else{
            return back()->withErrors(['message' => 'Reclamo no encontrado']);
        }
    }
    // ***************************************** CONTROLA EDICION DEL RECLAMO ************************************************
    public function editTicket($id)
    {
        $tickets = Tickets::where('id', $id)->first();
        return view('ticket.edit', compact('tickets'));
    }

    public function postEditTicket($id)
    {
        $tickets = Tickets::where('id', $id)->first();
        $tickets->lastmodif_datetime = date('Y-m-d H:i:s');
        $tickets->modifier_id = Auth::id();
        // $tickets->status = request('status');
        $tickets->update();
        $reclamos = Reclamo::create(
            [
                'detail' => request('detail'),
                'ticket_id' => $id,
                'user_id' => Auth::user()->id,
                'creation_datetime' => date('Y-m-d H:i:s'),
                'lastmodif_datetime' => date('Y-m-d H:i:s'),
            ]
        );
        return back()->withErrors('success', 'Ticket editado correctamente');
    }

    public function closeTicket($id)
    {
        $tickets = Tickets::where('id', $id)->first();
        $tickets->lastmodif_datetime = date('Y-m-d H:i:s');
        $tickets->modifier_id = Auth::id();
        $tickets->status = 'Cerrado';
        $reclamos = Reclamo::create(
            [
                'detail' => request('detail'),
                'ticket_id' => $id,
                'user_id' => Auth::user()->id,
                'creation_datetime' => date('Y-m-d H:i:s'),
                'lastmodif_datetime' => date('Y-m-d H:i:s'),
            ]
        );
        $tickets->update();
        return back()->withErrors('success', 'Ticket editado correctamente');
    }
}


