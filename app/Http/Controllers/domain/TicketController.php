<?php

namespace App\Http\Controllers\domain;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Ticketdomain;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    public function ticketsave($id,$source ,$name,$sub,$flage)
    {
       
           $sitt=Domain::find($id);
           $ticket =new Ticketdomain();
           $ticket->name = $sub;
           $ticket->state = 0;
           $ticket->sender =  $sitt->name;
           $ticket->message = $name;
           $ticket->source = $source;
           if($flage =="add")
            $ticket->main = 0;
           else
            $ticket->main = 1;
            $ticket->Userid =  $sitt->id ;
           $ticket->save();

        
          
           return  redirect('http://'.$sitt->domain.config('Sitting.port').'/en/listteckets.create/'.$source .'');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $pay= Ticketdomain::where('Userid','=' ,$id)->get();
      
        return view('domain.Ticket',['data' =>  $pay]);

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
