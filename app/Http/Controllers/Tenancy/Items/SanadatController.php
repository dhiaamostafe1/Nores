<?php

namespace App\Http\Controllers\Tenancy\Items;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tenancy\Account_Tree;
use App\Models\tenancy\Cost;
use App\Models\tenancy\Entry;
use App\Models\tenancy\Entry_Sub;
use App\Models\tenancy\Entry_Type;
use App\Models\tenancy\SittingAccount;

class SanadatController extends Controller
{

     
    public function indexdaybox()
    {
        $Item =Entry::where('ENd_kind' ,'=' ,'3')->simplePaginate(1);
        $Acc =Account_Tree::all();
        $sitt=SittingAccount::find(1);

    
        $entry =Entry_Type::where('Entry_Type' ,'=' ,'سند صرف ')->get();

       
        if(!$Item->isEmpty()){
            $brn =0;
            $stor =0;
           
            $cost=0;
            foreach($Item as $it)
            {
              $brn  =Account_Tree::find($it->Brnch_NO);
              $stor =Account_Tree::find($it->Stor_id); 
              $box =Account_Tree::find($it->box_id); 
              $cost =Cost::find($it->Tak_NO);
            }
            return view('Tenancy.move.DayBox' ,['data'=>$Item ,'box'=> $box->AccountName  ,'type'=>$entry ,'cost'=> $cost->TAK_NAME  ,'sore'=>$stor->AccountName ,'brnch' =>$brn->AccountName ,'sys'=> $sitt   ] );
        }else
        {
            return view('Tenancy.move.DayBox' ,['data'=>$Item ,'sys'=> $sitt ,'type'=>$entry] );
        }

    }













    public function sanadatQ()
    {


        $entry =Entry_Type::where('Entry_Type' ,'=' ,'سند قبض')->get();
        $Item =Entry::where('ENd_kind' ,'=' ,  $entry[0]['id'] )->simplePaginate(1);
        $Acc =Account_Tree::all();
        $sitt=SittingAccount::find(1);

    
        

       
        if(!$Item->isEmpty()){
            $brn =0;
            $stor =0;
           
            $cost=0;
            foreach($Item as $it)
            {
              $brn  =Account_Tree::find($it->Brnch_NO);
              $stor =Account_Tree::find($it->Stor_id); 
              $box =Account_Tree::find($it->box_id); 
              $cost =Cost::find($it->Tak_NO);
            }
            return view('Tenancy.move.SanadatQ' ,['data'=>$Item ,'box'=> $box->AccountName  ,'type'=>$entry ,'cost'=> $cost->TAK_NAME  ,'sore'=>$stor->AccountName ,'brnch' =>$brn->AccountName ,'sys'=> $sitt   ] );
        }else
        {
            return view('Tenancy.move.SanadatQ' ,['data'=>$Item ,'sys'=> $sitt ,'type'=>$entry] );
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entry =Entry_Type::where('Entry_Type' ,'=' ,'سند صرف ')->get();
        $Item =Entry::where('ENd_kind' ,'=' , $entry[0]['id'])->simplePaginate(1);
        $Acc =Account_Tree::all();
        $sitt=SittingAccount::find(1);

    
       

       
        if(!$Item->isEmpty()){
            $brn =0;
            $stor =0;
           
            $cost=0;
            foreach($Item as $it)
            {
              $brn  =Account_Tree::find($it->Brnch_NO);
              $stor =Account_Tree::find($it->Stor_id); 
              $box =Account_Tree::find($it->box_id); 
              $cost =Cost::find($it->Tak_NO);
            }
            return view('Tenancy.move.Sandatsarf' ,['data'=>$Item ,'box'=> $box->AccountName  ,'type'=>$entry ,'cost'=> $cost->TAK_NAME  ,'sore'=>$stor->AccountName ,'brnch' =>$brn->AccountName ,'sys'=> $sitt   ] );
        }else
        {
            return view('Tenancy.move.Sandatsarf' ,['data'=>$Item ,'sys'=> $sitt ,'type'=>$entry] );
        }
    }



    public function lastEntry()
    {
        $lastitem=Entry_Sub::all()->last();
        return response()->json(['Count'=>$lastitem->id+1]);
        

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



    public function searchKindEntry(Request $request , $id)
    {
        if($request->ajax())
        {
           
           
            //$data = Item::where('Item_Name','LIKE',$request->inf.'%')->get();
        //     $data =  Item::where('Item_Name', 'like', '%' .$request->inf . '%')->get();
       $data = Cost::where('TAK_NAME', 'LIKE', '%'. $request->inf. '%')->get();

       $output = '';
        if (count($data)>0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ">';
            foreach ($data as $row) {
                $output .= '<li class="list-group-item  EntryItemsearch" data-id="'.$row->id.'">'.$row->id.'-'.$row->TAK_NAME.'</li>';
            }
            $output .= '</ul>';
        }else {
            $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
        }
        return $output;
         
       //  return response()->json(['data'=>'status' ,'inf'=>$data ,'mak'=>$request->all() ]);
        }


    }


    public function searchEntry(Request $request , $id)
    {
        if($request->ajax())
        {
           
           
            //$data = Item::where('Item_Name','LIKE',$request->inf.'%')->get();
        //     $data =  Item::where('Item_Name', 'like', '%' .$request->inf . '%')->get();
       $data = Account_Tree::where('ACC_MAIN', '=', 1)->where('AccountName', 'LIKE', '%'. $request->inf. '%')->get();

       $output = '';
        if (count($data)>0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ">';
            foreach ($data as $row) {
                $output .= '<li class="list-group-item  EntryItemsearch"  data-r="2" data-id="'.$row->id.'">'.$row->AccountID.'-'.$row->AccountName.'</li>';
            }
            $output .= '</ul>';
        }else {
            $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
        }
        return $output;
         
       //  return response()->json(['data'=>'status' ,'inf'=>$data ,'mak'=>$request->all() ]);
        }


    }

    public function search(Request $request , $id)
    {
        if($request->ajax())
        {
           
       $data = Account_Tree::where('AccountName', 'LIKE', '%'. $request->inf. '%')->where('AccountSource', '=', $id)->get();

       $output = '';
        if (count($data)>0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ;width:90%">';
            foreach ($data as $row) {
                $output .= '<li class="list-group-item" data-id="'.$row->id.'">'.$row->AccountName.'</li>';
            }
            $output .= '</ul>';
        }else {
            $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
        }
        return $output;
         
       //  return response()->json(['data'=>'status' ,'inf'=>$data ,'mak'=>$request->all() ]);
        }


    }


    public function searchKind(Request $request , $id)
    {
        if($request->ajax())
        {
           
        IF($id=='1'){
            $data = Entry_Type::where('Entry_Type', 'LIKE', '%'. $request->inf. '%')->get();

            $output = '';
             if (count($data)>0) {
                 $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ;width:90%">';
                 foreach ($data as $row) {
                     $output .= '<li class="list-group-item" data-id="'.$row->id.'" >'.$row->Entry_Type.'</li>';
                 }
                 $output .= '</ul>';
             }else {
                 $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
             }
             return $output;

        }else
        {
            $data = Cost::where('TAK_NAME', 'LIKE', '%'. $request->inf. '%')->get();

            $output = '';
             if (count($data)>0) {
                 $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ;width:90%">';
                 foreach ($data as $row) {
                     $output .= '<li class="list-group-item listtakemean" data-id="'.$row->id.'">'.$row->TAK_NAME.'</li>';
                 }
                 $output .= '</ul>';
             }else {
                 $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
             }
             return $output;


        }

         
      
        }


    }




    public function storeEntrySub(Request $request)
    {
        //

        if($request->ajax())
        {



            if($request->flag==0)
            {
            //  $item=Entry_Sub::find($request->id);
              $item= Entry_Sub::find($request->id);
                $item->ACC_Name= $request->ACC_Name;
                $item->End_NOT= $request->End_NOT;
                $item->ACC_NO= $request->ACC_NO;

                if($request->flagpage ==2)
                {
                    $item->Madin= $request->Madin;
                }
             
                else
                {
                    $item->Dain= $request->Madin;
                }
                

                $item->Catch= $request->Catch;
                //$item->COS_Cent_NO= $request->COS_Cent_NO;
                $item->COS_Cent_NAMe= $request->COS_Cent_NAMe;
                $item->save();
                $lastitem =Entry_Sub::all()->last();
                return response()->json(['Count'=>'edit','id' =>$lastitem->id+1]);
            }else{

                $item= new Entry_Sub();
                $item->id=$request->id;
                $item->ACC_Name= $request->ACC_Name;
                $item->End_NOT= $request->End_NOT;
                $item->ACC_NO= $request->ACC_NO;

                if($request->flagpage ==2)
                {
                    $item->Madin= $request->Madin;
                    $item->Dain= 0;
                }
             
                else
                {
                    $item->Dain= $request->Madin;
                    $item->Madin= 0;
                }
           

                $item->Catch= $request->Catch;
                $item->COS_Cent_NO= 0;
                $item->COS_Cent_NAMe= $request->COS_Cent_NAMe;
                $item->idEntry= $request->Ent;
                $item->Expir= date("Y-m-d");
                $item->ENd_NO= 0;
                $item->NOO= 0;


                $item->End_Kind= '';
                $item->Trns= 1;
                $item->save();

                $lastitem =Entry_Sub::all()->last();
                return response()->json(['Count'=>$request->Ent ,'id' =>$lastitem->id+1]);

            }
          

            return response()->json(['Count'=>$request->all()]);

         
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

        
        //

        if($request->flag=='2'){
            $item=new Entry();
            $item->Brnch_NO= $request->Brnch_NO;
            $item->Stor_id= $request->Stor_id;
            $item->ENd_kind= $request->ENT_KIND;
            $item->TAK_NO= $request->TAK_NO;
            $item->ENd_Note= $request->ENd_Note;
            $item->box_id= $request->box;
            $item->Int_NO= 1;
            $item->ENd_Date= date("Y-m-d");
            $item->ENd_Date_A= date("Y-m-d");
            $item->Dele=1;
            $item->Trns=1;
            $item->PCName="open";
            $item->save();
            $last=Entry::all()->last();
            $count=Entry_Sub::all()->count();
            if( $count ==0){

                $item= new Entry_Sub();
                $item->ACC_Name= 0;
                $item->End_NOT=0;
                $item->ACC_NO=0;
                $item->Madin=0;
                $item->Dain= 0;
    
                $item->Catch= 0;
                $item->COS_Cent_NO= 0;
                $item->COS_Cent_NAMe= 0;
                $item->idEntry=  $last->id;
                $item->Expir= date("Y-m-d");
                $item->ENd_NO= 0;
                $item->NOO= 0;
    
    
                $item->End_Kind= '';
                $item->Trns= 1;
                $item->save();
            }
           

            return response()->json(['Count'=> 1 ,'flag'=>'insert' ,'page'=> $request->page]);

        }
       elseif($request->flag=='0'){

         $item=Entry::find($request->id);
         $item->Brnch_NO= $request->Brnch_NO;
         $item->Stor_id= $request->Stor_id;
         $item->ENd_kind= $request->ENT_KIND;
         $item->TAK_NO= $request->TAK_NO;
         $item->ENd_Note= $request->ENd_Note;
         $item->box_id= $request->box;
        // $item->Int_NO= $request->Int_NO;
         $item->save();
        return response()->json(['Count'=>$request->flag]);

        }else 
        {
            
            $item=new Entry();
            $item->Brnch_NO= $request->Brnch_NO;
            $item->Stor_id= $request->Stor_id;
            $item->ENd_kind= $request->ENT_KIND;
            $item->TAK_NO= $request->TAK_NO;
            $item->ENd_Note= $request->ENd_Note;
            $item->Int_NO= 1;
            $item->box_id= $request->box;
            $item->ENd_Date= date("Y-m-d");
            $item->ENd_Date_A= date("Y-m-d");
            $item->Dele=1;
            $item->Trns=1;
            $item->PCName="open";
            $item->save();
            $Count=Entry::all()->count();
            return response()->json(['Count'=> $Count ,'flag'=>'insert' ,'page'=> $request->page]);

        }

        return response()->json(['Count'=>$request->all()]);
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


    public function destroyrestrict($id)
    {
        //
        $unite =  Entry_Sub::where('id', $id)->firstorfail()->delete();
        $Count=Entry_Sub::all()->count();
        return response()->json(['state'=>200 ,'count' => $Count]);

    }

    
}
