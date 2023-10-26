@extends('Tenancy.layouts.apptenancy')

@section('body')


<div class="card">
    <div class="card-header" style="padding: 8px 14px 0px 14px">
        <div class="row">
            <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
                <h4 class="d-flex flex-row">{{ __('auth.User')}}</h4>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 ">
                @if (getrull(session()->get('loginuser'), 31,'Inter'))
                <i class="d-flex fa fa-plus-circle fa-2x  flex-row-reverse"  data-bs-toggle="modal"  data-bs-target="#StoreCostModel"></i>
                @endif
            </div>

        </div>

    </div>
    <div class="card-body">
        @if(!$User->isEmpty())
        <div class="table-responsive">
                                      
            <table class="table table-hover table-borderless">
                <thead>
                    <tr>
                        <th>{{__('EntryType.IdEntryType')}}</th>
                        <th>{{ __('auth.name')}}</th>
                        <th>{{ __('auth.email')}}</th>
                        <th style="width: 5%">{{__('EntryType.Edite')}}</th>
                        <th style="width: 5%">{{__('EntryType.Delete')}}</th>
                    </tr>
                </thead>
            
                <tbody  id="CostItemtable">

                    @foreach ($User as $item)
                        <tr id="CostTr{{$item->id }}">
                            <th scope="row">{{$item->id }}</th>
                            <td id="EntryTypename{{$item->id }}"> {{$item->name }} </td>
                            <td id="EntryTypemail{{$item->id }}"> {{$item->email }} </td>
                            <td >
                                @if (getrull(session()->get('loginuser'),31,'Update'))
                                <a class="CostEdite  ti-pencil" type="button" data-bs-toggle="modal"  data-bs-target="#EditeCostModel"  data-contant="{{$item->id }}"></a>
                                @endif
                            </td>
                            <td >
                                @if (getrull(session()->get('loginuser'),31,'Delete'))
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
<script src="{{asset('js/User.js')}}"></script>
@endsection






























<div class="modal fade" id="StoreCostModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
             <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('auth.User')}}</h1>
              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('User.store') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{__('auth.name')}}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control " name="name"  required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{__('auth.email')}}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control " name="email" required autocomplete="email">

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{__('auth.pass')}}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{__('auth.pass1')}}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <button type="button" class="ps-5 pe-5 btn btn-secondary" data-bs-dismiss="modal">{{__('EntryType.Close')}}</button>
                <button type="submit" id="idmodel" class="ps-5 pe-5 btn btn-primary" >{{__('EntryType.SaveEntryType')}}</button>
            </form>
        </div>

      
        
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
        <div class="modal-body">
            <form method="POST" action="{{ route('User.update') }}">
                @csrf
                <input type="hidden" name="id" id="iduser">

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{__('auth.name')}}</label>

                    <div class="col-md-6">
                        <input id="nameedit" type="text" class="form-control " name="name"  required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{__('auth.email')}}</label>

                    <div class="col-md-6">
                        <input id="emailedit" type="email" class="form-control " name="email" required autocomplete="email">

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
</div>