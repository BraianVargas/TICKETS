<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
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
