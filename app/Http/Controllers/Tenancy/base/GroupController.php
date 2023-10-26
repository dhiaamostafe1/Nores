<?php

namespace App\Http\Controllers\Tenancy\base;
use App\Models\tenancy\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class GroupController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unite =Group::paginate(3);

        // dd(session()->get('loginuser'));
        // dd($unite);
        return view('Tenancy.base.Group',['Group' => $unite]);
   
    }



    public function GroupUpdate(Request $request)
    {
        //

        if($request->ajax())
        {


            $request->validate([
                'Editenamegroup' => 'required|string|max:255',
                'Editeprintgroup' => 'required|string|max:255',
            ]);
            // $request->validate([
            //     'unit' => ['required'],
            // ]);
            $unite = Group::find($request->input('idEditgroup'));
            $unite->group_name= $request->input('Editenamegroup');
            $unite->group_print= $request->input('Editeprintgroup');
            $unite->save();
         
          return response()->json(['data'=>$request->all(),'unit'=> $unite ]);
        }
    }



    public function print()
    {
        
           $data=Group::all();
        $mpdf = new Mpdf();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
      
        $mpdf->baseScript = 1;
        $mpdf->autoVietnamese = true;

        $mpdf->SetDirectionality('rtl');
        $mpdf->WriteHTML(view('pdf.Groupppdf',['data' =>$data]));
        $mpdf->Output('Group.pdf');

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
                'inputgroupname' => 'required|string|max:255',
                'inputgroupprint' => 'required|string|max:255',
            ]);
           
            $unite=new Group();
            $unite->group_name= $request->input('inputgroupname');
            $unite->group_print= $request->input('inputgroupprint');
            $unite->save();
            $ur=Group::all()->last();
            $Count=Group::all()->count();
          return response()->json(['Count'=>$Count , 'inf'=> $ur]);
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
        $data = Group::find($id);
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
        $unite =  Group::where('id', $id)->firstorfail()->delete();

        $Count=Group::all()->count();
        return response()->json(['state'=>200 ,'count' => $Count]);
    }
}
