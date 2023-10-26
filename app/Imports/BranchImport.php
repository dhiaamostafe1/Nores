<?php

namespace App\Imports;

use App\Models\Tenancy\Account_Tree;
use App\Models\Tenancy\SittingAccount;
use Maatwebsite\Excel\Concerns\ToModel;

class BranchImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $count=SittingAccount::find(1);
        $cat = Account_Tree::where('AccountSource', '=',$count->brnch)->count();
        $king = Account_Tree::where('id', '=',$count->brnch)->firstorfail();
        $Acc= new Account_Tree();
        $Acc->DebitAccount =0;
        $Acc->CreditAccount =0;
        $Acc->BalanceAccount =0;
        $Acc->AccountID = $king->AccountID."".($cat+1);
        $Acc->AccountName = $row[0];

        $Acc->Type =0;
        $Acc->AccountSource = $count->brnch;

          $Acc->WiewInFavorites =0;
        
//---------------------------------------
        $Acc->ACC_MAIN =1;
//----------------------------------------------------      
        
        $Acc->save();

        return  $Acc;
    }
}
