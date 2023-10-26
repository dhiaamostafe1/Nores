@extends('Tenancy.layouts.apptenancy')

@section('body')

<style>
  .form-control{
    HEIGHT: 32px !important;
  }
</style>



@if(!$data->isEmpty())
    <div class="card mb-3">
        <div class="card-header"  style="padding: 8px 14px 0px 14px">

            <div class="row">
                <div class="col-lg-9 col-sm-6 col-xs-6 ">
                    {{ manuNavTabAcc($data ,__('All.Next'),__('All.previous'),'addItembtnCategory','EditeItemsBtnCategory','AcceptItemsBtnCategory','CloseItemsBtnCategory',session()->get('loginuser'),16)}}
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-6 ">
                    <input type="text" class="form-control  searchgitemsAll" placeholder="{{__('ItemsCat.search')}}" >
                        <div class="product_list" >
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <form id="CategoryItems"  action="#">
                @csrf

                @foreach ($data as $item)
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @php
                    $code=$item->Item_cod;
                    $IdItems=$item->id;
                @endphp
                <input type="hidden" id="IdCategoryInput" value="{{$item->id}}">
                <input type="hidden" id="flagctegoryinput"  value="1">
                    <div class="row ">
                        <div class="col-lg-5">
                            <div class="row mb-1">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Codecategory')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputItemCode"  value="{{$item->Item_cod}}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Namecategory')}} </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control"  id="inputItemnameCategoryN" value="{{$item->Item_Name}}" >
                                <div class="product_list" >
                                    

                                </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Name_Ecategory')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control"  id="inputitemEnglish"value="{{$item->Item_Name_E}}">
                                </div>
                            </div>
                            
                                

                        </div>
                        <div class="col-lg-5">
                            <div class="row mb-1">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Groupcategory')}}</label>
                                <div class="col-sm-9">
                            
                                    {{-- <input type="text"  list="browsers"  class="form-control" id="inputItemgroup" > --}}
                                    <input class="form-control searchgroup" list="datalistOptions" id="inputItemgroup" placeholder=" search Group" value="{{$item->Item_Group}}">
                                    <div class="product_list" >
                                    

                                    </div>
                                    {{-- <datalist id="datalistOptions">
                                        @foreach ($goup as $it)
                                        <option value="{{$it->group_name}}"> 
                                        @endforeach
                                    
                                    </datalist> --}}
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Brnchcategory')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control"  id="inputItemREQ"  value="{{ $item->Brnch_No }}">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Trnscategory')}}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputItemTR"   value="{{ $item->Trns }}">
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-select form-control" id="inputItemkind" aria-label="Default select example" value="{{ $item->Item_Kind}}">
                                        <option @if ($item->Item_Kind == 'مخزني')
                                            selected
                                        @endif value="مخزني">مخزني</option>
                                        <option @if ($item->Item_Kind == 'خدمي')
                                            selected
                                        @endif value="خدمي">خدمي</option>
                                        <option @if ($item->Item_Kind == 'مركب')
                                            selected
                                        @endif value="مركب">مركب</option>
                                    </select>
                                
                                </div>

                            </div>

                        </div>

                    </div>
                
            
                @endforeach
            
            </form>

        </div>

    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover  table-borderless" id="table-list">
                    <thead>
                        <tr id="tabtabecategory">

                        
                
                            {{-- <th>{{ __('Catagories.Item_cod')}}</th> --}}
                            <th>{{ __('Catagories.Item_Unit')}}</th>

                            <th>{{ __('Catagories.Item_BAY1')}}</th>
                            <th>{{ __('Catagories.Item_BAY')}}</th>
                            <th>{{ __('Catagories.Item_Sell')}}</th>
                            <th>{{ __('Catagories.Item_CNT')}}</th>
                            
                            {{-- <th style="width: 5% ">{{ __('Catagories.Edite')}}</th>
                            <th style="width: 5% ">{{ __('Catagories.Delete')}}</th> --}}
                        </tr>
                    </thead>
                    <tbody  id="ItemCatTableData">
                        @foreach ($data[0]->RELItems as $item)
                            <tr id="idItemCatData{{$item->id }}" data-falge="0" data-contact="{{$item->id }}" data-add="0">
                            {{-- <td id="ItemCatDatacode{{$item->id }}"> {{ $item->Item_cod }}</td> --}}
                            <td id="ItemCatDataname{{$item->id }}"> {{ $item->Item_Unit }}</td>
                            <td id="ItemCatDataItem_BAY{{$item->id }}"> {{ $item->Item_BAY1 }}</td>


                            <td id="ItemCatDataItem_CNT{{$item->id }}"> {{ $item->Item_BAY }}</td>
                            <td id="ItemCatDataItem_Sell{{$item->id }}"> {{ $item->Item_Sell }}</td>
                            

                            <td id="ItemCatDataItem_NAT{{$item->id }}"> {{ $item->Item_CNT }}</td>
                            
                            
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@else


<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation">
              <a  class="btn AccepENwCatagouryBtn "  id="AccepENwCatagouryBtn "  ><i   class="fa fa-check" aria-hidden="true"></i></a>
            </li>
        
        </ul>
    </div>
    <div class="card-body">
        <form id="CategoryItems"  action="#">
            @csrf
    
           
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="IdCategoryInput" >
              <input type="hidden" id="flagctegoryinputnew"  value="0">
                  <div class="row ">
                      <div class="col-lg-5">
                          <div class="row mb-1">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Codecategory')}}</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputItemCodenew"  >
                              </div>
                          </div>
                          <div class="row mb-1">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Namecategory')}} </label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control  "  id="inputItemnameCategoryNnew" >
                              <div class="product_list" >
                                  
    
                              </div>
                              </div>
                          </div>
                          <div class="row mb-1">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Name_Ecategory')}}</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control"  id="inputitemEnglishnew">
                              </div>
                          </div>
                          
                            
    
                      </div>
                      <div class="col-lg-5">
                          <div class="row mb-1">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Groupcategory')}}</label>
                              <div class="col-sm-9">
                        
                                {{-- <input type="text"  list="browsers"  class="form-control" id="inputItemgroup" > --}}
                                <input class="form-control searchgroup" list="datalistOptions" id="inputItemgroupnew" placeholder=" search Group">
                                <div class="product_list" >
                                  
    
                                </div>
                                {{-- <datalist id="datalistOptions">
                                    @foreach ($goup as $it)
                                      <option value="{{$it->group_name}}"> 
                                    @endforeach
                                   
                                </datalist> --}}
                              </div>
                          </div>
                          <div class="row mb-1">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Brnchcategory')}}</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control"  id="inputItemREQnew"  >
                              </div>
                          </div>
                          <div class="row mb-1">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('ItemsCat.Trnscategory')}}</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" id="inputItemTRnew"  >
                              </div>
                              <div class="col-sm-5">
                                  <select class="form-select form-control" id="inputItemkindnew" aria-label="Default select example" >
                                    <option value="مخزني">مخزني</option>
                                    <option value="خدمي">خدمي</option>
                                    <option value="مركب">مركب</option>
                                  </select>
                              
                              </div>
    
                          </div>
    
                      </div>
    
                  </div>
              
        
         
        
          </form>
    </div>


</div>



@endif







<script src="{{asset('js/Category.js')}}"></script>
<script src="{{asset('js/bootstable.js')}}"></script>
<script>
//apply
$("#table-list").SetEditable();

$('#add').click(function() {
    rowAddNew('table-list');
});

</script>
 

@endsection
