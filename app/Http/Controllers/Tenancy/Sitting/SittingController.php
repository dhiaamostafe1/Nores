<?php

namespace App\Http\Controllers\Tenancy\Sitting;

use App\Http\Controllers\Controller;
use App\Models\tenancy\Setting;
use Illuminate\Http\Request;

class SittingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Setting::find(1);


        return view('Tenancy.Sitting.Sitting',['sitting'=> $data ]);
    }



    public function storeRedio(Request $request)
    {

        if($request->ajax())
        {




        
            $Sitt= Setting::find($request->user);
            if($request->name == "fatoorahe")
            $Sitt->tr_inv=$request->val;

            if($request->name == "Saletype")
             $Sitt->inv_prnt_kind=$request->val;
            
             if($request->name == "purchasetype")
             $Sitt->prch_prnt_kind=$request->val;
             if($request->name == "Reportstype")
             $Sitt->rpt_prnt_kind=$request->val;

             
             $Sitt->save();

          return response()->json(['count'=>'sata']);
        }

    }


    public function storeCheck(Request $request)
    {

        if($request->ajax())
        {




                 $mark ="";
            $Sitt= Setting::find($request->user);
            if($request->name=="Catories")
            {
                if($request->val == 0)
                $Sitt->Catories=1 ;
                else
                $Sitt->Catories=0;
               
                $mark ="Catories";
            }
           

            elseif($request->name == "boy_prcnt")
            {
                if($request->val == 0)
                $Sitt->boy_prcnt=1;
                else
                $Sitt->boy_prcnt=0;
                $mark ="boy_prcnt";
            }

            elseif($request->name == "gotocnt")
            {
                if($request->val == 0)
                $Sitt->gotocnt=1;
                else
                $Sitt->gotocnt=0;
                $mark ="gotocnt";
            }

            elseif($request->name == "showunt")
            {
                if($request->val == 0)
                $Sitt->showunt=1;
                else
                $Sitt->showunt=0;
                $mark ="showunt";
            }

            elseif($request->name == "showoffer")
            {
                if($request->val == 0)
                $Sitt->showoffer=1;
                else
                $Sitt->showoffer=0;
                $mark ="showoffer";
            }

            elseif($request->name == "showmsgprnt")
            {
                if($request->val == 0)
                $Sitt->showmsgprnt=1;
                else
                $Sitt->showmsgprnt=0;
                $mark ="showmsgprnt";
            }
            elseif($request->name == "sumitm")
            {
                if($request->val == 0)
                $Sitt->sumitm=1;
                else
                $Sitt->sumitm=0;
                $mark ="sumitm";
            }
            elseif($request->name == "inv_crdt")
            {
                if($request->val == 0)
                $Sitt->inv_crdt=1;
                else
                $Sitt->inv_crdt=0;
                $mark ="inv_crdt";
            }
            elseif($request->name == "TBlE")
            {
                if($request->val == 0)
                $Sitt->TBlE=1;
                else
                $Sitt->TBlE=0;
                $mark ="TBlE";
            }

            elseif($request->name == "inv_tch")
            {
                if($request->val == 0)
                $Sitt->inv_tch=1;
                else
                $Sitt->inv_tch=0;
                $mark ="inv_tch";
            }
            elseif($request->name == "inv_rtrn")
            {
                if($request->val == 0)
                $Sitt->inv_rtrn=1;
                else
                $Sitt->inv_rtrn=0;
                $mark ="inv_tch";
            }




            
            
            
            
            
            
             $Sitt->save();

          return response()->json(['count'=>$mark]);
        }

    }



    public function storenumberstoresale(Request $request)
    {

        $Sitt= Setting::find($request->idSitting);

        $Sitt->GRP_CNT = $request->GRP_CNT;
        $Sitt->ITM_CNT = $request->ITM_CNT;
         $Sitt->inv_rtrn_D = $request->inv_rtrn_D;
        // $Sitt->GLD_PRC = $request->GLD_PRC;
        $Sitt->MIZSTR = $request->MIZSTR;
        $Sitt->MIZTQ = $request->MIZTQ;

        $Sitt->save();
        return redirect()->back();

    }

    public function storenumberstore(Request $request)
    {

        $Sitt= Setting::find($request->idSitting);

       
        $Sitt->inv_vat = $request->inv_vat;
        $Sitt->purch_vat = $request->purch_vat;
        $Sitt->vat_in = $request->vat_in;
        $Sitt->vat_num = $request->Sittingvat_num;


        // $Sitt->GRP_CNT = $request->GRP_CNT;
        // $Sitt->ITM_CNT = $request->ITM_CNT;
        // $Sitt->GLD_KSR = $request->GLD_KSR;
        // $Sitt->GLD_PRC = $request->GLD_PRC;

        // $Sitt->MIZSTR = $request->MIZSTR;
        // $Sitt->MIZTQ = $request->MIZTQ;

       


        $Sitt->save();
        return redirect()->back();

    }


    public function checkstore(Request $request)
    {
        //

        


        
 
        $Sitt= Setting::find($request->idSitting);
        // -------------------------------------------------------
        if($request->login_kind == null)
        $Sitt->login_kind=0;
        else
        $Sitt->login_kind=1;
        // ------------------------------------------------------------
        if($request->tr_inv == null)
        $Sitt->tr_inv=0;
        else
        $Sitt->tr_inv=1;
        // ------------------------------------------------------------
        if($request->Catories == null)
        $Sitt->Catories=0;
        else
        $Sitt->Catories=1;
        // ----------------------------------------------------------------
        if($request->purch_add == null)
        $Sitt->purch_add=0;
        else
        $Sitt->purch_add=1;
        // ------------------------------------------------------------
        if($request->boy_prcnt == null)
        $Sitt->boy_prcnt=0;
        else
        $Sitt->boy_prcnt=1;
        // ------------------------------------------------------------
        if($request->inv_prnt_kind == null)
        $Sitt->inv_prnt_kind=0;
        else
        $Sitt->inv_prnt_kind=1;
        // ----------------------------------------------------------------
        // ----------------------------------------------------------------
        if($request->prch_prnt_kind == null)
        $Sitt->prch_prnt_kind=0;
        else
        $Sitt->prch_prnt_kind=1;
        // ------------------------------------------------------------
        if($request->rpt_prnt_kind == null)
        $Sitt->rpt_prnt_kind=0;
        else
        $Sitt->rpt_prnt_kind=1;
        // ------------------------------------------------------------
        if($request->gotocnt == null)
        $Sitt->gotocnt=0;
        else
        $Sitt->gotocnt=1;
        // ----------------------------------------------------------------
        if($request->showunt == null)
        $Sitt->showunt=0;
        else
        $Sitt->showunt=1;
        // ------------------------------------------------------------
        if($request->showmsgprnt == null)
        $Sitt->showmsgprnt=0;
        else
        $Sitt->showmsgprnt=1;
        // ------------------------------------------------------------
        if($request->showoffer == null)
        $Sitt->showoffer=0;
        else
        $Sitt->showoffer=1;


        // ----------------------------------------------------------------
        // ----------------------------------------------------------------
        if($request->sumitm == null)
        $Sitt->sumitm=0;
        else
        $Sitt->sumitm=1;
        // ------------------------------------------------------------
        if($request->inv_crdt == null)
        $Sitt->inv_crdt=0;
        else
        $Sitt->inv_crdt=1;
        // ------------------------------------------------------------
        if($request->inv_rtrn == null)
        $Sitt->inv_rtrn=0;
        else
        $Sitt->inv_rtrn=1;
        // ----------------------------------------------------------------
        if($request->inv_rtrn_D == null)
        $Sitt->inv_rtrn_D=0;
        else
        $Sitt->inv_rtrn_D=1;
        // ------------------------------------------------------------
        if($request->inv_tch == null)
        $Sitt->inv_tch=0;
        else
        $Sitt->inv_tch=1;
        // ------------------------------------------------------------
        if($request->VAT_kND == null)
        $Sitt->VAT_kND=0;
        else
        $Sitt->VAT_kND=1;
       // ------------------------------------------------------------
        if($request->INV_AD == null)
        $Sitt->INV_AD=0;
        else
        $Sitt->INV_AD=1;
        // ------------------------------------------------------------
        if($request->btn_scrn == null)
        $Sitt->btn_scrn=0;
        else
        $Sitt->btn_scrn=1;
        // ------------------------------------------------------------
        if($request->TBlE == null)
        $Sitt->TBlE=0;
        else
        $Sitt->TBlE=1;






        $Sitt->save();
         return redirect()->back();


        // if($request->ajax())
        // {

        //     // $request->validate([
        //     //     'unit' => ['required'],
        //     // ]);
           
           
        //   return response()->json(['Count'=>'dodoodo']);
        // }
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

        $Sitt= Setting::find($request->idSitting);
        // $Sitt->Pc_name = $request->SittingPc_name;
        $Sitt->prnt_sml = $request->Sittingprnt_sml;
        $Sitt->prnt_A4 = $request->Sittingprnt_A4;
        $Sitt->prnt_brcd = $request->Sittingprnt_brcd;
        $Sitt->prnt_cnt = $request->prnt_cnt;




        $Sitt->save();
        return redirect()->back();
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
