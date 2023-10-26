@extends('Tenancy.layouts.apptenancy')

@section('body')

<style>
  .form-control{
    HEIGHT: 32px !important;
  }
</style>



@if(!$data->isEmpty())
    <div class="card  mb-3">
        <div class="card-header" style="padding: 8px 14px 0px 14px">


            <div class="row">
                <div class="col-lg-9 col-sm-6 col-xs-6 ">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                        <a href="{{$data->nextPageUrl()}}" class="btn">Next</a>
                        </li>
                        
        
                    
                    
                        <li role="presentation">
                        <a href="{{$data->previousPageUrl()}}" class="btn">previous</a>
                        </li>
                        {{-- <li role="presentation">
                        <a  class="btn SearchCateroyIcon"  data-bs-toggle="modal" data-bs-target="#SearchCategory" ><i   class="fa fa-search" aria-hidden="true"></i></a>
                        </li> --}}
                        <li role="presentation">
                        <a  class="btn addItembtbnEntry"   ><i   class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </li>
                        <li role="presentation">
                        <a  class="btn EditeItemsBtnEntry"  id="EditeItemsBtnEntry"><i   class="ti-pencil" aria-hidden="true"></i></a>
                        </li>
                        <li role="presentation">
                        <a  class="btn EditeItemsBtnEntry"  id="AcceptItemsBtnEntry"  style="display: none"><i   class="fa fa-check" aria-hidden="true"></i></a>
                        </li>
                        <li role="presentation">
                        <a  class="btn "  id="CloseItemsBtnEntry"  style="display: none"><i   class="fa fa-times" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-6 ">
                    <input type="text" class="form-control  " placeholder="{{__('ItemsCat.search')}}" >
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
                <input type="hidden" id="flagopater" value="0">
                <input type="hidden" id="flagpage" value="2">
                @php
                    $code=$item->Item_cod;
                    $IdItems=$item->id;
                @endphp
                <input type="hidden" id="IdEntryInput" value="{{$item->id}}">
                    <div class="row ">
                        <div class="col-lg-4">

                        
                        
                            <div class="row ">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('Rest.box')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control inputsearch" id="inputItembox" data-links="{{$sys->box}}  data-store="{{$item->box_id}}"  value="{{$box }}">
                                <div class="product_list" >
                                    

                                </div>    
                            </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Rest.BRNCH_NO')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control inputsearch" data-links="{{$sys->brnch}}" data-store="{{$item->Brnch_NO}}" id="inputitemBrnch_NO"value="{{$brnch}}">
                                
                                    <div class="product_list" >
                                    

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row mb-1">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('Rest.ENT_KIND')}}</label>
                                <div class="col-sm-9">
                                    <input class="form-control inputsearchkind" list="datalistOptions" data-links="1"  data-store="{{$type[0]['id']}}" id="inputItemENT_KIND" readonly value="{{$type[0]['Entry_Type']}}">
                                    <div class="product_list" >
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Rest.TAK_NO')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control inputsearchkind" data-links="2" id="inputItemTAK_NO"data-store="{{$item->Tak_NO}}"  value="{{$cost}}">
                                    <div class="product_list" >
                                    
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                        <div class="col-lg-4">
                            <div class="row mb-1">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('Rest.stor_id')}}</label>
                            <div class="col-sm-9">
                                <input class="form-control inputsearch"  id="inputItemStor_id" data-store="{{$item->Stor_id}}" data-links="{{$sys->store}}" value="{{$sore}}">
                            
                                <div class="product_list" >
                                
                                </div>
                            </div>
                            </div>
                            <div class="row mb-1">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Rest.ENT_NOTE')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputItemENd_Note"   value="{{ $item->ENd_Note }}">
                                </div>
                            </div>
                            

                        </div>

                    </div>
                
            
            @endforeach
            
            </form>



        </div>

    </div>




    <div class="card  "  id="tableItemSandat">
        <div class="card-body">
            <div class="table-responsive">
                        
                <table class="table table-hover table-borderless" id="DyanmicTable">
                    <thead>
                        <tr>

                           
                              <th>{{ __('Rest.ACC_NO')}}</th>
                              <th>{{ __('Rest.ACC_NAME')}}</th>
                              <th>{{ __('Rest.MADIN')}}</th>
                              {{-- <th>{{ __('Rest.DAIN')}}</th> --}}
                              <th>{{ __('Rest.CATCH')}}</th>
                              <th style=" width: 25%;">{{ __('Rest.ENT_NOTE')}}</th>
                              <th>{{ __('Rest.COS_CENT_NAME')}}</th>
                        </tr>
                    </thead>

                
                    <tbody  id="ItemCatTableData">
                        @foreach ($data[0]->Childs as $item)
                            <tr id="idItemEntrySubData{{$item->id }}" data-contact="{{$item->id}}" data-falge="0">
                           

                              <td id="ItemCatDataItem_Sell{{$item->id }}"> {{ $item->ACC_NO }}</td>
                              <td id="ItemCatDataname{{$item->id }}"> {{ $item->ACC_Name }}</td>
                              <td id="ItemCatDataItem_CNT{{$item->id }}"> {{ $item->Madin }}</td>
                              {{-- <td id="ItemCatDataItem_NAT{{$item->id }}"> {{ $item->Dain }}</td> --}}
                              <td id="ItemCatDataItem_BAY{{$item->id }}"> {{ $item->Catch }}</td>
                              <td id="ItemCatDataItem_BAY{{$item->id }}"> {{ $item->End_NOT }}</td>
                              {{-- <td id="ItemCatDataItem_NAT{{$item->id }}"> {{ $item->COS_Cent_NO }}</td> --}}
                              <td id="ItemCatDataItem_NAT{{$item->id }}"> {{ $item->COS_Cent_NAMe }}</td>
                              
                              
                              
                              
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
              <a  class="btn AccepENwtItemsBtnEntry "  id="AccepENwtItemsBtnEntry "  ><i   class="fa fa-check" aria-hidden="true"></i></a>
            </li>
        </ul>

    </div>
    <div class="card-body">
        <form id="EntryNewItems"  action="#">
            <input type="hidden" id="flagopatenew" value="2">
            <input type="hidden" id="IdEntryInputnew" value="0">
            
            @csrf
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row ">
                      <div class="col-lg-4">

                
                          <div class="row ">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('Rest.box')}}</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control inputsearch" id="inputItembox" data-links="{{$sys->box}}  data-store="0"  >
                                <div class="product_list" >
                                    
    
                                </div>  
                              </div>
                          </div>

                         
                          <div class="row mb-1">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Rest.BRNCH_NO')}}</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control inputsearch"  data-links="{{$sys->brnch}}" data-store="0" id="inputitemBrnch_NOnew" >
                              
                                <div class="product_list" >
                                  

                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row mb-1">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('Rest.ENT_KIND')}}</label>
                              <div class="col-sm-9">

                                  <input class="form-control inputsearchkind" list="datalistOptions" data-links="1"  data-store="{{$type[0]['id']}}" value="{{$type[0]['Entry_Type']}}"  id="inputItemENT_KINDnew"  readonly>
                                  <div class="product_list" >
                                
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-1">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Rest.TAK_NO')}}</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control inputsearchkind" data-links="2" id="inputItemTAK_NOnew"data-store="0" >
                                <div class="product_list" >
                                
                                </div>
                              </div>
                          </div>
                         

                      </div>
                      <div class="col-lg-4">
                        <div class="row mb-1">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('Rest.stor_id')}}</label>
                          <div class="col-sm-9">
                             <input class="form-control inputsearch"  id="inputItemStor_idnew" data-store="" data-links="{{$sys->store}}" value="">
                           
                             <div class="product_list" >
                            
                             </div>
                          </div>
                        </div>
                        <div class="row mb-1">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Rest.ENT_NOTE')}}</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputItemENd_Notenew"   value="">
                            </div>
                        </div>
                        

                      </div>

                  </div>
        
        </form>
    </div>

</div>

@endif










<script src="{{asset('js/sanadat.js')}}"></script>
<script src="{{asset('js/sanadatsub.js')}}"></script>
<script>
 $('#DyanmicTable').SetEditable({ $addButton: $('#addNewRow')});
</script>






@endsection
