@extends('Tenancy.layouts.apptenancy')

@section('body')

wwwwwwwwwwwwwwww
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

