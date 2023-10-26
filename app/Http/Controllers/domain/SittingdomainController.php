<?php

namespace App\Http\Controllers\domain;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Payment;
use App\Models\Tenancy\SittingDomain;
use App\Models\Ticket;
use App\Models\Ticketdomain;
use DateTime;
use Illuminate\Http\Request;

class SittingdomainController extends Controller
{
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
    public function create($id)
    {
        //
               
        $sitt=SittingDomain::find($id);
        return view('domain.sittingdomain' ,['data'=>$sitt]);
    }



    public function Payment(Request $request)
    {


      

        $peyment=$_SERVER['REQUEST_URI'];
        $urk=explode("/", $peyment);
   
        // $Tenacy=Domain::find($urk[3]);
        $dom =SittingDomain::find($urk[3]);
        $domainc =Domain::find($urk[3]);
     
     if($request->status=="paid"){
       
        // $user=User::find($urk[2]);
        
        $time = new DateTime('now');
        $newtime = $time->modify('+1 year')->format('Y-m-d');
        $dom->datatime = $newtime;
        $dom->save();

        $pay =new Payment();
        $pay->numberBay =$request->id;
        $pay->Status =$request->status;
        $pay->Price =$request->amount;
        $pay->data = date("Y-m-d");
        $pay->period ="Years";
        $pay->idUser =$urk[3]; 
        $pay->save();

       
      
        return redirect('http://'.$domainc->domain.config('Sitting.port').'/en/timeactive/'.$dom.'');

        // flash()->addSuccess('لقد تم تسجيلكم بنجاح 
        // سيتم التواصل معكم من قبل فريق عمل منصة مساند المتحدة لإنشاء متجركم الإلكتروني خلال 30 يوم بحد أقصى');

     }else{

        return redirect('http://'.$domainc->domain.config('Sitting.port').'');


     }



    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //\\
      
        $dom =SittingDomain::find($request->Iddomain);
        if($request->active ==null)
        $dom->active =0;
        else
        {
            
            $dom->active = 1;
            $pay =new Payment();
            $pay->numberBay ="111111111111111111111";
            $pay->Status ="paid";
            $pay->Price ="1000";
            $pay->data = date("Y-m-d");
            $pay->period ="Years";
            $pay->idUser =$request->Iddomain;
            $pay->save();
        }
      
        $dom->payment = $request->Payment;
        $dom->datatime = $request->datatime;
        $dom->entitytype = $request->type;
        $dom->category = $request->Categourt;
        $dom->save();

        $domainc =Domain::find($request->Iddomain);
        // dd($dom->domain);
        http://127.0.0.1:900/
        return redirect('http://'.$domainc->domain.config('Sitting.port').'/en/data/'.$dom.'');
        // return redirect('http://'.$domainc->domain.':8000/en/data/'.$dom.'');
        return back();
        
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
