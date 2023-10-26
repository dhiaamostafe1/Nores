@extends('Tenancy.layouts.apptenancy')

@section('body')



<div class="card">
   <div class="card-header">
      <div class="row">
          <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
            <h4 class="d-flex flex-row">{{ __('Notifications')}}</h4>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-6 ">
            <a class="d-flex fa fa-plus-circle fa-2x flex-row-reverse"   href="{{route('listteckets.create',"add")}}"></a>
          </div>
      </div>
   </div>
   <div class="card-body">
    @if(!$ticket->isEmpty()) 
      <table class="table">
        <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">subject</th>
              <th scope="col">state</th>
              <th scope="col">data</th>
              <th scope="col">control</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ticket as $item)
              <a href="{{route('listteckets.create' ,$item->id )}}">
                  <tr>
              <a href="{{route('listteckets.create' ,$item->id )}}">
                    <th>{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                      @if($item->state == 0)
                      <div class="badge badge-success">Completed</div>
                      @elseif($item->state == 0)
                        <div class="badge badge-warning">Pending</div>
                      @else
                        <div class="badge badge-danger">Cancelled</div>
                      @endif
                    </td>
                    
                    <th scope="col"></th>
                    <td><a href="{{route('listteckets.create' ,$item->id )}}" class="btn btn-primary"> send</a></td>
                  </tr>
                </a>
          @endforeach
            
          </tbody>
      </table>
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
{{-- <div class="card ps-3 pe-3 mb-4">
    <h4 class="card-title">
        <h4 class="d-flex flex-row">{{ __('Notifications')}}</h4>
              
        <a class="d-flex fa fa-plus-circle fa-2x flex-row-reverse"  style="position: relative; top: -25px;" href="{{route('listteckets.create',"add")}}"></a>
    
      </h4>
</div> --}}
{{-- <div class="card">
    <div class="card-body">
      <p class="card-title">Notifications</p>
      


      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">subject</th>
            <th scope="col">state</th>
            <th scope="col">data</th>
            <th scope="col">control</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ticket as $item)
            <a href="{{route('listteckets.create' ,$item->id )}}">
                <tr>
            <a href="{{route('listteckets.create' ,$item->id )}}">
                  <th>{{$item->id}}</th>
                  <td>{{$item->name}}</td>
                  <td>{{$item->state}}</td>
                  <th scope="col"></th>
                  <td><a href="{{route('listteckets.create' ,$item->id )}}" class="btn btn-primary"> send</a></td>
                </tr>
              </a>
         @endforeach
          
        </tbody>
      </table>


     
        
  
    </div>
  </div> --}}
            
@endsection

















