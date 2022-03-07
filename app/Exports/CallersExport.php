<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Callers;

class CallersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array {
        return [
            'id',
            'Nombre',
            'Apellido',
            'DNI',
            'Correo',
            'Telefono',
            'Direccion',
            'Fecha de creación',
            'Ultima modificación'
        ];
    }

    public function collection()
    {
        return Callers::all();
    }
    
    public function filterById(){
        return null;
    }

}
