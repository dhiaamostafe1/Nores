@extends('Tenancy.layouts.apptenancy')

@section('body')


<div class="card">
    <div class="card-header" style="padding: 8px 14px 0px 14px">
        <div class="row">
            <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
                <h4 class="d-flex flex-row">{{__('EntryType.table')}}</h4>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 ">
                @if (getrull(session()->get('loginuser'), 22,'Inter'))
                <i class="d-flex fa fa-plus-circle fa-2x  flex-row-reverse"  data-bs-toggle="modal"  data-bs-target="#StoreCostModel"></i>
                @endif
            </div>

        </div>

    </div>
    <div class="card-body">
        @if(!$Cost->isEmpty())
        <div class="table-responsive">
                                      
            <table class="table table-hover table-borderless">
                <thead>
                    <tr>
                        <th>{{__('EntryType.IdEntryType')}}</th>
                        <th>{{__('EntryType.table')}}</th>
                        <th style="width: 5%">{{__('EntryType.Edite')}}</th>
                        <th style="width: 5%">{{__('EntryType.Delete')}}</th>
                    </tr>
                </thead>
            
                <tbody  id="CostItemtable">

                    @foreach ($Cost as $item)
                        <tr id="CostTr{{$item->id }}">
                            <th scope="row">{{$item->id }}</th>
                            <td id="EntryTypename{{$item->id }}"> <span id="unitedeletitem{{$item->id }}">{{$item->name }}</span></td>
                            <td >
                                @if (getrull(session()->get('loginuser'),22,'Update'))
                                <a class="CostEdite  ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeCostModel"  data-contant="{{$item->id }}"></a>
                                @endif
                            </td>
                            <td >
                                @if (getrull(session()->get('loginuser'),22,'Delete'))
                                <a type="button"  class="Costdelete  ti-trash" id="delete"  data-contant="{{$item->id }}"></a>
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
<script src="{{asset('js/tabledate.js')}}"></script>
@endsection
































































<div class="modal fade" id="StoreCostModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('EntryType.add')}}</h1>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <form  action="{{route('tabledate.store')}}" method="post">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-3 form-label">{{__('EntryType.table')}}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nameEntryType" name="nameEntryType">
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">{{__('EntryType.Close')}}</button>
                <button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >{{__('EntryType.SaveEntryType')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>










































<div class="modal fade" id="EditeCostModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('EntryType.Edite')}}</h1>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <form id="UpdatCost"  action="#">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-3 form-label">{{__('EntryType.table')}}</label>
                    <div class="col-sm-9">
                        <input type="hidden" class="form-control" id="idEditEntryType" name="idEditEntryType" value="">
                        <input type="text" class="form-control" id="EditenameEntryType" name="EditenameEntryType" value="">
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">{{__('EntryType.Close')}}</button>
                <button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >{{__('EntryType.SaveEntryType')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>