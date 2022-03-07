<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use App\Models\Tickets;
use App\Models\Callers;
use App\Models\Denunciado;
use App\Models\Reclamos;


class Reports implements WithHeadings, FromCollection
{
    //create constructor of class

    private $collection =[];

    public function __construct($collection = null)
    {
        $this->collection = $collection;
        return $this;
    }
    
    public function collection($array = null)
    {
        return new Collection($this->collection);
    }

    public function exportFiltered($tickets)
    {
        $result = [];
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
            dd($result);
            
            return new Collection(
                [$result]
            );
        }else{
            $ticket = $tickets[0];
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
            
            return new Collection(
                [$result]
            );
        }
    }

    public function headings():array {
        return [
            'ID',
            'Motivo',
            'Estado',
            'Prioridad',
            'Sector',
            'Comprobante',
            'Usuario creador',
            'Usuario editor',
            'Nombre Denunciante',
            'Denunciado',
            'Fecha de creacion',
            'Ultima modificacion',
        ];
    }
}
