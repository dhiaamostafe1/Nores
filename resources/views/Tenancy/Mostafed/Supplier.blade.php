@extends('Tenancy.layouts.apptenancy')

@section('body')


<div class="card">
    <div class="card-header" style="padding: 8px 14px 0px 14px">
        <div class="row">
            <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
                <h4 class="d-flex flex-row">{{__('aside.Mostafed')}}</h4>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 ">
                @if (getrull(session()->get('loginuser'), 65,'Inter'))
                <i class="d-flex fa fa-plus-circle fa-2x  flex-row-reverse btnaddMostafed"></i>
                @endif
            </div>

        </div>

    </div>
    <div class="card-body">
        <div class="formsend formaddMostafeddesplay" style="display: none">
            <form method="POST" action="{{ route('Client.store') }}" class="row g-3 needs-validation" validate >
                @csrf



               <input type="hidden" name="Kindly" value="{{$type}}">
               <input type="hidden" id="idMostafid" name="idMostafid" value="{{$type}}">
                <div class="row">
                   <div class="col-lg-6">
                    <div class="row mb-1">
                      <label for="validationTooltip01" class="col-sm-3 col-form-label">{{__('cleint.Name')}}</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="NameCleint" name="NameCleint" required>
                        <div class="product_list" >
                        
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="validationTooltip02" class="col-sm-3 col-form-label">{{__('cleint.Mobile')}}</label>
                      <div class="col-sm-9">
                          <input type="number" class="form-control" id="MobileClient"  name="MobileClient"  required>
                        <div class="product_list" >
                        
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="validationTooltipUsername" class="col-sm-3 col-form-label">{{__('cleint.Email')}}</label>
                      <div class="col-sm-9">
                         <input type="Email" class="form-control" id="EmailClient" name="EmailClient" required>
                        <div class="product_list" >
                        
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="validationTooltip02" class="col-sm-3 col-form-label">{{__('cleint.Max_credit')}}</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="MaxcreditClient"  name="MaxcreditClient"  required>
                        <div class="product_list" >
                        
                        </div>
                      </div>
                    </div>

                   </div>
                   <div class="col-lg-6">
                    <div class="row mb-1">
                      <label for="validationTooltipUsername" class="col-sm-3 col-form-label">{{__('cleint.Vat_No')}}</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" id="VatClient" name="VatClient" required>
                        <div class="product_list" >
                        
                        </div>
                      </div>
                    </div>
                   
                    <div class="row mb-1">
                      <label for="validationTooltip03" class="col-sm-3 col-form-label">  {{__('cleint.ACC_NO')}}</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="ACClient" name="ACClient" required>
                        <div class="product_list" >
                        
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="validationTooltip03" class="col-sm-3 col-form-label">{{__('cleint.Address')}}</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" id="AddressClient" name="AddressClient" required>
                        <div class="product_list" >
                        
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="validationTooltip03" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input class="form-check-input" type="checkbox" name="Active" value="0" id="ActiveMostafed">
                        <label class="form-check-label pe-5 ps-5" for="flexCheckDefault">
                          {{__('cleint.Active')}}
                        </label>
                        
                      </div>
                    </div>
                   
                   </div>

                </div>





            
                <div class="col-12">
                  <button class="btn btn-primary " type="submit">{{__('cleint.Save')}}</button>
                  <button class="btn btn-primary Closebtnadd " type="button">{{__('cleint.Close')}}</button>
                </div>
            </form>
      
        </div>
        <div class="divider"></div>
        <div class="tableMostafide">
            @if(!$data->isEmpty())
            <div class="table-responsive">
                                
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th style="width:4%">{{__('unite.IdUnite')}}</th>
                            <th style="width:20%">{{__('cleint.Name')}}</th>
                            <th style="width:15%">{{__('cleint.Mobile')}}</th>
                            <th style="width:20%">{{__('cleint.Email')}}</th>
                            {{-- <th>{{__('cleint.Address')}}</th> --}}
                            {{-- <th>{{__('cleint.Max_credit')}}</th> --}}
                            <th style="width:20%">{{__('cleint.Vat_No')}}</th>

                            <th style="width:10%">{{__('cleint.ACC_NO')}}</th>
                            {{-- <th>{{__('cleint.Kindly')}}</th> --}}
                            {{-- <th>{{__('cleint.Control')}}</th> --}}
                            <th style="width:5%">{{__('cleint.Edite')}}</th>
                            <th style="width:5%">{{__('cleint.Delete')}}</th>


                        
                        </tr>
                    </thead>
                
                    <tbody  id="uniteItem">
                        @foreach ($data as $item)
                        <tr id="deleteitemClient{{$item->id }}">
                            <th scope="row">{{$item->id }}</th>
                            <td>{{$item->AccountTree->AccountName }}</td>
                            <td>{{$item->Mobile }}</td>
                            <td>{{$item->Email }}</td>
                            {{-- <td>{{$item->Address }}</td> --}}
                            {{-- <td>{{$item->Max_credit }}</td> --}}
                            <td>{{$item->Vat_No }}</td>
                            <td>{{$item->ACC_NO }}</td>
                            {{-- <td>{{$item->Kindly }}</td> --}}
                            @if (getrull(session()->get('loginuser'), 65,'Update'))
                            <td>  <a type="button" class=" ti-pencil editeMostafed" id="delete"  data-contant="{{$item->id }}"></a></td>
                            @endif
                            @if (getrull(session()->get('loginuser'), 65,'Delete'))
                            <td>  <a type="button" href="{{ route('Client.delete', ['id' =>  $item->id, 'type' => $type])}}"   class="ti-trash" id="delete"  data-contant="{{$item->id }}"></a></td>
                            @endif
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

</div>




<script src="{{asset('js/box.js')}}"></script>
@endsection


