<?php

namespace sicaab\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use sicaab\Proveedor;
use Illuminate\Contracts\View\View;

class ProveedoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Proveedor::all();
    }
}
