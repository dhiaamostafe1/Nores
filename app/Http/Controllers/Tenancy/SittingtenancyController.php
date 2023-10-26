<?php

namespace App\Http\Controllers\Tenancy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\tenancy\Account_Tree;
use App\Models\tenancy\Entry_Type;
use App\Models\tenancy\Setting;
use App\Models\tenancy\SittingAccount;
use App\Models\tenancy\User_Rull;
use App\Models\User;
use App\Models\Tenancy\SittingDomain as TenancySittingDomain;
use Illuminate\Support\Facades\Hash;

class SittingtenancyController extends Controller
{


    public function DashboardTenancy()
    {
       return  view('Tenancy.Dashboard');
    }
 

    public function payment(Request $request)
    {

        $sitting =TenancySittingDomain::find(1);

       return  view('Tenancy.Payment',['data' =>$sitting->idDomain]);
    }
 

    
    public function loginTenancy()
    {

        $Sit =TenancySittingDomain::find(1);
      
        return  view('Tenancy.loginTenancy',['data' =>     $Sit  ]);

        
    }




    public function timeactive($name)
    {
       
        $mark= str_replace('"', '',$name);
        $urk=explode(",",$mark);
        $id =explode(":", $urk[0]);
        $active=explode(":", $urk[1]);
        $payment=explode(":", $urk[2]);
        $datatime=explode(":", $urk[3]);
        $entitytype=explode(":", $urk[4]);
        $category=explode(":", $urk[5]);

      
        
        $sitting =TenancySittingDomain::find(1);
        if($active[1]=="1")
        $sitting->active =1;
        else
        $sitting->active =0;
        $sitting->idDomain = trim($id[1] ," ");
        $sitting->payment = trim($payment[1] ," ");
        $sitting->datatime = trim($datatime[1] ," ");
        $sitting->entitytype = trim($entitytype[1] ," ");
        $sitting->category =  trim($category[1] ," ");
        $sitting->save();
        return  redirect('Tenancy.loginTenancy') ;
    }

    public function Activedomain($name) {

      
   
        $mark= str_replace('"', '',$name);
        $urk=explode(",",$mark);
        $id =explode(":", $urk[0]);
        $active=explode(":", $urk[1]);
        $payment=explode(":", $urk[2]);
        $datatime=explode(":", $urk[3]);
        $entitytype=explode(":", $urk[4]);
        $category=explode(":", $urk[5]);

      
        
        $sitting =TenancySittingDomain::find(1);
        if($active[1]=="1")
        $sitting->active =1;
        else
        $sitting->active =0;
        $sitting->idDomain = trim($id[1] ," ");
        $sitting->payment = trim($payment[1] ," ");
        $sitting->datatime = trim($datatime[1] ," ");
        $sitting->entitytype = trim($entitytype[1] ," ");
        $sitting->category =  trim($category[1] ," ");
        $sitting->save();
        return  redirect('http://'.config('Sitting.backhost').'/en/listdomain.create') ;

    }


    public function datetimeclose(){

        $sitting =TenancySittingDomain::find(1);


        $diff = strtotime( $sitting->datatime ) - strtotime( date('Y-m-d') );


        $dat= (int)  abs(round($diff / 86400)) ;

        return response()->json(['data'=>$dat ]);

    }



    public function createTenacy($name) {
    

        // dd($name);
        $urk= str_replace('"', '',$name);
         $mark=explode(",",  $urk );
        $name=explode(":", $mark[4]);
        $email=explode(":", $mark[5]);
        $pass=explode(":", $mark[8]);
        // dd( $name);

       $password=config('Sitting.password');
             
        $active = User::all()->count();
        if( $active == 0 ){


            $UserClient =new User();
            $UserClient->name =  config('Sitting.nameuser');
            $UserClient->email =config('Sitting.email');
            $UserClient->password = Hash::make(strval( $password ) ) ;
            $UserClient->save();

            $data=arrayRull();

            $us= User::all()->last();
            foreach( $data as $key =>$items){
                 
                 $rows = new User_Rull();
                 $rows->User_no=$us->id;
                 $rows->User_Name=$us->name;
                 $rows->Scrn_no=1;
                 $rows->Roll= $key ;
                 
                 $rows->Scrn_Name= $items[0];
                 $rows->Scrn_Name_E=$items[1];
                 $rows->Inter=1;
                 
                 $rows->ADD=1;
                 $rows->Update=1;
                 $rows->Delete=1;
                 $rows->Show=1;
                 $rows->Print=1;
                 $rows->save();
                 
            }


            $UserClient =new User();
            $UserClient->name = trim($name[1] ," ");
            $UserClient->email = trim($email[1] ," ");
            $UserClient->password = Hash::make( strval(  trim($pass[1] ," ")) ) ;
           
            $UserClient->save();

            
            $us= User::all()->last();
            foreach( $data as $key =>$items){
                 
                 $rows = new User_Rull();
                 $rows->User_no=$us->id;
                 $rows->User_Name=$us->name;
                 $rows->Scrn_no=1;
                 $rows->Roll= $key ;
                 
                 $rows->Scrn_Name= $items[0];
                 $rows->Scrn_Name_E=$items[1];
                 $rows->Inter=1;
                 
                 $rows->ADD=1;
                 $rows->Update=1;
                 $rows->Delete=1;
                 $rows->Show=1;
                 $rows->Print=1;
                 $rows->save();
                 
            }


            $sitting =new TenancySittingDomain();
            $sitting->active =0;
            $sitting->payment ="";
            $sitting->idDomain =0;
            $sitting->datatime = date('Y-m-d');
            $sitting->entitytype ="";

            $sitting->category ="";
            $sitting->save();

            $data= AcountGuiddata();



            foreach( $data as $key =>$items){
                 
                    $Acc= new Account_Tree();
                    $Acc->DebitAccount =0;
                    $Acc->CreditAccount =0;
                    $Acc->BalanceAccount =0;
                    $Acc->AccountID = $items[1];
                    $Acc->AccountName =$items[0];
            
                    $Acc->Type =0;
                    $Acc->AccountSource =$items[2];
            //-----------------------------------------
                    $Acc->WiewInFavorites =0;
            //---------------------------------------
                    $Acc->ACC_MAIN =0;
             //----------------------------------------------------      
                    $Acc->save();  
            }


            

                    $SYS= new SittingAccount;
                    $SYS->client=5;
                    $SYS->supplier=19;
                    $SYS->box=3;
                    $SYS->bank=4;
                    $SYS->brnch=16;
                    $SYS->store = 6;
                    $SYS->employ=7;
                    $SYS->expenses=1;
                    $SYS->tax=1;
                    $SYS->costsales=1;
                    $SYS->salesprofits=1;
                    $SYS->envoy=39;
                    $SYS->Userid= 2;
                    
                    $SYS->save();
                    $sett=new  Setting();
                    $sett->Pc_name ="dd";
                    $sett->ipp = $us->id;
                    $sett->login_kind =0;
                    $sett->tr_inv =0;
                    $sett->Catories =0;
                    $sett->purch_add =0;
                    $sett->boy_prcnt =0;
            
                    $sett->inv_rtrn_D=0;
            
                    $sett->prnt_sml ="dd";
                    $sett->prnt_A4 ="dd";
                    $sett->prnt_brcd ="dd";
            
                    $sett->prnt_cnt =0;
                    $sett->inv_vat =0;
                    $sett->purch_vat =0;
                    $sett->vat_in =0;
                    $sett->vat_num =0;
                    $sett->inv_prnt_kind =0;
                    $sett->prch_prnt_kind =0;
                    $sett->rpt_prnt_kind =0;
                    $sett->gotocnt =0;
                   
            
                    $sett->INV_AD=0;
            
                    $sett->showunt =0;
                    $sett->showmsgprnt =0;
                    $sett->showoffer =0;
                    $sett->sumitm =0;
                    $sett->inv_crdt =0;
                    $sett->inv_rtrn =0;
                    $sett->inv_tch =0;
                    $sett->VAT_kND =0;
                    $sett->Color =0;
                    $sett->btn_scrn =0;
                    $sett->GRP_CNT =0;
                    $sett->ITM_CNT =0;
                    $sett->GLD_M =0;
            
            
                    $sett->GLD_KSR =0;
                    $sett->GLD_PRC =0;
                    $sett->GLD_WEB =0;
                    $sett->MIZSTR =0;
                    $sett->MIZTQ =0;
                    $sett->TBlE =0;
                    $sett->save();




                    $unite=new Entry_Type();
                    $unite->Entry_Type= "قيود يومية";
                    $unite->save();
                    $unite=new Entry_Type();
                    $unite->Entry_Type= "سند قبض ";
                    $unite->save();
                    $unite=new Entry_Type();
                    $unite->Entry_Type= "سند صرف ";
                    $unite->save();



        }


        // dd(config('Sitting.localhostport'));
      return  redirect('http://'.config('Sitting.backhost').'/en/listdomain.create') ;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
