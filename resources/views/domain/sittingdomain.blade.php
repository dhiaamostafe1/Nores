


@extends('domain.layouts.layouts')
@section('body')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <section id="main-content ">
            


              <div class="settings-page m-20 d-grid gap-20">
               





                <form  action="{{ route('sittingdomain.store')}}" method="POST">
                  @csrf

                  <input type="hidden"  value="{{$data->domainid}}" name="Iddomain">
                <!-- Start Settings Box -->
                  <div class="p-20 bg-white rad-10">
                    <h2 class="mt-0 mb-10">{{__('Dom.sittingdomain')}}</h2>
                    {{-- <p class="mt-0 mb-20 c-grey fs-15">General Information About Your Account</p> --}}
                    <div class="mb-15 between-flex">
                      <div>
                        <span>{{__('Dom.active')}}</span>
                        {{-- <p class="c-grey mt-5 mb-0 fs-13">Open/Close Website And Type The Reason</p> --}}
                      </div>
                      <div>
                        <label>
                          <input class="toggle-checkbox" type="checkbox" @if($data->active ==1)
                              checked=""
                          @endif  name="active">
                          <div class="toggle-switch"></div>
                        </label>
                      </div>
                    </div>
                    <div class="mb-15">
                      <label class="fs-14 c-grey d-block mb-10" for="first">{{__('Dom.payment')}}</label>
                      <input class="b-none border-ccc p-10 rad-6 d-block w-full" value="{{$data->payment}}"  name="Payment" type="text" id="first" placeholder="Payment" required>
                    </div>

                    <div class="mb-15">
                      <label class="fs-14 c-grey d-block " for="last">{{__('Dom.datatime')}}</label>
                      <input class="b-none border-ccc p-10 rad-6 d-block w-full" value="{{$data->datatime}}" name="datatime" id="last" type="date" placeholder="Last Name" required>
                    </div>




                    <div class="date d-flex align-center mb-15">
                      <input type="radio" name="type" id="Personal" @if ($data->entitytype =="Personal")
                      checked=""
                      @endif  value="Personal">
                      <label for="Personal" style="padding: 1px 17px;">{{__('Dom.Personal')}}</label>
                    </div>
                    <div class="date d-flex align-center mb-15">
                      <input type="radio" name="type" id="company" 
                      @if ($data->entitytype =="company")
                      checked=""
                      @endif  value="company">
                      <label for="company" style="padding: 1px 17px;">{{__('Dom.company')}}</label>
                    </div>
                    <div class="date d-flex align-center mb-15">
                      <input type="radio"  @if ($data->entitytype =="institution")
                      checked=""
                      @endif 
                      name="type" id="institution" value="institution">
                      <label for="institution" style="padding: 1px 17px;">{{__('Dom.institution')}}</label>
                    </div>
                   
                    <div class="mb-15">
                      <label class="fs-14 c-grey d-block " for="last">{{__('Dom.Categourt')}}</label>
                      <input class="b-none border-ccc p-10 rad-6 d-block w-full"  value="{{$data->category}}" name="Categourt" id="last" type="text" placeholder="Categourt" required>
                    </div>


                    <button type="submit" class="btn btn-primary">{{__('Dom.save')}}</button>

                  </div>


                </form>
              </div>





               
               
                
               


              
            </section>
        </div>
    </div>
</div>
    
@endsection
