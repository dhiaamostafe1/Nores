@extends('Tenancy.layouts.apptenancy')

@section('body')

<form id="EditeSittingAcc">

         <div class="card">
            <div class="card-header">
                {{-- <button type="submit" class="btn btn-primary">{{__('AccoundGriude.Save')}}</button> --}}
                {{-- <button type="submit" class="btn btn-primary d-flex flex-row"></button> --}}
                <button type="submit" class="btn btn-outline-primary btn-icon-text">
                    <i class="ti-file btn-icon-prepend"></i>
                    {{__('All.Save')}}
                  </button>
            </div>
            <div class="card-body">
                
                    <input type="hidden"  @if($data->client==0)  value="0" @else  value="1" @endif name="flag" id="flagaccn" >

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.client')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control searchsittingAcc"  data-store='{{$data->client}}'  value="{{$tree[0]}}" id="clientn" name="client" >
                                <div class="product_list" >
                                </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.supplier')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control searchsittingAcc"data-store='{{$data->supplier}}' value="{{$tree[1]}}" id="suppliern" name="supplier">
                                    <div class="product_list" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.Box')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control searchsittingAcc" data-store='{{$data->box}}' value="{{$tree[2]}}" id="boxn" name="box">
                                <div class="product_list" >
                                </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.Bank')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control searchsittingAcc"data-store='{{$data->bank}}' id="bankn" value="{{$tree[3]}}" name="bank">
                                    <div class="product_list" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.Branch')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control searchsittingAcc"data-store='{{$data->brnch}}' id="brnchn" value="{{$tree[4]}}" name="brnch">
                                <div class="product_list" >
                                </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.Store')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control searchsittingAcc" data-store='{{$data->store}}'value="{{$tree[5]}}" id="storen" name="store">
                                    <div class="product_list" >
                                    </div>
                                </div>
                            </div>



                        

                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.employ')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control searchsittingAcc"data-store='{{$data->employ}}'   value="{{$tree[6]}}" id="employn">
                                <div class="product_list" >
                                </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.expenses')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control searchsittingAcc"id='expensesn'data-store='{{$data->expenses}}'value="{{$tree[7]}}" name="expenses">
                                    <div class="product_list" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.tax')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control searchsittingAcc"id="taxn" data-store='{{$data->tax}}' value="{{$tree[8]}}" name="tax">
                                <div class="product_list" >
                                </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.costsales')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control searchsittingAcc" id="costsalesn"data-store='{{$data->costsales}}'value="{{$tree[9]}}" name="costsales">
                                    <div class="product_list" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.salesprofits')}}</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control searchsittingAcc" id="salesprofitsn"data-store='{{$data->salesprofits}}'value="{{$tree[10]}}" name="salesprofits">
                                <div class="product_list" >
                                </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputText" class="col-sm-2 col-form-label">{{__('AccoundGriude.envoy')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control searchsittingAcc"id="envoyn"data-store='{{$data->envoy}}'value="{{$tree[11]}}" name="envoy">
                                    <div class="product_list" >
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
               
            </div>
          </div>

 </form>


<script src="{{asset('js/SYSAccount.js')}}"></script>

@endsection
