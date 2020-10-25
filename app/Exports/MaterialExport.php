<?php

namespace sicaab\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use sicaab\Material;

class MaterialExport implements FromCollection
{
    public function collection()
    {
        return Material::all();
    }
}
