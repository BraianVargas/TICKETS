<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use App\Models\Tickets;
use App\Models\Callers;
use App\Models\Denunciado;
use App\Models\Reclamos;

class ReportsReclamos implements WithHeadings, FromCollection
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


    public function headings():array {
        return [
            'Id de Ticket',
            'Asunto',
            'Estado',
            '   ',
            'Detalle de reclamo',
            'Nombre de editor',
            'Nombre de cliente',
            'Fecha de Creacion',
            'Ultima Modificacion',
        ];
    }
}
