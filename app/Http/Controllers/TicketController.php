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
    public function create(Request $request){
        $id = $request->id;
        $client = Callers::where('id', $id)->first();
        return view('ticket.create', compact('client', 'id'));
    }

    public function store(request $request)
    {
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('+0800')); //GMT
        $fecha  = $date->format('Y-m-d H:i:s');
        // do a travel cross $fecha and delete the character afer 10 laps
        $fecha = substr($fecha, 0, 10);
        // dd($fecha);

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

                    'creation_datetime' => $fecha,
                    'lastmodif_datetime' => $fecha,
                ]
            );
            $reclamo = Reclamo::create(
                [
                    'detail' => request('detalle_reclamo'),
                    'ticket_id' => $tickets->id,
                    'user_id' => Auth::user()->id,
                    'modifier_id' => Auth::user()->id,
                    'creation_datetime' => $fecha,
                    'lastmodif_datetime' => $fecha,
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
                    'creation_datetime' => $fecha,
                    'lastmodif_datetime' => $fecha,

                ]
            );
            $reclamo = Reclamo::create(
                [
                    'detail' => request('motivo'),
                    'ticket_id' => $tickets->id,
                    'user_id' => Auth::user()->id,
                    'modifier_id' => Auth::user()->id,
                    'creation_datetime' => $fecha,
                    'lastmodif_datetime' => $fecha,
                ]
            );

            $tickets->save();
            $reclamo->save();
            $denunciado->save();
        }

        return back()->with('modal', nl2br("El ticket fué creado correctamente. Nro de ticket: $tickets->id "));
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
        $tickets = Tickets::get()->all();
        if($tickets == null or $tickets == ''){
            $tickets = null;
            $clientes = null;
            $denunciados=null;
            return response()-> view('search.verTickets', compact('tickets','clientes','denunciados'));
        }else{
            $tickets = Tickets::orderBy('id', 'asc')->paginate(10);
            return response()-> view('search.verTickets', compact('tickets','clientes','denunciados'));
        }
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
            $tickets = Tickets::where('caller_id', $client->id)->get();
            if(count($tickets)<=0){
                return redirect(route('newTicket', ['id'=>$client->id],compact('tickets','client',)))->with('error', 'No se encontraron tickets');
            }elseif(count($tickets)>0){
                return redirect(route('newTicket', ['id'=>$client->id],compact('tickets','client',)))->with('success', 'Cliente encontrado, posee tickets');
            }
        }else{
            return back()->withErrors(['error' => 'No se encontró el cliente']);
        }
    }

    public function newTicket($id){
        $client = Callers::where('id', $id)->first();
        $tickets = Tickets::where('caller_id', '=', $id)->paginate(10);
        // $tickets = Tickets::orderBy('id', 'desc')->paginate(10);
        
        return view('ticket.new-ticket', ['id'=>$id], compact('tickets','client'));
    }

    // ***************************************** CONTROLA BUSQUEDAS BY DNI DE CLIENTE ************************************************
    public function searchTicketByDni()
    {
        return view('ticket.searchByDni');
    }

    public function postSearchTicketByDni()
    {
        $client = Callers::where('dni', request('dni'))->first();
        $tickets = Tickets::where('caller_id', $client->id)->first();
        if($tickets == null or $tickets == ''){
            $tickets = null;
            $clientes = null;
            $denunciados=null;
            return back()->withErrors(['message' => 'Reclamo no encontrado']);
        }else{
            $tickets = Tickets::where('caller_id', $client->id);
            $tickets = Tickets::orderBy('id', 'desc')->paginate(10);
            return redirect(route('newTicket', ['id'=>$client->id],compact('tickets','client')));
        }

    }

    // ***************************************** CONTROLA BUSQUEDAS BY ID DE RECLAMO ************************************************
    public function searchTicketById()
    {
        return view('ticket.searchById');
    }

    public function postSearchTicketById()
    {
        $tickets = Tickets::where('id', request('id'))->first();

        if($tickets != null){
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
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('+0800')); //GMT
        $fecha  = $date->format('Y-m-d H:i:s');
        $fecha = substr($fecha, 0, 10);
        
        $tickets = Tickets::where('id', $id)->first();
        $tickets->lastmodif_datetime = $fecha;
        $tickets->modifier_id = Auth::id();
        $tickets->status = request('status');

        $reclamos = Reclamo::create(
            [
                'detail' => request('detail'),
                'ticket_id' => $id,
                'user_id' => Auth::user()->id,
                'modifier_id' => Auth::id(),
                'creation_datetime' => $fecha,
                'lastmodif_datetime' => $fecha,
            ]
        );
        $tickets->update();
        return back()->withErrors('message', 'Ticket editado correctamente');
    }

}


