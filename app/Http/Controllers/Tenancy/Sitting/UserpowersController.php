<?php

namespace App\Http\Controllers\Tenancy\Sitting;
use App\Models\tenancy\User_Rull;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserpowersController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //->except(Auth::id());
        if($id ==1)
          $power =User_Rull::where('User_no', '=', 2)->get();
        else
          $power =User_Rull::where('User_no', '=', $id)->get();
        $user =User::all()->except(1);
      
      return view('Tenancy.Sitting.Userpowers' ,['power'=> $power ,'id' =>$id ,'user' =>   $user]);
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
        $po =User_Rull::all()->count();
        
      

        $c ='  ';
        $rows = User_Rull::where('User_no','=' , $request->id)->get();

      
        foreach($rows as $key => $row) {
            if($request->input('inser'.$key) == null)

            $row->Inter = 0;
            else
            $row->Inter = 1;

            if($request->input('ADD'.$key) == null)
            $row->ADD = 0;
            else
            $row->ADD = 1;
            if($request->input('Update'.$key) == null)
            $row->Update = 0;
            else
            $row->Update = 1;

            if($request->input('Delete'.$key) == null)
            $row->Delete = 0;
            else
            $row->Delete = 1;

            if($request->input('Show'.$key) == null)
            $row->Show = 0;
            else
            $row->Show = 1;

            if($request->input('Print'.$key) == null)
            $row->Print = 0;
            else
            $row->Print = 1;
           
            $row->save();
        }
       


       
        
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
