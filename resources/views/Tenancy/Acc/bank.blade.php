@extends('Tenancy.layouts.apptenancy')

@section('body')
<input type="hidden" class="form-control" id="flageaccount"  value="bank" required>










<div class="card">
    <div class="card-header" style="padding: 8px 14px 0px 14px">
        
        <div class="row">
            <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
                <h4 class="d-flex flex-row">{{__('AccoundGriude.Bank')}}</h4>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 ">
             
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('Bank.print')}}" class="d-flex fa fa-file-pdf-o  fa-2x flex-row-reverse p-1" ></a>
                    <a href="{{route('Bank.Excal')}}" class="d-flex fa fa-file-excel-o fa-2x flex-row-reverse p-1" ></a>
                    <i class="d-flex fa fa-upload fa-2x p-1 flex-row-reverse"  data-bs-toggle="modal"  data-bs-target="#InportBankModel"></i>
                    @if (getrull(session()->get('loginuser'), 25,'Inter'))
                      <i class="d-flex fa fa-plus-circle p-1 fa-2x flex-row-reverse"  data-bs-toggle="modal"  data-bs-target="#StoreBankModel"></i>
                    @endif
               
               </div>
               
            </div>

        </div>
        
       
    </div>
    <div class="card-body">
            @if(!$data->isEmpty())

            <div class="table-responsive">

                <table class="table table-hover table-borderless ">
                    <thead>
                        <tr>
                            <th>{{__('AccoundGriude.number')}}</th>
                            <th>{{__('AccoundGriude.Bank')}}</th>
                            <th style="width: 5%">{{__('unite.Edite')}}</th>
                            <th style="width: 5%">{{__('unite.Delete')}}</th>
                        </tr>
                    </thead>
                
                    <tbody  id="Accounttableitems">

                        @foreach ($data as $item)
                            <tr id="Acounttryitems{{$item->id}}" >
                                <th scope="row">{{$item->AccountID }}</th>
                                <td id="Acountname{{$item->id}}"> {{$item->AccountName }}</td>
                                <td >
                                    <a class="BankEdite jsgrid-button jsgrid-edit-button  ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeBankModel"  data-contant="{{$item->id }}"></a>
                                
                                <td >
                                    <a type="button"  class="bankdelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant="{{$item->id }}"></a>
                                </td>
                            </tr>  
                            
                        @endforeach
                    </tbody>
                </table>
                             
                                   

                {{-- {{TableAcc(__('AccoundGriude.number'),__('AccoundGriude.Bank'),__('AccoundGriude.Edite'),__('AccoundGriude.Delete'),$data,'BankEdite','bankdelete','EditeBankModel')}}
         --}}

        
        
            </div>
            @else
                <div class="row">
                    <div class="col-lg-3">
        
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="{{asset('images/oc-error.svg')}}" style=" width: 34rem;" class="mr-2 d-flex" alt="logo"/>
                        <p class="mb-0  mt-4">No data to show</p>
                        
                    </div>
                    <div class="col-lg-3 ">
        
                    </div>
        
                </div>
            @endif

    </div>
</div>





<script src="{{asset('js/Bank.js')}}"></script>


@endsection


{{-- 
{{  ModelAcc('StoreBankModel' ,'StoreBankForm' ,__('AccoundGriude.add'),__('AccoundGriude.Bank') ,__('AccoundGriude.Close'), __('AccoundGriude.Save'))  }}
 --}}

 
<div class="modal fade" id="StoreBankModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('AccoundGriude.add')}}</h1>
     
        </div>
        <form id="StoreBankForm"  action="#">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-2 form-label">{{__('AccoundGriude.Bank')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nameAcc" name="nameAcc" required>
                       
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">{{__('AccoundGriude.Close')}}</button>
                <button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >{{__('AccoundGriude.Save')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>

<div class="modal fade" id="InportBankModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('AccoundGriude.add')}}</h1>
     
        </div>
        <form  method="POST" action="{{route('Bank.import')}}" enctype="multipart/form-data">
            <input type="hidden" name="flage" value="bank">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-2 form-label">file</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="nameAcc" name="file" required>
                       
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">{{__('AccoundGriude.Close')}}</button>
                <button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >{{__('AccoundGriude.Save')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>




<div class="modal fade" id="EditeBankModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('AccoundGriude.Edite')}}</h1>
     
        </div>
        <form id="UpdatBankForm"  action="#">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-2 form-label">{{__('AccoundGriude.Bank')}}</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="idEditBank" name="idEditBank" value="">
                        <input type="text" class="form-control" id="EditeInputBank" name="EditeInputBank" value="" required>
                       
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">{{__('AccoundGriude.Close')}}</button>
                <button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >{{__('AccoundGriude.Save')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>



















