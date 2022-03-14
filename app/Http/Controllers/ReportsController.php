<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Reports;
use App\Exports\ReportsReclamos;
use App\Exports\CallersExport;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Models\Tickets;
use App\Models\Callers;
use App\Models\Reclamo;
use App\Models\User;
use App\Models\Denunciado;

class ReportsController extends Controller
{
    public function createExportable($collection = null){
        // dd($collection);
        //Create object of the class REPORTS and generate the collection of the data

        $reports = new Reports([$collection]);
        return $reports;
    }

    public function createExportableReclamos($collection = null){
       $reports = new ReportsReclamos([$collection]);
        return $reports;
    }

    public function index(){
        return view('reports.index');
    }

    public function getFilename($name = "Report"){
        $date = Carbon::now();
        $Filename = $name . ' ' . $date;
        return $Filename;
    }

    public function getIndividuallyTicket($ticket = null){
        // dd($ticket);
        $caller = Callers::where('id', $ticket->caller_id)->first();
        if($caller != null ){
            $name = $caller->name . $caller->lastname;
        }else{
            $name = null;
        }
        $target = Denunciado::where('id', $ticket->target_id)->first();
        if($target != null ){
            $denunciado = $target->razonSocial;
        }else{
            $name = null;
        }
        $item = [
            $ticket->id,
            $ticket->subject,
            $ticket->status,
            $ticket->priority,
            $ticket->sector,
            $ticket->comprobante,
            $ticket->creator_id,
            $ticket->modifier_id,
            $name,
            $denunciado,
            $ticket->creation_datetime,
            $ticket->lastmodif_datetime,
        ];
        $result = $ticket;

        return $result;
    }

    public function TicketsExport()
    {
        $result=[];
        $tickets = Tickets::all();
        foreach ($tickets as $ticket){
            $caller = Callers::where('id', $ticket->caller_id)->first();
            if($caller != null ){
                $name = $caller->name . " " . $caller->lastname;
            }else{
                $name = null;
            }
            $target = Denunciado::where('id', $ticket->target_id)->first();
            if($target != null ){
                $denunciado = $target->razonSocial;
            }else{
                $name = null;
            }
            $item = [
                $ticket->id,
                $ticket->subject,
                $ticket->status,
                $ticket->priority,
                $ticket->sector,
                $ticket->comprobante,
                $ticket->creator_id,
                $ticket->modifier_id,
                $name,
                $denunciado,
                $ticket->creation_datetime,
                $ticket->lastmodif_datetime,
            ];
            array_push($result, $item);
        }

        return Excel::download($this->createExportable($result), $this->getFilename("Tickets").'.xlsx');
    }
    public function ClientsExport()
    {
        $date = Carbon::now();
        $Filename = 'Clientes ' . $date;
        $report = new CallersExport;

        return Excel::download($report, $Filename.'.xlsx');
    }
    public function FilterExport()
    {
        return view('reports.filter');
    }
    public function FilterExportSubmit()
    {
        $result=[];
        $fecha = request('fecha');
        $tickets = Tickets::where('creation_datetime', 'like', '%'.$fecha.'%')->get();
        if (count($tickets) > 1){
            foreach ($tickets as $ticket){
                $caller = Callers::where('id', $ticket->caller_id)->first();
                if($caller != null ){
                    $name = $caller->name . $caller->lastname;
                }else{
                    $name = null;
                }
                $target = Denunciado::where('id', $ticket->target_id)->first();
                if($target != null ){
                    $denunciado = $target->razonSocial;
                }else{
                    $name = null;
                };
                $item = [
                    $ticket->id,
                    $ticket->subject,
                    $ticket->status,
                    $ticket->priority,
                    $ticket->sector,
                    $ticket->comprobante,
                    $ticket->creator_id,
                    $ticket->modifier_id,
                    $name,
                    $denunciado,
                    $ticket->creation_datetime,
                    $ticket->lastmodif_datetime,
                ];
                array_push($result, $item);
            };

            return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');

        }elseif (count($tickets) == 0){
            //If there is no data
            return redirect()->back()->with('error', 'No hay datos para la fecha seleccionada');
        }else{
            $result = getIndividuallyTicket($tickets[0]);

            return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');
        }
    }

    public function FilterExportSubmitByIdCreator()
    {
        $result=[];
        $idCreator= request('idCreator');
        $tickets = Tickets::where('creator_id', $idCreator)->get();
        if (count($tickets) > 1){
            foreach ($tickets as $ticket){
                $caller = Callers::where('id', $ticket->caller_id)->first();
                if($caller != null ){
                    $name = $caller->name . $caller->lastname;
                }else{
                    $name = null;
                }
                $target = Denunciado::where('id', $ticket->target_id)->first();
                if($target != null ){
                    $denunciado = $target->razonSocial;
                }else{
                    $name = null;
                };
                $item = [
                    $ticket->id,
                    $ticket->subject,
                    $ticket->status,
                    $ticket->priority,
                    $ticket->sector,
                    $ticket->comprobante,
                    $ticket->creator_id,
                    $ticket->modifier_id,
                    $name,
                    $denunciado,
                    $ticket->creation_datetime,
                    $ticket->lastmodif_datetime,
                ];
                array_push($result, $item);
            };
            return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');
        }elseif (count($tickets) == 0){
            return redirect()->back()->with('error', 'No hay datos para la fecha seleccionada');
        }else{
            $result = $this->getIndividuallyTicket($tickets[0]);
            return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');
        }
    }


    public function FilterExportSubmitByIdCaller()
    {
        $result=[];
        $idCaller= request('idCaller');
        $tickets = Tickets::where('caller_id', $idCaller)->get();
        if (count($tickets) > 1){
            foreach ($tickets as $ticket){
                $caller = Callers::where('id', $ticket->caller_id)->first();
                if($caller != null ){
                    $name = $caller->name . $caller->lastname;
                }else{
                    $name = null;
                }
                $target = Denunciado::where('id', $ticket->target_id)->first();
                if($target != null ){
                    $denunciado = $target->razonSocial;
                }else{
                    $name = null;
                };
                $item = [
                    $ticket->id,
                    $ticket->subject,
                    $ticket->status,
                    $ticket->priority,
                    $ticket->sector,
                    $ticket->comprobante,
                    $ticket->creator_id,
                    $ticket->modifier_id,
                    $name,
                    $denunciado,
                    $ticket->creation_datetime,
                    $ticket->lastmodif_datetime,
                ];
                array_push($result, $item);
            };

            return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');

        }elseif (count($tickets) == 0){
            //If there is no data
            return redirect()->back()->with('error', 'No hay datos para la fecha seleccionada');
        }else{
            $result = getIndividuallyTicket($tickets[0]);

            return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');

        }

    }


    public function FilterExportSubmitByDniCaller()
    {
        $result=[];
        $dniCaller= request('dniCaller');
        $caller = Callers::where('dni', $dniCaller)->first();
        if($caller != null){
            $tickets = Tickets::where('caller_id', $caller->id)->get();
            if (count($tickets) > 1){
                foreach ($tickets as $ticket){
                    $caller = Callers::where('id', $ticket->caller_id)->first();
                    if($caller != null ){
                        $name = $caller->name . $caller->lastname;
                    }else{
                        $name = null;
                    }
                    $target = Denunciado::where('id', $ticket->target_id)->first();
                    if($target != null ){
                        $denunciado = $target->razonSocial;
                    }else{
                        $name = null;
                    };
                    $item = [
                        $ticket->id,
                        $ticket->subject,
                        $ticket->status,
                        $ticket->priority,
                        $ticket->sector,
                        $ticket->comprobante,
                        $ticket->creator_id,
                        $ticket->modifier_id,
                        $name,
                        $denunciado,
                        $ticket->creation_datetime,
                        $ticket->lastmodif_datetime,
                    ];
                    array_push($result, $item);
                };

                return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');

            }elseif (count($tickets) == 0){
                return redirect()->back()->with('error', 'No hay registro de tickets para el DNI ingresado');
            }else{
                $result = getIndividuallyTicket($tickets[0]);

                return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');

            }
        }

    }

    public function FilterExportSubmitByIdTicket()
    {
        $result = [];
        $idTicket= request('idTicket');
        $ticket = Tickets::where('id', $idTicket)->first();
        if($ticket!=null){
            $item=[
                    $ticket->id,
                    $ticket->subject,
                    $ticket->status,
                    '   ',
                    '   ',
                    '   ',
                    '   ',
                    '   ',
                    '   ',
            ];
            array_push($result, $item);
            $reclamos = Reclamo::where('ticket_id', $ticket->id)->get();
            foreach ($reclamos as $reclamo){
                $item = [
                    '   ',
                    '   ',
                    '   ',
                    '',
                    $reclamo->detail,
                    User::where('id', $reclamo->modifier_id)->first()->name,
                    Callers::where('id', $ticket->caller_id)->first()->name . ' ' . Callers::where('id', $ticket->caller_id)->first()->lastname,
                    $reclamo->creation_datetime,
                    $reclamo->lastmodif_datetime,
                ];
                array_push($result, $item);
                // try {
                // } catch (\Throwable $th) {
                //     return back()->with('error', 'Error 205 - No se pudo descargar el archivo');
                // }

            };
            return Excel::download($this->createExportableReclamos($result), $this->getFilename("Filtered").'.xlsx');
        }elseif($ticket==null){
            return back()->with('error', 'No exsite el ticket #' . $idTicket);
        }elseif (count($tickets) == 0){
            //If there is no data
            return redirect()->back()->with('error', 'No hay datos para la fecha seleccionada');
        }else{
            $result = getIndividuallyTicket($tickets[0]);

            return Excel::download($this->createExportable($result), $this->getFilename("Filtered").'.xlsx');

        }

    }
}
