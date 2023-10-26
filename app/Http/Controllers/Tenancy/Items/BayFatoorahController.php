<?php

namespace App\Http\Controllers\Tenancy\Items;

use App\Http\Controllers\Controller;
use App\Models\tenancy\Account_Tree;
use App\Models\tenancy\Cost;
use App\Models\tenancy\Invoice;
use App\Models\tenancy\Invoice_Sub;
use App\Models\tenancy\Setting;
use App\Models\tenancy\SittingAccount;
use Illuminate\Http\Request;

class BayFatoorahController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function TRNSFatoorah(Request $request)
    {
        if($request->ajax())
        {
          $fatorh=Invoice::find( $request->id);
          $fatorh->Disc=$request->disc;
          $fatorh->cash=$request->cach;
          $fatorh->Net=$request->net;
          $fatorh->Total=$request->sum;
          $fatorh->Vat=$request->tax;
          $fatorh->Trns=1;
          $fatorh->save();


        return response()->json(['Count'=>$request->all()]);  
        }
    }



    public function lastInvest()
    {
        $lastitem=Invoice_Sub::all()->last();
          return response()->json(['Count'=>$lastitem->id+1 ]);
        

    }







    public function search(Request $request , $ype, $id)
    {
        if($request->ajax())
        {
           
       $data = Account_Tree::where('AccountName', 'LIKE', '%'. $request->inf. '%')->where('AccountSource', '=', $id)->get();

       $output = '';
        if (count($data)>0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ;width:90%">';
            foreach ($data as $row) {
                $output .= '<li class="list-group-item" data-id="'.$row->id.'">'.$row->AccountName.'</li>';
            }
            $output .= '</ul>';
        }else {
            $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
        }
        return $output;
         
       //  return response()->json(['data'=>'status' ,'inf'=>$data ,'mak'=>$request->all() ]);
        }


    }




    public function texsitting(Request $request)
    {


        $sitt=Setting::find(1);
        $data =Invoice_Sub::where('idfatoorah' ,'=' ,  $request->inf)->get();
        return response()->json(['Count'=> $sitt->inv_vat ,'data' => $data]);
    }




    public function createMorBay()
    {
        $Item =Invoice::where('INv_kind','=','11')->simplePaginate(1);
        $Acc =Account_Tree::all();
        $sitt=SittingAccount::find(1);

        $Allsitt=Setting::find(1);
        if(!$Item->isEmpty()){
            $brn =0;
            $stor =0;
            $entry=0;
            $cost=0;
            $Disc=0;
            foreach($Item as $it)
            {

                $count =Invoice_Sub::where('idfatoorah' ,'=' ,   $it->id)->get();
                $SUM=0;
                foreach($count AS  $va){
                    $SUM =   $SUM + $va->Offer;
                }
                $Disc=$it->Disc;
              $brn  =Account_Tree::find($it->brnch_NO);
              $stor =Account_Tree::find($it->stor_id); 
              $box =Account_Tree::find($it->Saf_id);
              $enve =Account_Tree::find($it->repr_no);
              $clinet =Account_Tree::find($it->Cus_NO);
            //   $box =Account_Tree::find($it->Stor_id); repr_no
              $cost =Cost::find($it->Tak_Id);
            }
            return view('Tenancy.Fatoorah.MorBayFatoorah' ,['data'=>$Item,'Disc'=>$Disc,"SUM"=>  $SUM ,"count" =>$count->count() ,"tax"=>  $Allsitt->inv_vat, 'cleint'=>  $clinet->AccountName,'cost'=> $cost->TAK_NAME ,'evne' =>$enve->AccountName ,'box'=>$box->AccountName ,'sore'=>$stor->AccountName ,'brnch' =>$brn->AccountName ,'sys'=> $sitt   ] );
        }else
        {
            return view('Tenancy.Fatoorah.MorBayFatoorah' ,['data'=>$Item ,'sys'=> $sitt] );
        }
    }









    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Item =Invoice::where('INv_kind','=','10')->simplePaginate(1);
        $Acc =Account_Tree::all();
        $sitt=SittingAccount::find(1);

        $Allsitt=Setting::find(1);
        if(!$Item->isEmpty()){
            $brn =0;
            $stor =0;
            $entry=0;
            $cost=0;
            $Disc=0;
            foreach($Item as $it)
            {

                $count =Invoice_Sub::where('idfatoorah' ,'=' ,   $it->id)->get();
                $SUM=0;
                foreach($count AS  $va){
                    $SUM =   $SUM + $va->Offer;
                }
                $Disc=$it->Disc;
              $brn  =Account_Tree::find($it->brnch_NO);
              $stor =Account_Tree::find($it->stor_id); 
              $box =Account_Tree::find($it->Saf_id);
              $enve =Account_Tree::find($it->repr_no);
              $clinet =Account_Tree::find($it->Cus_NO);
            //   $box =Account_Tree::find($it->Stor_id); repr_no
              $cost =Cost::find($it->Tak_Id);
            }
            return view('Tenancy.Fatoorah.bayFatoorah' ,['data'=>$Item,'Disc'=>$Disc,"SUM"=>  $SUM ,"count" =>$count->count() ,"tax"=>  $Allsitt->inv_vat, 'cleint'=>  $clinet->AccountName,'cost'=> $cost->TAK_NAME ,'evne' =>$enve->AccountName ,'box'=>$box->AccountName ,'sore'=>$stor->AccountName ,'brnch' =>$brn->AccountName ,'sys'=> $sitt   ] );
        }else
        {
            return view('Tenancy.Fatoorah.bayFatoorah' ,['data'=>$Item ,'sys'=> $sitt] );
        }
    }
















    public function storeSub(Request $request){



        if($request->flag ==1){
         $inv=new Invoice_Sub();
         $inv->Inv_NO =   $request->inv;
         $inv->Item_no =$request->arr[0];
         $inv->Item_Name = $request->arr[1];
         $inv->Unite = "";
         $inv->Qty = $request->arr[2];;
         $inv->Sell = 0;
         $inv->Bay = $request->arr[3];
         $inv->Disc =$request->arr[4];
         $inv->ToT = $request->arr[5];
         $inv->Vat = $request->arr[6];
         $inv->Offer = $request->arr[8];
 
         $inv->Nat_Cod ="";
         $inv->Exp_date =  date("Y-m-d");
         $inv->Stor =0;
         // $inv->Offer =0 ;
         $inv->Num =0;
         $inv->Inv_kind = "";
         $inv->Note = "";
         $inv->Entry =0;
         $inv->trns =0;
         $inv->idfatoorah = $request->inv;
         
         $inv->save();
         return response()->json(['Count'=>'insert']);
 
        }else{
 
         $inv=Invoice_Sub::find($request->id);
         $inv->Item_no =$request->arr[0];
         $inv->Item_Name = $request->arr[1];
         $inv->Qty = $request->arr[2];;
         $inv->Bay = $request->arr[3];
         $inv->Disc =$request->arr[4];
         $inv->ToT = $request->arr[5];
         $inv->Vat = $request->arr[6];
         $inv->Offer = $request->arr[8];
         $inv->save();
         return response()->json(['Count'=>'Edite']);
 
        }
        
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

        if($request->flag=='2'){
           
            $item=new Invoice();
            $item->brnch_NO= $request->Brnch;
            $item->stor_id= $request->Store;
            $item->Saf_id= $request->box;
            $item->repr_no= $request->Eventy;
            $item->Cus_NO= $request->client;
            $item->Tak_Id= $request->tak;
            $item->inv_NO= 0;



            $item->Doc_No="";
            $item->user_Name= " ";
            $item->datee= date("Y-m-d");
            $item->datea= "0";




            $item->Total= 0;
            $item->Cost= 0;
            $item->Disc= 0;
            $item->Vat= 0;
            $item->Cop= 0; 
            $item->Offer= 0;
            $item->cash= 0;
            $item->Net= 0;




            
            $item->Entry= 0;
            $item->INv_kind=$request->kindffatoorah;
            $item->Notee= "";
            $item->dele= 0;



            $item->num= 0;
            $item->QR_COd_image= "";
            $item->Trns= 0;
            $item->Pcname= "";

            $item->save();


            $items=Invoice::all()->last();
            $Count=Invoice_Sub::all()->count();
            if( $Count==0)
            {
                $inv=new Invoice_Sub();
                $inv->Inv_NO =  0;
                $inv->Item_no = 0;
                $inv->Item_Name =  0;
                $inv->Unite = "";
                $inv->Qty =  0;
                $inv->Sell = 0;
                $inv->Bay = 0;
                $inv->Disc = 0;
                $inv->ToT =  0;
                $inv->Vat =  0;
                $inv->Offer =  0;
        
                $inv->Nat_Cod ="";
                $inv->Exp_date =  date("Y-m-d");
                $inv->Stor =0;
                // $inv->Offer =0 ;
                $inv->Num =0;
                $inv->Inv_kind = "";
                $inv->Note = "";
                $inv->Entry =0;
                $inv->trns =0;
                $inv->idfatoorah = $items->id;
                
                $inv->save();

            }
           
            return response()->json(['Count'=> 1 ,'flag'=>'insert']);

        }
       elseif($request->flag=='0'){

          $item=Invoice::find($request->id);
          $item->brnch_NO= $request->Brnch;
          $item->Saf_id= $request->box;
          $item->stor_id= $request->Store;
          $item->repr_no= $request->Eventy;
          $item->Cus_NO= $request->client;
         $item->Tak_Id= $request->tak;
         $item->Offer=  $request->offer;
         $item->cash=  $request->cachitems;
         $item->Net=  $request->netitems;
        
         $item->save();

        return response()->json(['Count'=>$request->all()]);

        }else 
        {
            
            $item=new Invoice();
            $item->brnch_NO= $request->Brnch;
            $item->stor_id= $request->Store;
            $item->Saf_id= $request->box;
            $item->repr_no= $request->Eventy;
            $item->Cus_NO= $request->client;
            $item->Tak_Id= $request->tak;
            $item->inv_NO= 0;



            $item->Doc_No="";
            $item->user_Name= " ";
            $item->datee= date("Y-m-d");
            $item->datea= "0";




            $item->Total= 0;
            $item->Cost= 0;
            $item->Disc= 0;
            $item->Vat= 0;
            $item->Cop= 0; 
            $item->Offer= 0;
            $item->cash= 0;
            $item->Net= 0;




            
            $item->Entry= 0;
            $item->INv_kind= $request->kindffatoorah;
            $item->Notee= "";
            $item->dele= 0;



            $item->num= 0;
            $item->QR_COd_image= "";
            $item->Trns= 0;
            $item->Pcname= "";

            $item->save();
            $Count=Invoice::all()->count();
            return response()->json(['Count'=> $Count ,'flag'=>'insert']);

        }

        return response()->json(['Count'=>$request->all()]);
    }


    public function destroyItemsSub($id)
    {
        //
        $unite =  Invoice_Sub::where('id', $id)->firstorfail()->delete();
        $Count=Invoice_Sub::all()->count();
        return response()->json(['count' => '$Count']);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
