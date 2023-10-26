<?php

namespace App\Http\Controllers\Tenancy\base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\tenancy\Entry_Type;
use Mpdf\Mpdf;

class EntryTypeController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unite =Entry_Type::all();
        return view('Tenancy.base.EntryType',['UserType' => $unite]);
    }



    public function print()
    {
        
           $data=Entry_Type::all();
      
        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
      
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;

        $mpdf->SetDirectionality('rtl');
        $mpdf->WriteHTML(view('pdf.EntryType',['data' =>$data]));
        $mpdf->Output('EntryType.pdf');

        // return view('pdf.Groupppdf');
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


    public function UserTypeUpdate(Request $request)
    {
        //

        if($request->ajax())
        {

            // $request->validate([
            //     'unit' => ['required'],
            // ]);
            $unite = Entry_Type::find($request->input('idEditEntryType'));
            $unite->Entry_Type= $request->input('EditenameEntryType');
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
        if($request->ajax())
        {

            // $request->validate([
            //     'unit' => ['required'],
            // ]);
           
            $unite=new Entry_Type();
            $unite->Entry_Type= $request->input('nameEntryType');
            $unite->save();
            $ur=Entry_Type::all()->last();
            $count=Entry_Type::all()->count();
          return response()->json(['count'=> $count, 'inf'=> $ur]);
        }
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
        $data = Entry_Type::find($id);
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
        $Entry_Type =  Entry_Type::where('id', $id)->firstorfail()->delete();
        $count=Entry_Type::all()->count();
        return response()->json(['state'=>200 ,'count' =>  $count ]);

        
    }
}
