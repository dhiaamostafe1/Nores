<?php

namespace App\Http\Controllers\domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Payment;
use App\Models\Tenancy\SittingDomain;
use App\Models\Tenant;
use DateTime;

class SubdomainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Payment($id)
    {
        $pay= Payment::where('idUser','=' ,$id)->get();
      
        return view('domain.Payment',['data' =>  $pay]);
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
        
        return view('domain.domain');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'company' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255','unique:domains'],
            
            // 'domain' => ['required', 'string', 'max:255', 'unique:domains'],
           // 'password' => ['required', 'string', 'min:8'],
        ]);

        //  dd($request->all());


     
        $tenant1 =Tenant::create(['id' =>  $request->domain ]);
         $tenant1->domains()->create(['domain' =>  $request->domain.config('Sitting.localhost'), 
            'company' => $request->company ,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'active' => 0,
            'password' => $request->Password 
        
        ]);

        $time = new DateTime('now');
        $newtime = $time->modify('+1 year')->format('Y-m-d');
        $tenant1=Domain::all()->last();
        $sitting =new SittingDomain();
        $sitting->active = 0;
        $sitting->payment = "";
        $sitting->datatime =$newtime;
        $sitting->entitytype = "";
        $sitting->category = "";
        $sitting->domainid =  $tenant1->id;
        $sitting->save();
    

        //  return back();



        // // return redirect('http://'.$domainc->domain.config('Sitting.port').'/en/createTenacy/'.$dom.'');
       
        // return redirect('http://sassassasa.localhost:8000/createDomintenancy/sss');
        return redirect('http://'.$request->domain.config('Sitting.localhostport').'createTenacy/'.$tenant1.'');
        //  return redirect('http://'.$request->domain.config('Sitting.localhostport').'/en/createTenacy/'.$tenant1.'');

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
