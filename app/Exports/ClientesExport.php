<?php

namespace sicaab\Exports;

use sicaab\Clientes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;

class ClientesExport implements FromCollection
{
    public function collection()
    {
        return Clientes::all();
    }
}
