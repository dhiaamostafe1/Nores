<?php

namespace App\Http\Controllers\Tenancy\base;

use App\Http\Controllers\Controller;
use App\Models\tenancy\Unite;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UniteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unite =Unite::paginate(3);
       
      
        return view('Tenancy.base.Unite',['unit' => $unite]);
    }




    public function print()
    {
        
           $data=Unite::all();

        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
      
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;

        $mpdf->SetDirectionality('rtl');
        $mpdf->WriteHTML(view('pdf.Unite',['data' =>$data]));
        $mpdf->Output('Unite.pdf');
        
        // return view('pdf.Groupppdf');
    }

    public function UniteUpdate(Request $request)
    {
        //

        if($request->ajax())
        {

                    // $request->validate([
        //     'code'          => 'required|string|max:255',
        //     'name'          => 'required|string|max:255',
        //     'group'          => 'required|string|max:255',

        //     'ENg'          => 'required|string|max:255',
        //     'Req'          => 'required|string|max:255',
        //     'Tr'          => 'required|string|max:255',
        // ]);

            $request->validate([
                'EditeInput' => 'required|string|max:255',
            ]);
            $unite = Unite::find($request->input('idEditunit'));
            $unite->unite_name= $request->input('EditeInput');
            $unite->save();
         
          return response()->json(['data'=>$request->all(),'unit'=> $unite ]);
        }
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
        if($request->ajax())
        {

            // $request->validate([
            //     'unit' => ['required'],
            // ]);
            $request->validate([
                'unit' => 'required|string|max:255',
            ]);
         //   
            $unite=new Unite();
            $unite->unite_name= $request->input('unit');
            $unite->save();
             $ur=Unite::all()->last();
             $Count=Unite::all()->count();

          return response()->json(['count'=>$Count, 'inf'=> $ur]);
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
        $data = Unite::find($id);
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
        $unite =  Unite::where('id', $id)->firstorfail()->delete();
        $Count=Unite::all()->count();
        return response()->json(['state'=>200 ,'count' =>  $Count ]);
    }
    
}
