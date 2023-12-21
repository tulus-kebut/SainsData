<?php

namespace App\Exports;

use App\Models\posyandu;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployedExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return posyandu::all();
    }
}
