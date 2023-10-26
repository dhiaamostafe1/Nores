<?php

namespace App\Http\Controllers\Tenancy\Mostafed;

use App\Exports\MostafidExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tenancy\Account_Tree;
use App\Models\tenancy\Mostafid;
use App\Models\tenancy\SittingAccount;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf;

class MostafedController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Client =Mostafid::where('Kindly', '=', 1)->Paginate(5);
    
        return view('Tenancy.Mostafed.Cleint',['data'=>$Client ,'type' =>1]);
    }

    public function indexSupplier()
    {
        //
        $Client =Mostafid::where('Kindly', '=', 2)->Paginate(5);
    
        return view('Tenancy.Mostafed.Supplier',['data'=>$Client ,'type' =>2]);
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



    public function print()
    {

        $data =Mostafid::where('Kindly', '=', 1)->get();
        
        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
      
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;

        $mpdf->SetDirectionality('rtl');
        $mpdf->WriteHTML(view('pdf.Mostafed',['data' =>$data ,'name' =>'Client']));
        $mpdf->Output();
    }



    public function excel()
    {
        return Excel::download(new MostafidExport, 'Mostafid.xlsx');

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


      
    if($request->idMostafid == -1){
        $cat =0;
        $king=0;
        $source =SittingAccount::find(1);
        if( $request->Kindly ==1){
            $cat = Account_Tree::where('AccountSource', '=', $source->client)->count();
            $king = Account_Tree::where('id', '=', $source->client)->firstorfail();
        }else{

            $cat = Account_Tree::where('AccountSource', '=', $source->supplier)->count();
            $king = Account_Tree::where('id', '=', $source->supplier)->firstorfail();

        }
     
        $Acc= new Account_Tree();
        $Acc->DebitAccount =0;
        $Acc->CreditAccount =0;
        $Acc->BalanceAccount =0;
        $Acc->AccountID = $king->AccountID."".($cat+1);
        $Acc->AccountName = $request->NameCleint;

        $Acc->Type =0;
        if($request->Kindly==1)
        $Acc->AccountSource =$source->client;
        else
        $Acc->AccountSource =$source->supplier;
//-----------------------------------------
        $Acc->WiewInFavorites =0;
//---------------------------------------
        $Acc->ACC_MAIN =0;
 //----------------------------------------------------      
       
        $Acc->save();


        $ACCOUNT=Account_Tree::all()->last();

        $cat = new Mostafid();
      
        $cat->Name = $request->NameCleint;
        $cat->Mobile = $request->MobileClient;

        $cat->Email = $request->EmailClient;
        $cat->Address = $request->AddressClient;
        $cat->Max_credit = $request->MaxcreditClient;

        $cat->Vat_No = $request->VatClient;
        if($request->Active==1)
        $cat->Activ = 1;
        else
        $cat->Activ = 0;
        $cat->ACC_NO =  $ACCOUNT->AccountID;
        $cat->Kindly = $request->Kindly;
        $cat->acountAny= $ACCOUNT->id;
        $cat->save();

    }else{

        $cat = Mostafid::find($request->idMostafid);
      
        $cat->Name = $request->NameCleint;
        $cat->Mobile = $request->MobileClient;

        $cat->Email = $request->EmailClient;
        $cat->Address = $request->AddressClient;
        $cat->Max_credit = $request->MaxcreditClient;

        $cat->Vat_No = $request->VatClient;
        if($request->Active==1)
        $cat->Activ = 1;
        else
        $cat->Activ = 0;
        $cat->ACC_NO = $request->ACClient;
        $cat->Kindly = $request->Kindly;

        $cat->save();

        $acc =Account_Tree::find($cat->acountAny);
            $acc->AccountName=$request->NameCleint;
        $acc->save();

    }
        // return redirect()->back();
        // if($request->Kindly==1)
        return back();
      

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

      

        $data = Mostafid::find($id);
        return response()->json(['state'=>200 ,'count' => $data ]);
        // //  dd($data);
        //   return view('Mostafed.Cleint.EditeClient',['data'=>$data ]);
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

        $cat = Mostafid::find($id);
      
        $cat->Name = $request->NameCleint;
        $cat->Mobile = $request->MobileClient;

        $cat->Email = $request->EmailClient;
        $cat->Address = $request->AddressClient;
        $cat->Max_credit = $request->MaxcreditClient;

        $cat->Vat_No = $request->VatClient;
        if($request->Active==1)
        $cat->Activ = 1;
        else
        $cat->Activ = 0;
        $cat->ACC_NO = $request->ACClient;
        $cat->Kindly = $request->Kindly;

        $cat->save();

        $acc =Account_Tree::find($cat->acountAny);
            $acc->AccountName=$request->NameCleint;
        $acc->save();

        
        if($request->Kindly==1)
        return redirect()->route('Client.index');
        // else
        // return redirect()->route('Supplier.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $unite =  Mostafid::find($id);
       
        $acc =Account_Tree::find($unite->acountAny)->delete();
    
       return back();
    
    }
}
