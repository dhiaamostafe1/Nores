@extends('Tenancy.layouts.apptenancy')

@section('body')

<div class="card">
    <div class="card-header" style="padding: 8px 14px 0px 14px">
        
        <div class="row">
            <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
                <h4 class="d-flex flex-row">{{ __('group.group')}}</h4>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 ">
               
                <div class="btn-group" role="group" aria-label="Basic example">
                     <a href="{{route('group.print')}}" class="d-flex fa fa-file-pdf-o  fa-2x flex-row-reverse p-1" ></a>
                     <a class="d-flex fa fa-file-excel-o fa-2x flex-row-reverse p-1" ></a>
                
                    @if (getrull(session()->get('loginuser'), 21,'Inter'))
                
                    <i class="d-flex fa fa-plus-circle fa-2x flex-row-reverse p-1"  data-bs-toggle="modal"  data-bs-target="#StoreGroupModel"></i>
                    @endif
                
                </div>
            </div>

        </div>
        
       
    </div>
    <div class="card-body">
        @if(!$Group->isEmpty())
        
                
            
                
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>{{ __('group.IdGroup')}}</th>
                                <th>{{ __('group.NameGroup')}}</th>
                                <th>{{ __('group.PrintGroup')}}</th>
                                <th style="width: 5% ">{{ __('group.Edite')}}</th>
                                <th style="width: 5% ">{{ __('group.Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody  id="groupItem">
                    
                            @foreach ($Group as $item)
                                <tr id="group{{$item->id }}">
                                    <th scope="row">{{$item->id }}</th>
                                    <td id="groupname{{$item->id }}"> {{ $item->group_name }}</td>
                                    <td id="groupprint{{$item->id }}"> {{ $item->group_print }}</td>
                                    <td>
                                        @if (getrull(session()->get('loginuser'), 21,'Update'))
                                        <a class="groupEdite jsgrid-button jsgrid-edit-button ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditegroupModel"  data-contant="{{$item->id }}"></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (getrull(session()->get('loginuser'), 21,'Delete'))
                                        <a type="button"  class="groupdelete jsgrid-button jsgrid-delete-button ti-trash" id="delete"  data-contant="{{$item->id }}"></a>
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

<script src="{{asset('js/group.js')}}"></script>
@endsection





<div class="modal fade" id="EditegroupModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('group.EditGroup')}}</h1>
       
        </div>
        <form id="Updategroup"  action="#">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" id="idEditgroup" name="idEditgroup" value="">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-3 form-label">{{__('group.NameGroup')}}</label>
                    <div class="col-sm-9">
                      
                        <input type="text" class="form-control" id="Editenamegroup" name="Editenamegroup" value="">
                    </div>
                   
                </div>
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-3 form-label">{{__('group.PrintGroup')}}</label>
                    <div class="col-sm-9">
                        
                        <input type="text" class="form-control" id="Editeprintgroup" name="Editeprintgroup" value="">
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="idmodel" class=" ps-5 pe-5 btn btn-primary" >{{__('group.SaveGroup')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>


<div class="modal fade" id="StoreGroupModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('group.AddGroup')}}</h1>
  
        </div>
        <form id="StoreGroup"  action="#">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-3 form-label">{{__('group.NameGroup')}}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputgroupname" name="inputgroupname">
                    </div>
                   
                </div>
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="col-sm-3 form-label">{{__('group.PrintGroup')}}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputgroupprint" name="inputgroupprint">
                    </div>
                   
                </div>


            </div>
            {{-- <div class="modal-footer">
                
                <button type="submit" id="idmodel" class="btn btn-primary" >{{__('group.SaveGroup')}}</button>
             
            </div> --}}
            <div class="modal-footer">
                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="idmodel" class=" ps-5 pe-5 btn btn-primary" >{{__('group.SaveGroup')}}</button>
            </div>
        </form>
    </div>
    </div>
</div>

