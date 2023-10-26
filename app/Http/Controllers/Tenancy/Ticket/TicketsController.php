<?php

namespace App\Http\Controllers\Tenancy\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Tenancy\SittingDomain;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function listteckets($id)
    {
        //
        $flage =" ";
        $data=0;


        if($id=='add'){
            $ten =Ticket::all()->count();
            if( $ten != 0){
                $tenlasr =Ticket::all()->last();
                $id = ($tenlasr->id)+1;

                $data =0;
            }else
            {
                $id = 1;
            }
            $flage ="add";
          
        }else{

            $u =Ticket::find($id);
            $flage= $u->name;
            $data =Ticket::where('source','=' ,$id)->get();
           
        }
       
        $user =User::find(2);
        return view('Tenancy.tickets.listteckets',['id' => $id ,'data'=>$data, 'user' => $user ,'flage' =>  $flage]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $taket=Ticket::where('main' ,'=','0')->get();
        
        return view('Tenancy.tickets.tickets' ,['ticket' =>$taket]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    // dd( $request->all());
        $ticket =new Ticket();
        $ticket->name = $request->subject;
        $ticket->state = 0;
        $ticket->sender = $request->name;
        $ticket->message = $request->massage;
        $ticket->source = $request->id;
        if($request->flage =="add")
         $ticket->main = 0;
        else
         $ticket->main = 1;
    
         
        $ticket->save();

       

         $sitting =SittingDomain::find(1);
  
    //   /
        // return redirect()->route('home')->domain('http://'.config('Sitting.backhost').'');
         return  redirect('http://'.config('Sitting.backhost').'/en/Ticket.TicKet/'.$sitting->idDomain.'/'.$request->id.'/'.$request->subject.'/'.$request->massage.'/'.$request->flage.'');

        // return redirect('http://localhost:8000/en/Ticket.TicKet/'.$dom );
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
