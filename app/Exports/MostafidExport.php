<?php

namespace App\Exports;

use App\Models\Mostafid;
use App\Models\Tenancy\Mostafid as TenancyMostafid;
use Maatwebsite\Excel\Concerns\FromCollection;

class MostafidExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TenancyMostafid::all();
    }
}
