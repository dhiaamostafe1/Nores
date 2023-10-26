<?php

namespace App\Http\Controllers\Tenancy\Items;
use App\Models\tenancy\Group;
use App\Models\tenancy\Item;
use App\Models\tenancy\Item_Sub;
use App\Models\tenancy\Unite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $Item =Item::simplePaginate(1);
        //  $itemsSub =Item_Sub::where('idItems' ,$Item[0]->id);
           $unite =Unite::all();
           $goup = Group::all();
       //   dd($Item[0]->RELItems);
          return view('Tenancy.move.Category' ,['data' => $Item ,'unit' =>$unite ,'goup' => $goup] );
    }



    public function Tableindex()
    {
        //

   
        $Item =Item_Sub::all();
     
        return view('Tenancy.move.TabaleCategory' ,['data' => $Item] );
    }




    public function lastItemsSub()
    {
        $lastitem=Item_Sub::all()->last();
          return response()->json(['Count'=>$lastitem->id+1]);
        

    }



    public function searchgroup(Request $request)
    {
        if($request->ajax())
        {
           
           
            //$data = Item::where('Item_Name','LIKE',$request->inf.'%')->get();
        //     $data =  Item::where('Item_Name', 'like', '%' .$request->inf . '%')->get();
       $data = Group::where('group_name', 'LIKE', '%'. $request->inf. '%')->get();

       $output = '';
        if (count($data)>0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ;width:90%">';
            foreach ($data as $row) {
                $output .= '<li class="list-group-item  EntryItemsearch" >'.$row->group_name.'</li>';
            }
            $output .= '</ul>';
        }else {
            $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
        }
        return $output;
         
       //  return response()->json(['data'=>'status' ,'inf'=>$data ,'mak'=>$request->all() ]);
        }

    // return response()->json(['data'=>'status' ]);
    }


    public function SearchUnite(Request $request)
    {

        if($request->ajax())
        {
           
           
            //$data = Item::where('Item_Name','LIKE',$request->inf.'%')->get();
        //     $data =  Item::where('Item_Name', 'like', '%' .$request->inf . '%')->get();
       $data = Unite::where('unite_name', 'LIKE', '%'. $request->inf. '%')->get();

       $output = '';
        if (count($data)>0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ">';
            foreach ($data as $row) {
                $output .= '<li class="list-group-item  EntryItemsearch" data-id="'.$row->id.'">'.$row->unite_name.'</li>';
            }
            $output .= '</ul>';
        }else {
            $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
        }
        return $output;
         
       //  return response()->json(['data'=>'status' ,'inf'=>$data ,'mak'=>$request->all() ]);
        }


    }



    public function Search()
    {
        
        $Item =Item::simplePaginate(1);
          return response()->json(['Count'=>'love' ,'data' => $Item ]);
        

    }



    

    public function searchItemsAll(Request $request)
    {
        if($request->ajax())
        {
           
           
            //$data = Item::where('Item_Name','LIKE',$request->inf.'%')->get();
        //     $data =  Item::where('Item_Name', 'like', '%' .$request->inf . '%')->get();
       $data = Item::where('Item_Name', 'LIKE', '%'. $request->inf. '%')->get();

       $output = '';
        if (count($data)>0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1 ;width:90%">';
            foreach ($data as $row) {
                $output .= '<li class=" ItemsiconMove list-group-item  " data-id="'.$row->id.'">'.$row->Item_Name.'</li>';
            }
            $output .= '</ul>';
        }else {
            $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
        }
        return $output;
         
       //  return response()->json(['data'=>'status' ,'inf'=>$data ,'mak'=>$request->all() ]);
        }

    // return response()->json(['data'=>'status' ]);
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



    public function StoryItem(Request $request)
    {
        //

        // $request->validate([
        //     'code'          => 'required|string|max:255',
        //     'name'          => 'required|string|max:255',
        //     'group'          => 'required|string|max:255',

        //     'ENg'          => 'required|string|max:255',
        //     'Req'          => 'required|string|max:255',
        //     'Tr'          => 'required|string|max:255',
        // ]);
     

        if($request->ajax())
        {

            $item=Item::find($request->id);
            $item->Item_cod= $request->code;
            $item->Item_Name= $request->name;
            $item->Item_Group= $request->group;

            $item->Item_Name_E= $request->ENg;
            $item->Brnch_No= $request->Req;
            $item->Trns= $request->Tr;
            $item->Item_Kind= $request->kind;
            $item->save();

            $cont=Item::all()->count();
            $cont=$cont+1;
            return response()->json(['count'=> $cont ]);
        }
    }


    public function storeItemSub(Request $request)
    {
        //

        if($request->ajax())
        {

            if( $request->flag==0)
            {

            $item=Item_Sub::find($request->id);
            $item->Item_Unit= $request->arr[0];
            $item->Item_BAY1= $request->arr[1];
            $item->Item_BAY = $request->arr[2];
            $item->Item_Sell= $request->arr[3];
            $item->Item_CNT = $request->arr[4];
            $item->save();
            $lastitem=Item_Sub::all()->last();
            return response()->json(['Count'=>'Edite' ,'id' =>$lastitem->id+1]);

            }else
            {

                $item=new Item_Sub();
                $item->Item_cod=  $request->code;
                $item->Item_Unit= $request->arr[0];
                $item->Item_BAY1= $request->arr[1];
                $item->Item_BAY = $request->arr[2];
                $item->Item_Sell= $request->arr[3];
                $item->Item_CNT = $request->arr[4];

                $item->idItems =$request->Ent;
                $item->Item_NAT= 0;
                

                $item->Calories= 0;
                $item->Prcnt= 0;
                $item->Offer= 0;
                $item->Brnch_NO= 0;
                $item->Item_Activ= 0;
                $item->Trns= 1;
                

                $item->save();
                $lastitem=Item_Sub::all()->last();
                return response()->json(['Count'=>'insert' ,'id' =>$lastitem->id+1]);
            }
         
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
            

            // -----------------------------------------------------------------
            $item=new Item();
            $item->Item_cod= $request->code;
            $item->Item_Name= $request->name;
            $item->Item_Group= $request->group;

            $item->Item_Name_E= $request->ENg;
            $item->Brnch_No= $request->Req;
            $item->Trns= $request->Tr;

          
            $item->item_activ= 0;
            $item->Item_VAT= 1;
            $item->Item_ORD= 1;
            $item->Item_Kind = $request->kind;

            $item->save();

            if( $request->flag==0)
            {
                $item=new Item_Sub();
                $item->Item_cod=  $request->code;
                $item->Item_Unit= 0;
                $item->Item_BAY1= 0;
                $item->Item_BAY = 0;
                $item->Item_Sell= 0;
                $item->Item_CNT = 0;

            $item->idItems =1;
                $item->Item_NAT= 0;
                

                $item->Calories= 0;
                $item->Prcnt= 0;
                $item->Offer= 0;
                $item->Brnch_NO= 0;
                $item->Item_Activ= 0;
                $item->Trns= 1;
                

                $item->save();

            }
            // // ---------------------------------------------

             $dev=Item::all()->count();

            // ------------------------------------------------
           
            // -----------------------------------
            // $item=new Item_Sub();
            // $item->Item_cod=$request->code;
            // $item->Item_Unit="0";
            // $item->Item_CNT= 0;

            // $item->Item_Sell= 0;
            // $item->Item_BAY= 0;
            // $item->Item_BAY1= 0;
            // $item->Item_NAT= "0";
            // $item->Calories= 0;

            // $item->Prcnt= 0;
            // $item->Offer= 0;
            // $item->Brnch_NO= 0;


            // $item->Item_Activ= 0;
            // $item->Trns= 1;
            // $item->idItems= $dev->id;
    

            // $item->save();

          return response()->json(['count'=> $dev]);
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


    public function editSub($id)
    {
        //
        $data = Item_Sub::find($id);
        
        return response()->json(['state'=>200 ,'count' => $data ]);
    }


    public function editCategory($id)
    {
        //
        $data = Item_Sub::find($id);
        
        return response()->json(['state'=>200 ,'count' => $data ]);
    }


    public function ItemsSubUpdate(Request $request)
    {
        //

        if($request->ajax())
        {

            // $request->validate([
            //     'unit' => ['required'],
            // ]);
            
            // $unite->unite_name= $request->input('EditeInput');
            // $unite->save();

            $item = Item_sub::find($request->input('idEdittemsCatagure'));
            $item->Item_cod= $request->input('inputItemCode');
            $item->Item_Unit= $request->input('inputItemname');
            $item->Item_CNT= $request->input('inputItem_CNT');

            $item->Item_Sell= $request->input('inputItem_Sell');
            $item->Item_BAY= $request->input('inputItem_BAY');
            $item->Item_BAY1= $request->input('inputItem_BAY1');
            $item->Item_NAT= $request->input('inputItem_NAT');

            // $item->Calories= $request->input('inputCalories');
            // $item->Prcnt= $request->input('inputPrcnt');
            // $item->Offer= $request->input('inputOffer');
            // $item->Brnch_NO= $request->input('inputBrnch_NO');


            // $item->item_activ= 0;
            // $item->Item_VAT= 1;
            // $item->Item_ORD= 1;
            // $item->Item_Kind= 1;

            $item->save();
         
          return response()->json(['data'=>$request->all() ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Item =Item::find($id);
    
   
        //   return view('Inventory.items.items',['ItemCat' =>$Item]);
   
          // $item =Item_Sub::where('Item_cod', $data->Item_cod);
           return response()->json(['state'=>200 ,'Items' => $Item ,'itemsREQ' =>  $Item->RELItems]);
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

    public function destroyItemsSub($id)
    {
        //
        $unite =  Item_Sub::where('id', $id)->firstorfail()->delete();
        $Count=Item_Sub::all()->count();
        return response()->json(['count' => '$Count']);

    }
}
