@extends('Tenancy.layouts.apptenancy')

@section('body')

<style>
    table {
        text-align: center;
    }
</style>
<div class="card">
    <div class="card-header" style="padding: 8px 14px 0px 14px">
        
        <div class="row">
            <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
                <h4 class="d-flex flex-row">{{__('Saller.Saller')}}</h4>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 ">
             
                {{-- <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('Bank.print')}}" class="d-flex fa fa-file-pdf-o  fa-2x flex-row-reverse p-1" ></a>
                    <a href="{{route('Bank.Excal')}}" class="d-flex fa fa-file-excel-o fa-2x flex-row-reverse p-1" ></a>
                    <i class="d-flex fa fa-upload fa-2x p-1 flex-row-reverse"  data-bs-toggle="modal"  data-bs-target="#InportBankModel"></i>
                    @if (getrull(session()->get('loginuser'), 25,'Inter'))
                      <i class="d-flex fa fa-plus-circle p-1 fa-2x flex-row-reverse"  data-bs-toggle="modal"  data-bs-target="#StoreBankModel"></i>
                    @endif
               
               </div> --}}
               
            </div>

        </div>
        
       
    </div>
    <div class="card-body">
            @if(!$data->isEmpty())

            <div class="table-responsive">

                <table class="table table-hover table-borderless ">
                    <thead>
                        <tr>
                            <th  style="width: 5%">{{__('Saller.id')}}</th>
                            <th>{{__('Saller.Name')}}</th>
                            <th>{{__('Saller.datatime')}}</th>
                            <th>{{__('Saller.Tax')}}</th>
                            <th>{{__('Saller.Total')}}</th>
                            <th>{{__('Saller.Satus')}}</th>
                          
                        </tr>
                    </thead>
                
                    <tbody  id="Accounttableitems">

                        @foreach ($data as $item)
                            <tr id="Acounttryitems{{$item->id}}" >
                                <th scope="row">{{$item->id }}</th>
                                <td id="Acountname{{$item->id}}"> {{$item->Name }}</td>
                                <td id="Acountname{{$item->id}}"> {{$item->datee }}</td>
                                <td id="Acountname{{$item->id}}"> {{$item->Vat }}</td>
                                <td id="Acountname{{$item->id}}"> {{$item->Total }}</td>
                                <td id="Acountname{{$item->id}}"> {{$item->Trns }}</td>
                              
                            </tr>  
                            
                        @endforeach
                    </tbody>
                </table>
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






