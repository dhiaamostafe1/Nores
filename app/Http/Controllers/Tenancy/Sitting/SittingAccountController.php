<?php

namespace App\Http\Controllers\Tenancy\Sitting;

use App\Http\Controllers\Controller;
use App\Models\tenancy\Account_Tree;
use App\Models\tenancy\Group;
use App\Models\tenancy\SittingAccount;
use Illuminate\Http\Request;

class SittingAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = SittingAccount::find(1);
        $tree =Account_Tree::all();
        $Client =Account_Tree::find($data->client);
        $supplier =Account_Tree::find($data->supplier);
        $Box =Account_Tree::find($data->box);
        $Bank =Account_Tree::find($data->bank);
        $Branch =Account_Tree::find($data->brnch);
        $store =Account_Tree::find($data->store);
        $employ =Account_Tree::find($data->employ);
 
        $expenses =Account_Tree::find($data->expenses);
        $tax =Account_Tree::find($data->tax);
        $costsales =Account_Tree::find($data->costsales);
        $salesprofits =Account_Tree::find($data->salesprofits);
        $envoy =Account_Tree::find($data->envoy);
    
 
   
 
        $tree=Array($Client->AccountName,$supplier->AccountName,$Box->AccountName,$Bank->AccountName ,$Branch->AccountName 
        ,$store->AccountName  ,$employ->AccountName,$expenses->AccountName,$tax->AccountName ,$costsales->AccountName 
         ,$salesprofits->AccountName,$envoy->AccountName);
     //    $tree=array($Client->AccountName,$supplier->AccountName ,$Box->AccountName ,$Bank->AccountName,$Branch->AccountName,$store->AccountName);
 
 
             // dd($tree);
         return view('Tenancy.Sitting.SYSAccount' ,['data'=> $data ,'tree' =>$tree ]);

    // $data= Account_Tree::all();
    // dd( $data->all());
    // $unite =Group::paginate(3);
    // // dd($unite);
    // return view('Tenancy.Sitting.SYSAccount',['Group' => $unite]);

    }




    public function Search(Request $request)
    {

        if($request->ajax())
        {

       $data = Account_Tree::where('AccountName', 'LIKE', '%'. $request->inf. '%')->Orwhere('AccountID', 'LIKE', '%'. $request->inf. '%')->get();

       $output = '';
        if (count($data)>0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ;width:90%">';
            foreach ($data as $row) {
                $output .= '<li class="list-group-item list-Acc" data-id="'.$row->id.'">'.$row->AccountName.'</li>';
            }
            $output .= '</ul>';
        }else {
            $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
        }
        return $output;
         
      
        }
    }



    public function Editesys(Request $request)
    {
        //

        if($request->ajax())
        {

            // $request->validate([
            //     'unit' => ['required'],
            // ]);

            $SYS=SittingAccount::find(1);
            $SYS->client=$request->client;
            $SYS->supplier=$request->supplier;
            $SYS->box=$request->box;
            $SYS->bank=$request->bank;
            $SYS->brnch=$request->brnch;
            $SYS->store=$request->store;
            $SYS->employ=$request->employ;
            $SYS->expenses=$request->expenses;
            $SYS->tax=$request->tax;
            $SYS->costsales=$request->costsales;
            $SYS->salesprofits=$request->salesprofits;
            $SYS->envoy=$request->envoy;
            $SYS->save();

           
           
          return response()->json(['Count'=>$request->all()]);
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

            $SYS=SittingAccount::find(1);
            $SYS->client=$request->client;
            $SYS->supplier=$request->supplier;
            $SYS->box=$request->box;
            $SYS->bank=$request->bank;
            $SYS->brnch=$request->brnch;
            $SYS->store=$request->store;
            $SYS->employ=$request->employ;
            $SYS->expenses=$request->expenses;
            $SYS->tax=$request->tax;
            $SYS->costsales=$request->costsales;
            $SYS->salesprofits=$request->salesprofits;
            $SYS->envoy=$request->envoy;
            $SYS->save();

           
           
          return response()->json(['Count'=>$request->all()]);
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
