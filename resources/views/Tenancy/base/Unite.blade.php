@extends('Tenancy.layouts.apptenancy')

@section('body')


<div class="card">
    <div class="card-header" style="padding: 8px 14px 0px 14px">
        
        <div class="row">
            <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
                <h4 class="d-flex flex-row">{{__('unite.Unite')}}</h4>  
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 ">
                
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('unite.print')}}" class="d-flex fa fa-file-pdf-o  fa-2x flex-row-reverse p-1" ></a>
                    <a class="d-flex fa fa-file-excel-o fa-2x flex-row-reverse p-1" ></a>
               
                    @if (getrull(session()->get('loginuser'), 17,'Inter'))
                    <i class="d-flex fa fa-plus-circle fa-2x flex-row-reverse"  data-bs-toggle="modal"  data-bs-target="#StoreUniteModel"></i>
                    @endif
               
               </div>
            </div>
          

        </div>
        
       
    </div>
    <div class="card-body"> 
        @if(!$unit->isEmpty())            
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless ">
                            <thead>
                                <tr>
                                    <th>{{__('unite.IdUnite')}}</th>
                                    <th>{{__('unite.NameUnite')}}</th>
                                    <th style="width: 5%">{{__('unite.Edite')}}</th>
                                    <th style="width: 5%">{{__('unite.Delete')}}</th>
                                </tr>
                            </thead>
                        
                            <tbody  id="uniteItem">

                                @foreach ($unit as $item)
                                    <tr id="unite{{$item->id }}">
                                        <th scope="row">{{$item->id }}</th>
                                        <td id="unitename{{$item->id }}"> <span id="unitedeletitem{{$item->id }}">{{$item->unite_name }}</span></td>
                                        <td >

                                        
                                                
                                            @if (getrull(session()->get('loginuser'), 17,'Update'))
                                            <a class="uniteEdite jsgrid-button jsgrid-edit-button  ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeUniteModel"  data-contant="{{$item->id }}"></a>
                                            @endif
                                        <td >
                                            @if (getrull(session()->get('loginuser'), 17,'Delete'))
                                            <a type="button"  class="unitedelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant="{{$item->id }}"></a>
                                            @endif
                                        </td>
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





<script src="{{asset('js/unite.js')}}"></script>

@endsection




<div class="modal fade" id="EditeUniteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('unite.EditUnite')}}</h1>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <form id="UpdatUnite"  action="#">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-2 form-label">{{__('unite.NameUnite')}}</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="idEditunit" name="idEditunit" value="">
                        <input type="text" class="form-control" id="EditeInput" name="EditeInput" value="" required>
                        @error('EditeInput')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >{{__('unite.SaveUnite')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>



<div class="modal fade" id="StoreUniteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('unite.AddUnite')}}</h1>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <form id="StoreUnite"  action="#">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-2 form-label">{{__('unite.NameUnite')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="unit" name="unit" required>
                        
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <div class="row mb-3">
                   
                    <div class="col-sm-8">
                        <button type="submit" id="idmodel" class="form-control btn btn-primary" >{{__('unite.SaveUnite')}}</button>
                    </div>
                    <div class="col-sm-8">
                        <button type="submit" id="idmodel" class="form-control btn btn-primary" >{{__('unite.SaveUnite')}}</button>
                    </div>
                </div>
               


             
            </div> --}}
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >{{__('unite.SaveUnite')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>




