


@extends('domain.layouts.layouts')
@section('body')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <section id="main-content ">
            


                  <div class="row">
                    <div class="col-lg-6">
                      <div  class="p-3 mt-5   bg-white rad-10 " >

                        <form  action="{{ route('domain.store')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('Dom.company')}}</label>
                             
                              <div class=" col-sm-10 ">
                                <input type="text" class="form-control border rounded border-opacity-25" name="company" placeholder="{{__('Dom.company')}}" required>
                               
                              </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('Dom.name')}}</label>
                               
                                <div class=" col-sm-10 ">
                                  <input type="text" class="form-control border rounded border-opacity-25" name="name" placeholder="{{__('Dom.name')}}" required>
                                 
                                </div>
                              </div>
    
                              <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('Dom.domain')}}</label>
                               
                                <div class=" col-sm-10 ">
                                  <input type="text" class="form-control border rounded border-opacity-25" name="domain"  placeholder="{{__('Dom.domain')}}" required>
                                 
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('Dom.phone')}}</label>
                               
                                <div class=" col-sm-10 ">
                                  <input type="number" class="form-control border rounded border-opacity-25" name="phone"placeholder="{{__('Dom.phone')}}" required>
                                 
                                </div>
                              </div>
    
                              <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('Dom.email')}}</label>
                               
                                <div class=" col-sm-10 ">
                                  <input type="email" class="form-control border rounded border-opacity-25" name="email"placeholder="{{__('Dom.email')}}" required>
                                 
                                </div>
                              </div>
    
                              <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">{{__('Dom.pass')}}</label>
                               
                                <div class=" col-sm-10 ">
                                  <input type="password" class="form-control border rounded border-opacity-25" name="Password" placeholder="{{__('Dom.pass')}}" required>
                                 
                                </div>
                              </div>
    
                             
                           
                            <button type="submit" class="btn btn-primary">{{__('Dom.save')}}</button>
                          </form>
    
    
                    </div>

                    </div>

                  </div>
               
               
                
               


              
            </section>
        </div>
    </div>
</div>
    
@endsection



