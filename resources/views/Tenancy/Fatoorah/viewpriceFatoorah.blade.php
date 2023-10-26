@extends('Tenancy.layouts.apptenancy')

@section('body')

<style>
  .form-control{
    HEIGHT: 32px !important;
  }

</style>




@if (!$data->isEmpty())
    <div class="card mb-2">
      <div class="card-header" style="padding: 0px 14px 0px 14px">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="{{$data->nextPageUrl()}}" class="btn">{{__('fatoorah.next')}}</a>
          </li>
          

        
        
          <li role="presentation">
            <a href="{{$data->previousPageUrl()}}" class="btn">{{__('fatoorah.previous')}}</a>
          </li>
          {{-- <li role="presentation">
            <a  class="btn SearchCateroyIcon"  data-bs-toggle="modal" data-bs-target="#SearchCategory" ><i   class="fa fa-search" aria-hidden="true"></i></a>
          </li> --}}
          <li role="presentation">
            <a  class="btn addItembtbnfatoorah"   ><i   class="fa fa-plus-circle" aria-hidden="true"></i></a>
          </li>
          <li role="presentation">
            <a  class="btn EditeItemsBtnfatoorah"  id="EditeItemsBtnfatoorah"><i   class="ti-pencil" aria-hidden="true"></i></a>
          </li>
          <li role="presentation">
            <a  class="btn EditeItemsBtnfatoorah"  id="AcceptItemsBtnfatoorah"  style="display: none"><i   class="fa fa-check" aria-hidden="true"></i></a>
          </li>
          <li role="presentation">
            <a  class="btn "  id="CloseItemsBtnfatoorah"  style="display: none"><i   class="fa fa-times" aria-hidden="true"></i></a>
          </li>
          <li role="presentation">
            <a  class="btn "  id="TRNSFatoorah"  >{{__('fatoorah.relay')}}</a>
          </li>
        </ul>

      </div>
      <div class="card-body">
        <form id="CategoryItems"  action="#">
          @csrf

          @foreach ($data as $item)
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="flagopater" value="0">
            <input type="hidden" id="kindffatoorah" value="9">
            @php
                $code=$item->Item_cod;
                $IdItems=$item->id;
            @endphp
            <input type="hidden" id="IdFatoorah" value="{{$item->id}}">
            {{-- <input type="hidden" id="Idtype" value="{{ $type }}"> --}}
                <div class="row ">
                    <div class="col-lg-4">

                    
                        <div class="row mb-1">
                          <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.Branch')}}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control inputsearch" data-links="{{$sys->brnch}}" data-store="{{$item->brnch_NO}}" id="inputitemBrnch_NO" value="{{$brnch}}" >
                          
                            <div class="product_list" >
                              

                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="row mb-1">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.box')}}</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control inputsearch" data-links="{{$sys->box}}" data-store="{{$item->Saf_id }}" id="inputitembox"value="{{$box}}">
                            
                              <div class="product_list" >
                                

                              </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-lg-4">

                    
                      <div class="row mb-1">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.store')}}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control inputsearch" data-links="{{$sys->store}}" data-store="{{$item->stor_id}}" id="inputitemStore"value="{{$sore}}">
                        
                          <div class="product_list" >
                            

                          </div>
                        </div>
                      </div>
                      
                      
                      <div class="row mb-1">
                          <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.envoy')}}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control inputsearch" data-links="{{$sys->envoy}}" data-store="{{$item->repr_no}}" id="inputitemEventy"value="{{$evne}}">
                          
                            <div class="product_list" >
                              

                            </div>
                          </div>
                      </div>
                    </div>
                  















                    <div class="col-lg-4">
                      <div class="row mb-1">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('fatoorah.client')}}</label>
                        <div class="col-sm-8">
                          <input class="form-control inputsearch"  id="inputItemClient" data-store="{{$item->Cus_NO}}" data-links="{{$sys->client}}" value="{{$cleint}}">
                        
                          <div class="product_list" >
                          
                          </div>
                        </div>
                      </div>

                      <div class="row mb-1">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.Cost')}}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control inputsearchkind" data-links="2" id="inputItemTAK_NO"data-store="{{$item->Tak_Id}}"  value="{{$cost}}">
                          <div class="product_list" >
                          
                          </div>
                        </div>
                      </div>
                      

                    </div>














                </div>
            
      
      
      
        </form>

      </div>

    </div>




    <div class="card table-responsive" id="tablesubfatoorah">
      <table class="table table-hover  table-borderless"  @if ($item->Trns ==0)
        id="table-list"
      @endif >
        @endforeach
        <thead>
            <tr>
                <th>{{__('fatoorah.barcode')}}</th>

                <th>{{__('fatoorah.SubjectName')}}</th>
                <th>{{__('fatoorah.Quantity')}}</th>
                <th>{{__('fatoorah.price')}}</th>
                <th>{{__('fatoorah.rival')}}</th>
                <th>{{__('fatoorah.Total')}}</th>
                <th>{{__('fatoorah.Tax')}}</th>
                <th>{{ __('% الضريبة ')}}</th>
                <th>{{__('fatoorah.taxaesthetic')}}</th>
                
                {{-- <th style="width: 5% ">{{ __('Catagories.Edite')}}</th>
                <th style="width: 5% ">{{ __('Catagories.Delete')}}</th> --}}
            </tr>
        </thead>
        <tbody  id="ItemCatTableData">
            @foreach ($data[0]->child as $item)
                <tr id="idItemCatData{{$item->id }}" data-falge="0" data-contact="{{$item->id }}" data-add="0">
                  {{-- <td id="ItemCatDatacode{{$item->id }}"> {{ $item->Item_cod }}</td> --}}
                  <td id="ItemCatDataname{{$item->id }}"> {{ $item->Item_no }}</td>
                  <td id="ItemCatDataItem_BAY{{$item->id }}"> {{ $item->Item_Name }}</td>


                  <td id="ItemCatDataname{{$item->id }}"> {{ $item->Qty }}</td>
                  <td id="ItemCatDataItem_BAY{{$item->id }}"> {{ $item->Bay }}</td>




                  <td id="ItemCatDataItem_CNT{{$item->id }}"> {{ $item->Disc }}</td>
                  <td id="ItemCatDataItem_Sell{{$item->id }}"> {{ $item->ToT }}</td>
                  

                  <td id="ItemCatDataItem_NAT{{$item->id }}"> {{ $item->Vat }}</td>
                  <td id="ItemCatDataItem_NAT{{$item->id }}"> </td>
                  <td id="ItemCatDataItem_NAT{{$item->id }}"> {{ $item->Offer }}</td>
                  
                
              </tr>
                
            @endforeach
        </tbody>
      </table>

    </div>

    <div style="height: 300px">
    </div>

    <div class="card mb-2" id="datasumfatoorahall" style="position: fixed;bottom: 0px;width: 80%;">
      
    
      <div class="card-body">
        <div class="row ">


      
          <div class="col-lg-3">
            
            <div class="row ">
              <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('fatoorah.rival')}}</label>
              <div class="col-sm-8">
                  <input class="form-control inputsearch"  id="DiscountTOtalfatoorah" value="{{$Disc}}">
                
                  <div class="product_list" >
                
                  </div>
              </div>
            </div>

            <div class="row ">
              <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.Tax')}}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control "  id="taxTOtalfatoorah" value="{{$tax}}">
                <div class="product_list" >
                
                </div>
              </div>
            </div>
            <div class="row ">
              <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.Numberofitems')}}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control " id="itemsTOtalfatoorah"  value="{{$count}}">
                <div class="product_list" >
            
                </div>
              </div>
            </div>

          </div>
        


          <div class="col-lg-6 text-center">

            <h2>الاجمالي</h2>
          
            <p id="sumfatoorahtext">
              {{$SUM}}
            </p>
            
            
          </div>



          @foreach ($data as $item)
          <div class="col-lg-3">

            
            <div class="row">
              <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.cash')}}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control "  id="cachfatoorah" value="{{$item->cash}}" >
              </div>
            </div>
            
            
            <div class="row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.Net')}}</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control "  id="Netfatoorah" value="{{$item->Net}}">
                
                </div>
            </div>
            <div class="row">
              <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.rest')}}</label>
              <div class="col-sm-8">
                <input type="text" class="form-control "  id="Restfatoorah" value="{{$item->cash -$item->Net}}">
              </div>
            </div>
          </div>

          @endforeach








          

      </div>

      </div>
        

    </div>

    
@else

<div class="card mb-2">
  <div class="card-header" style="padding: 0px 14px 0px 14px">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">
        <a href="{{$data->nextPageUrl()}}" class="btn">{{__('fatoorah.next')}}</a>
      </li>
      

    
    
      <li role="presentation">
        <a href="{{$data->previousPageUrl()}}" class="btn">{{__('fatoorah.previous')}}</a>
      </li>
      {{-- <li role="presentation">
        <a  class="btn SearchCateroyIcon"  data-bs-toggle="modal" data-bs-target="#SearchCategory" ><i   class="fa fa-search" aria-hidden="true"></i></a>
      </li> --}}
      <li role="presentation">
        <a  class="btn addItembtbnfatoorah"   ><i   class="fa fa-plus-circle" aria-hidden="true"></i></a>
      </li>
      <li role="presentation">
        <a  class="btn EditeItemsBtnfatoorah"  id="EditeItemsBtnfatoorah"><i   class="ti-pencil" aria-hidden="true"></i></a>
      </li>
      <li role="presentation">
        <a  class="btn EditeItemsBtnfatoorah"  id="AcceptItemsBtnfatoorah"  ><i   class="fa fa-check" aria-hidden="true"></i></a>
      </li>
      <li role="presentation">
        <a  class="btn "  id="CloseItemsBtnfatoorah"  ><i   class="fa fa-times" aria-hidden="true"></i></a>
      </li>
      <li role="presentation">
        <a  class="btn "  id="TRNSFatoorah"  >{{__('fatoorah.relay')}}</a>
      </li>
    </ul>

  </div>
  <div class="card-body">
    <form id="CategoryItems"  action="#">
      @csrf

 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="flagopater" value="2">
        <input type="hidden" id="kindffatoorah" value="9">
        <input type="hidden" id="IdFatoorah" value="-1">
        {{-- <input type="hidden" id="Idtype" value="{{ $type }}"> --}}
            <div class="row ">
                <div class="col-lg-4">

                
                    <div class="row mb-1">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.Branch')}}</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control inputsearch" data-links="{{$sys->brnch}}" data-store="0" id="inputitemBrnch_NO"  >
                      
                        <div class="product_list" >
                          

                        </div>
                      </div>
                    </div>
                    
                    
                    <div class="row mb-1">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.box')}}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control inputsearch" data-links="{{$sys->box}}" data-store="0" id="inputitembox">
                        
                          <div class="product_list" >
                            

                          </div>
                        </div>
                    </div>
                </div>





                <div class="col-lg-4">

                
                  <div class="row mb-1">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.store')}}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control inputsearch" data-links="{{$sys->store}}" data-store="0" id="inputitemStore">
                    
                      <div class="product_list" >
                        

                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="row mb-1">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.envoy')}}</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control inputsearch" data-links="{{$sys->envoy}}" data-store="0" id="inputitemEventy">
                      
                        <div class="product_list" >
                          

                        </div>
                      </div>
                  </div>
                </div>
              















                <div class="col-lg-4">
                  <div class="row mb-1">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('fatoorah.client')}}</label>
                    <div class="col-sm-8">
                      <input class="form-control inputsearch"  id="inputItemClient" ata-store="0"   data-links="{{$sys->client}}">
                    
                      <div class="product_list" >
                      
                      </div>
                    </div>
                  </div>

                  <div class="row mb-1">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">{{__('fatoorah.Cost')}}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control inputsearchkind" data-links="2" id="inputItemTAK_NO"data-store="0"  >
                      <div class="product_list" >
                      
                      </div>
                    </div>
                  </div>
                  

                </div>














            </div>
        
  
  
  
    </form>

  </div>

</div>

@endif


<script src="{{asset('js/fatoorah.js')}}"></script>


<script src="{{asset('js/fatoorahsub.js')}}"></script>
<script>
//apply
    $("#table-list").SetEditable();

    $('#add').click(function() {
        rowAddNew('table-list');
    });

</script>

@endsection





