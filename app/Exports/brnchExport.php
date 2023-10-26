<?php

namespace App\Exports;

use App\Models\Tenancy\Account_Tree;
use App\Models\Tenancy\SittingAccount;
use Maatwebsite\Excel\Concerns\FromCollection;

class brnchExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $count=SittingAccount::find(1);
        return Account_Tree::where('AccountSource', '=',$count->brnch)->get();
       
    }
}
