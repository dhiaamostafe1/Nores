@extends('Tenancy.layouts.apptenancy')

@section('body')



<div class="card">
  <div class="card-header">
    <div class="row">
        <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
          <h4 class="d-flex flex-row">{{ __('Notifications')}}</h4>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-6 ">
          @if($data !="0")
          <a class="d-flex fa fa-plus-circle fa-2x flex-row-reverse btnaddticet" ></a>
          @endif
        </div>
    </div>
  </div>
  <div class="card-body">
    <div class="formsend formaddticketdesplay" style="display: none">
      <form class="row g-3"  action="{{route('listteckets.store')}}" method="POST">
        @csrf
        <input type="hidden"  value="{{$id}}" name="id">
        <input type="hidden"  value="{{$flage}}" name="flage">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">name</label>
          <input type="text" class="form-control" value="{{$user->name}}" id="inputEmail4" name="name" readonly>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">email</label>
          <input type="email" class="form-control"value="{{$user->email}}" id="inputEmail4" name="email" readonly>
        </div>
       
            <div class="col-12"   @if ($flage !="add") style="display: none"    @endif>
                <label for="inputAddress" class="form-label">subject</label>
                <input type="text" class="form-control"  @if ($flage !="add") value="{{$flage}}"   @endif required id="inputEmail4" name="subject">
            </div>
            
      
       
        <div class="col-12">
          <label for="inputAddress" class="form-label">massage</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="massage" required></textarea>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary sendticketdesplay">send</button>
        </div>
      </form>

    </div>
    
    <div class="msgTable">
      @if($data !="0")
        <div class="alert " role="alert">
          {{ __('Notifications')}}
        </div>
      @foreach ($data as $item)
      
  

        <div class="row ">
            <div class="col-lg-3 d-flex flex-row text-center listtexttickect" >
                  {{ $item->sender}}
              
            </div>
            <div class="col-lg-9 d-flex pe-3 ps=3 flex-row messagetexttickect">
                <p >
                    
                    {{ $item->message}}
                    
                </p>
            </div>

        </div>
      
        <div class="dropdown-divider"></div>
     
          
      @endforeach
      @else
        <div class="formsend">
          <form class="row g-3"  action="{{route('listteckets.store')}}" method="POST">
            @csrf
            <input type="hidden"  value="{{$id}}" name="id">
            <input type="hidden"  value="{{$flage}}" name="flage">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">name</label>
              <input type="text" class="form-control" value="{{$user->name}}" id="inputEmail4" name="name" readonly>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">email</label>
              <input type="email" class="form-control"value="{{$user->email}}" id="inputEmail4" name="email" readonly>
            </div>
          
                <div class="col-12"   @if ($flage !="add") style="display: none"    @endif>
                    <label for="inputAddress" class="form-label">subject</label>
                    <input type="text" class="form-control"  @if ($flage !="add") value="{{$flage}}"   @endif required id="inputEmail4" name="subject">
                </div>
                
          
          
            <div class="col-12">
              <label for="inputAddress" class="form-label">massage</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="massage" required></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">send</button>
            </div>
          </form>
    
        </div>
      
      @endif

    </div>

  </div>

</div>





        
@endsection