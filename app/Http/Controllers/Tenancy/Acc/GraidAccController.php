<?php

namespace App\Http\Controllers\Tenancy\Acc;

use App\Exports\BankExport;
use App\Exports\boxExport;
use App\Exports\brnchExport;
use App\Exports\storeExport;
use App\Exports\userExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\BankImport;
use App\Imports\BoxImport;
use App\Imports\BranchImport;
use App\Imports\StoreImport;
use App\Models\tenancy\Account_Tree;
use App\Models\tenancy\SittingAccount;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class GraidAccController extends Controller
{
    
    public $IdAcc ;
    /**
     * Display a listing of the resource.
     *indexbox
     * @return \Illuminate\Http\Response
     */











     public function importBank(Request $request)
     {
      
     
        if( $request->flage=="bank")
        {
            Excel::import(new BankImport, request()->file('file'));

        }elseif( $request->flage=="box")
        {
            Excel::import(new BoxImport, request()->file('file'));

        }elseif( $request->flage=="store")
        {
            Excel::import(new StoreImport, request()->file('file'));

        }elseif( $request->flage=="Branch")
        {
            Excel::import(new BranchImport, request()->file('file'));
        }
        

        return back();
     }



     public function Accountguide()
     {
         //
         $cat = Account_Tree::where('AccountSource', '=', 0)->get();
         $data= Account_Tree::all()->first();
        //  foreach($cat as $catr){
        //     dd( $catr->childs);
        //  }
       
       
         return view('Tenancy.Acc.Accountguide' ,['data' =>$cat ,'inf'=> $data]);
       
     }




     public function printstore()
     {
        $count=SittingAccount::find(1);
        $data=Account_Tree::where('AccountSource', '=',$count->store)->get();
        

        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
      
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;

        $mpdf->SetDirectionality('rtl');
        $mpdf->WriteHTML(view('pdf.bank',['data' =>$data ,'name' =>'store']));
        $mpdf->Output();
            
   
     }
     public function Excalstore()
     {
        return Excel::download(new storeExport, 'store.xlsx');
     }





     public function printbrnch()
     {
        $count=SittingAccount::find(1);
        $data=Account_Tree::where('AccountSource', '=',$count->brnch)->get();
   
        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
      
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;

        $mpdf->SetDirectionality('rtl');
        $mpdf->WriteHTML(view('pdf.bank',['data' =>$data ,'name' =>'brnch']));
        $mpdf->Output();
            
      
     }
     public function Excalbrnch()
     {
        return Excel::download(new brnchExport, 'brnch.xlsx');
     }





     public function printbox()
     {
      

        $count=SittingAccount::find(1);
        $data=Account_Tree::where('AccountSource', '=',$count->box)->get();
   
        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
      
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;

        $mpdf->SetDirectionality('rtl');
        $mpdf->WriteHTML(view('pdf.bank',['data' =>$data ,'name' =>'box']));
        $mpdf->Output();
     }

     
     public function Excalbox()
     {
        return Excel::download(new boxExport, 'bank.xlsx');
     }

     
     public function printBank()
     {
       


        $count=SittingAccount::find(1);
        $data=Account_Tree::where('AccountSource', '=',$count->bank)->get();
   
        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
      
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;

        $mpdf->SetDirectionality('rtl');
        $mpdf->WriteHTML(view('pdf.bank',['data' =>$data ,'name' =>'bank']));
        $mpdf->Output();


     }





     public function ExcalBank()
     {
        return Excel::download(new BankExport, 'bank.xlsx');
     }




     
    public function indexbox()
    {
        //
        $count=SittingAccount::find(1);
        $acc=Account_Tree::where('AccountSource', '=', $count->box)->get();
        return view('Tenancy.Acc.Box',['data'=>$acc]);
    }

    public function indexStore()
    {
        //
        $count=SittingAccount::find(1);
        $acc=Account_Tree::where('AccountSource', '=', $count->store)->get();
        return view('Tenancy.Acc.Store',['data'=>$acc]);
    }

    

    public function indexBranch()
    {
        //
        $count=SittingAccount::find(1);
        $acc=Account_Tree::where('AccountSource', '=', $count->brnch)->get();
        return view('Tenancy.Acc.brnch',['data'=>$acc]);
    }

    
    public function index()
    {
        //
        $count=SittingAccount::find(1);
    
        // $this->IdAcc=$count->bank;
        $acc=Account_Tree::where('AccountSource', '=',$count->bank)->get();
        return view('Tenancy.Acc.bank',['data'=>$acc]);
    
    }
    public function indexenvoy()
    {
        //
        $count=SittingAccount::find(1);
    
        // $this->IdAcc=$count->bank;
        $acc=Account_Tree::where('AccountSource', '=',$count->envoy)->get();
        return view('Tenancy.Acc.envoy',['data'=>$acc]);
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

      

        if($request->ajax())
        {

            $typeAcc=0;
            $request->validate([
                'name'          => 'required|string|max:255',
            ]);

            $count=SittingAccount::find(1);
            if($request->flage=="bank")
             $typeAcc =$count->bank;
            elseif($request->flage=="box")
             $typeAcc =$count->box;
            elseif($request->flage=="Branch")
             $typeAcc =$count->brnch;
            elseif($request->flage=="envoy")
             $typeAcc =$count->envoy;
            elseif($request->flage=="Store")
             $typeAcc =$count->store;


              
            $cat = Account_Tree::where('AccountSource', '=', $typeAcc)->count();
            $king = Account_Tree::where('id', '=', $typeAcc )->firstorfail();
            $Acc= new Account_Tree();
            $Acc->DebitAccount =0;
            $Acc->CreditAccount =0;
            $Acc->BalanceAccount =0;
            $Acc->AccountID = $king->AccountID."".($cat+1);
            $Acc->AccountName =$request->name;

            $Acc->Type =0;
            $Acc->AccountSource = $typeAcc;
    //-----------------------------------------
            if($request->Showacount == null)
              $Acc->WiewInFavorites =0;
            else
              $Acc->WiewInFavorites =1;
    //---------------------------------------
            $Acc->ACC_MAIN =1;
    //----------------------------------------------------      
            
            $Acc->save();
            $Count=Account_Tree::where('AccountSource', '=', $typeAcc)->count();
            $Data=Account_Tree::all()->last();


            return response()->json(['count'=> $Count ,'inf' =>$Data]);
        }
    }






    public function BankUpdate(Request $request)
    {

        if($request->ajax())
        {


        $request->validate([
            'EditeInputBank'          => 'required|string|max:255',
        ]);

        
          $Acc=Account_Tree::find($request->input('idEditBank'));
          
          $Acc->AccountName =$request->input('EditeInputBank');


          $Acc->save();

          return response()->json(['count'=>$request->all()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $data = Account_Tree::find($id);
        return response()->json(['state'=>200 ,'count' => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function editAc($id)
    {
        //

        $data = Account_Tree::find($id);
        return response()->json(['state'=>200 ,'count' => $data ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$flage)
    {
        //Branch
        $typeAcc=0;
        $count=SittingAccount::find(1);
        if($flage=="bank")
         $typeAcc =$count->bank;
         elseif($flage=="box")
         $typeAcc =$count->box;   
         elseif($flage=="Branch")
         $typeAcc =$count->brnch;  
         elseif($flage=="envoy")
         $typeAcc =$count->envoy; 
         elseif($flage=="Store")
         $typeAcc =$count->store;   


         

        $Acc =  Account_Tree::where('id', $id)->firstorfail()->delete();
        $Count=Account_Tree::where('AccountSource', '=', $typeAcc)->count();
        return response()->json(['state'=>200 ,'count' =>  $Count ]);
    }
}
