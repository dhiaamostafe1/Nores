<?php

namespace App\Http\Controllers\Tenancy\inf;

use App\Http\Controllers\Controller;
use App\Models\tenancy\tables;
use Illuminate\Http\Request;

class TabledateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Cost =tables::all();
    
        return view('Tenancy.inf.Tabledate',['Cost' =>  $Cost]);
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


    public function CostUpdate(Request $request)
    {
        //

        if($request->ajax())
        {

            // $request->validate([
            //     'unit' => ['required'],
            // ]);
            $unite = tables::find($request->input('idEditEntryType'));
            $unite->name= $request->input('EditenameEntryType');
            $unite->save();
         
          return response()->json(['data'=> $unite ]);
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

        // if($request->ajax())
        // {

        //     // $request->validate([
        //     //     'unit' => ['required'],
        //     // ]);
           
            $unite=new tables();
            $unite->name= $request->input('nameEntryType');
            $unite->save();

            return back();
            // $ur=tables::all()->last();
            // $count=tables::all()->count();
        //   return response()->json(['count'=> $count, 'inf'=> $ur]);
        // }
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
        $data = tables::find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Entry_Type =  tables::where('id', $id)->firstorfail()->delete();
        $count=tables::all()->count();
        return response()->json(['state'=>200 ,'count' =>  $count ]);
    }

    
}
