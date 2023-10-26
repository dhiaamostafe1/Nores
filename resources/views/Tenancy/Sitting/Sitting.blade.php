@extends('Tenancy.layouts.apptenancy')

@section('body')


<input type="hidden" class="hidden" id="idSitting" value="{{ $sitting->id}}" name="idSitting"> 
<div class="card">
  <div class="card-header" style="padding-bottom: 0px">
      <ul class="nav nav-pills border border-white table-borderless" style="padding-bottom: 0px">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" href="#public">{{__('sitting.public')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-bs-toggle="tab" href="#printers">{{__('sitting.printers')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-bs-toggle="tab" href="#tax">{{__('sitting.tax')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-bs-toggle="tab" href="#branches">{{__('sitting.branches')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-bs-toggle="tab" href="#models">{{__('sitting.models')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-bs-toggle="tab" href="#Bills">{{__('sitting.Bills')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-bs-toggle="tab" href="#divece">{{__('sitting.divece')}}</a>
        </li>
      </ul>

  </div>

  <div class="card-body">
    <div class="tab-content " style="    border: none;">
              
    
      {{-- public --}}
      <div class="tab-pane container active" id="public">
        <div class="" style="background: none">
         
            <div class="row">
              <div class="col-lg-6 mb-3">
                 <x-TabPubice value="{{ $sitting->tr_inv}}" header="{{__('sitting.TarhelFatoorah')}}" name="fatoorahe" rideoone="{{__('sitting.onefatoorah')}}"  rideotwo="{{__('sitting.Allfatoorah')}}"></x-TabPubice>
              </div>
              <div class="col-lg-6 mb-3">
              
        
           
                  <h4 class="border-bottom pb-2 mb-0">{{__('sitting.sittingPublic')}}</h4>
                  <fieldset id="group1">
                       
                         
                      <div class="form-check  pe-2 pt-2">
                          <input class="form-check-input" type="checkbox" value="{{$sitting->Catories}}" name="Catories"  @if ($sitting->Catories ==1)
                          checked
                          @endif >
                          <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                            {{__('sitting.Calorie')}}
                          </label>
                      </div>
                      <div class="form-check  pe-2 pt-2">
                        <input class="form-check-input" type="checkbox" value="{{$sitting->boy_prcnt}}"  name="boy_prcnt"  @if ( $sitting->boy_prcnt ==1)
                        checked
                        @endif >
                        <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                          {{__('sitting.activesale')}}
                        </label>
                      </div>
                      
                      
                      
               
              
                    
                  </fieldset>
  
  
  
  
  
              </div>
  
            </div>
  
        </div>
        
      </div>
      {{-- End public --}}
      {{-- printers --}}
  
      <div class="tab-pane container" id="printers">
        <div class="" style="background: none">
         
          <form   method="POST" class="p-0" action="{{ route('Sitting.store') }}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="hidden" id="idSitting" value="{{ $sitting->id}}" name="idSitting"> 
          
     
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">{{__('sitting.Printreceipts')}}</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Sittingprnt_sml" value="{{ $sitting->prnt_sml}}" name="Sittingprnt_sml">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">{{__('sitting.printA4')}}</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Sittingprnt_A4" value="{{ $sitting->prnt_A4}}" name="Sittingprnt_A4">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">{{__('sitting.printQR')}}</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Sittingprnt_brcd" value="{{ $sitting->prnt_brcd}}" name="Sittingprnt_brcd">
              </div>
            </div>      
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('sitting.countprint')}}</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prnt_cnt" value="{{ $sitting->prnt_cnt}}" name="prnt_cnt"> 
              </div>
            </div>                
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" class=" form-control btn btn-primary">{{__('sitting.Save')}}</button>
              </div>
            </div>
  
          </form>
  
        </div>
       
        
      </div>
  
      {{--ENd printers --}}
  
  
  
      {{-- tax --}}
        <div class="tab-pane container" id="tax">
          <div class="" style="background: none">
      
  
  
            <div class="row">
              <div class="col-lg-6">
                <form   method="POST" class="p-0" action="{{ route('Sitting.storenumber') }}">
                  @csrf
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" class="hidden" id="idSitting" value="{{ $sitting->id}}" name="idSitting"> 
                
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">{{__('sitting.numtax')}}</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Sittingvat_num" value="{{ $sitting->vat_num}}" name="Sittingvat_num"> 
                    </div>
                  </div>
  
                  <div class="row  mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">{{__('sitting.taxsale')}}</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Sittinginv_vat" value="{{ $sitting->inv_vat}}" name="inv_vat">
                    </div>
                  </div>
                  <div class="row  mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">{{__('sitting.taxbuy')}}</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="purch_vat" value="{{ $sitting->purch_vat}}" name="purch_vat">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">{{__('sitting.PriceAlltax')}}</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="vat_in" value="{{ $sitting->vat_in}}" name="vat_in">
                    </div>
                  </div>
  
  
                
  
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" class=" form-control btn btn-primary">{{__('sitting.Save')}}</button>
                    </div>
                  </div>
  
  
  
                
                </form>
  
              </div>
              <div class="col-lg-6">
                <x-TabPubice value="{{$sitting->inv_prnt_kind}}" header="{{__('sitting.Printsale')}}" name="Saletype" rideoone="{{__('sitting.PriceAlltax')}}"  rideotwo="{{__('sitting.SeparateContTex')}}"></x-TabPubice>
              </div>
  
            </div>
          
  
          </div>
        
          
        </div>
       {{-- ENd tax --}}
       {{--models  --}}
      <div class="tab-pane container" id="models">
        <div class="" style="background: none">
         
            <div class="row">
              <div class="col-lg-6 mb-3">
              <x-TabPubice value="{{$sitting->inv_prnt_kind}}" header="{{__('sitting.Printsale')}}" name="Saletype" rideoone="{{__('sitting.Printreceipts')}}"  rideotwo="{{__('sitting.Printbills')}}"></x-TabPubice>
              </div>
              <div class="col-lg-6 mb-3">
                <x-TabPubice value="{{$sitting->prch_prnt_kind}}" header="{{__('sitting.printPuy')}}" name="purchasetype" rideoone="{{__('sitting.Printreceipts')}}"  rideotwo="{{__('sitting.Printbills')}}"></x-TabPubice>
              </div>
  
              <div class="col-lg-6 mb-3">
                <x-TabPubice value="{{$sitting->rpt_prnt_kind}}" header="{{__('sitting.reportprinter')}}" name="Reportstype" rideoone="{{__('sitting.Printreceipts')}}"  rideotwo="{{__('sitting.Printbills')}}"></x-TabPubice>
              </div>
              
            </div>
  
        </div>
       
        
      </div>
      {{--End models  --}}
      {{--  Bills --}}
      <div class="tab-pane container" id="Bills">
        <div class="" style="background: none">
         
            <div class="row">
              <div class="col-lg-6">
  
              
                     <h4 class="border-bottom pb-2 mb-2">{{__('sitting.sittingPublic')}}</h4>
                  
                      <fieldset id="group1">
                       
                         
                            
  
                            <form   method="POST" class="p-0" action="{{ route('Sitting.storenumbersale') }}">
                              @csrf
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" class="hidden" id="idSitting" value="{{ $sitting->id}}" name="idSitting"> 
                            
                              <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('sitting.TodayRollback')}}</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="Sittinginv_rtrn_D" value="{{ $sitting->inv_rtrn_D}}" name="inv_rtrn_D"> 
                                </div>
                              </div>
                              <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('sitting.numbergroupslist')}}</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="SittingGRP_CNT" value="{{ $sitting->GRP_CNT}}" name="GRP_CNT"> 
                                </div>
                              </div>
                              <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('sitting.numberitemsslist')}}</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="SittingITM_CNT" value="{{ $sitting->ITM_CNT}}" name="ITM_CNT"> 
                                </div>
                              </div>
                              <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('sitting.barcodestart')}}</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="SittingMIZSTR" value="{{ $sitting->MIZSTR}}" name="MIZSTR"> 
                                </div>
                              </div>
                              <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('sitting.Partition')}}</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="SittingMIZTQ" value="{{ $sitting->MIZTQ}}" name="MIZTQ"> 
                                </div>
                              </div>
        
                             
          
          
                             
          
                              <div class="row mb-2">
                                <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                  <button type="submit" class=" form-control btn btn-primary">{{__('sitting.Save')}}</button>
                                </div>
                              </div>
          
          
              
                            
                            </form>
  
  
                    
                          
                      </fieldset>
                
  
  
             
              </div>
              <div class="col-lg-6">
  
                
                      <h4 class="border-bottom pb-2 mb-0">{{__('sitting.sittingPublic')}}</h4>
                  
                      <fieldset id="group1">
                       
                            <div class="form-check  pe-2 pt-2 mb-3">
                              <input class="form-check-input" type="checkbox" value="{{$sitting->inv_rtrn}}" name="inv_rtrn"  @if ($sitting->inv_rtrn ==1)
                              checked
                              @endif >
                              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                {{__('sitting.Rollback')}}
                              </label>
                            </div>
                            <div class="form-check  pe-2 pt-2">
                                <input class="form-check-input" type="checkbox" value="{{$sitting->gotocnt}}" name="gotocnt"  @if ($sitting->gotocnt ==1)
                                checked
                                @endif >
                                <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                  {{__('sitting.goculum')}}
                                </label>
                            </div>
  
                            <div class="form-check  pe-2 pt-2">
                              <input class="form-check-input" type="checkbox" value="{{$sitting->showunt}}"  name="showunt"  @if ( $sitting->showunt ==1)
                              checked
                              @endif >
                              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                {{__('sitting.unitecol')}}
                              </label>
                            </div>
                            <div class="form-check  pe-2 pt-2">
                              <input class="form-check-input" type="checkbox" value="{{$sitting->showoffer}}"  name="showoffer"  @if ( $sitting->showoffer ==1)
                              checked
                              @endif >
                              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                {{__('sitting.showprivate')}}
                              </label>
                            </div>
                            <div class="form-check  pe-2 pt-2">
                              <input class="form-check-input" type="checkbox" value="{{$sitting->showmsgprnt}}"  name="showmsgprnt"  @if ( $sitting->showmsgprnt ==1)
                              checked
                              @endif >
                              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                {{__('sitting.msgprint')}}
                              </label>
                            </div>
                            <div class="form-check  pe-2 pt-2">
                              <input class="form-check-input" type="checkbox" value="{{$sitting->sumitm}}"  name="sumitm"  @if ( $sitting->sumitm ==1)
                              checked
                              @endif >
                              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                {{__('sitting.Grouprows')}}
                              </label>
                            </div>
                            <div class="form-check  pe-2 pt-2">
                              <input class="form-check-input" type="checkbox" value="{{$sitting->inv_crdt}}"  name="inv_crdt"  @if ( $sitting->inv_crdt ==1)
                              checked
                              @endif >
                              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                {{__('sitting.shortsale')}}
                              </label>
                            </div>
                            <div class="form-check  pe-2 pt-2">
                              <input class="form-check-input" type="checkbox" value="{{$sitting->inv_tch}}"  name="inv_tch"  @if ( $sitting->inv_tch ==1)
                              checked
                              @endif >
                              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                {{__('sitting.touchinvoice')}}
                              </label>
                            </div>
  
                            <div class="form-check  pe-2 pt-2">
                              <input class="form-check-input" type="checkbox" value="{{$sitting->TBlE}}"  name="TBlE"  @if ( $sitting->TBlE ==1)
                              checked
                              @endif >
                              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
                                {{__('sitting.Activattables')}}
                              </label>
                            </div>
                            
  
  
  
  
  
  
                       
                            
                            
  
                     
                    
                          
                      </fieldset>
               
  
  
  
              </div>
  
            </div>
  
        </div>
        
      </div>
     
      {{-- ENd Bills --}}
  
    </div>
  

  </div>

</div>




<script src="{{asset('js/Sitting.js')}}"></script>





@endsection
