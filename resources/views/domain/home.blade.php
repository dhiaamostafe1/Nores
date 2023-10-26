
@extends('domain.layouts.layouts')
@section('body')
    
     
   
        <!-- Start Head -->
       
        <!-- End Head -->
        {{-- <h1 class="p-relative">Dashboard</h1> --}}
        {{-- start Row  --}}
        <div class="row m-5 text-center">
            <div class="col-lg-3">

                <div class="bg-white rad-10">
                    <div class="box p-20 rad-10 fs-13 c-grey">
                        <i class="fa-regular fa-rectangle-list fa-2x mb-10 c-orange"></i>
                        <span class="d-block c-black fw-bold fs-25 mb-5">2500</span>
                        Total
                      </div>

                </div>

            </div>
            <div class="col-lg-3">
                <div class="bg-white rad-10">
                    <div class="box p-20 rad-10 fs-13 c-grey">
                        <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i>
                        <span class="d-block c-black fw-bold fs-25 mb-5">500</span>
                        Pending
                      </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="bg-white rad-10">
                    <div class="box p-20 rad-10 fs-13 c-grey">
                        <i class="fa-regular fa-circle-check fa-2x mb-10 c-green"></i>
                        <span class="d-block c-black fw-bold fs-25 mb-5">1900</span>
                        Closed
                      </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="bg-white rad-10">
                    <div class="box p-20 rad-10 fs-13 c-grey">
                        <i class="fa-regular fa-rectangle-xmark fa-2x mb-10 c-red"></i>
                        <span class="d-block c-black fw-bold fs-25 mb-5">100</span>
                        Deleted
                      </div>

                </div>
            </div>

        </div>
        {{-- End Row  --}}



        <div class="wrapper d-grid gap-20">
          <!-- Start Welcome Widget -->



         
          <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
            <div class="intro p-20 d-flex space-between bg-eee">
              <div>
                <h2 class="m-0">Welcome</h2>
                <p class="c-grey mt-5">Smart</p>
              </div>
              <img class="hide-mobile" src="{{asset('domain/imgs/welcome.png')}}" alt="" />
            </div>
            <img src="{{asset('domain/imgs/avatar.png')}}" alt="" class="avatar" />
            <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
              <div>Smart System<span class="d-block c-grey fs-14 mt-10">Developer</span></div>
              <div>80 <span class="d-block c-grey fs-14 mt-10">Projects</span></div>
              <div>$8500 <span class="d-block c-grey fs-14 mt-10">Earned</span></div>
            </div>
            <a href="#" class="visit d-block fs-14 bg-blue c-white w-fit btn-shape">Profile</a>
          </div>
          <!-- End Welcome Widget -->
          <!-- Start Quick Draft Widget -->
          <div class="quick-draft p-20 bg-white rad-10">
            <h2 class="mt-0 mb-10">Quick Draft</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Write A Draft For Your Ideas</p>
            <form>
              <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="Title" />
              <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" placeholder="Your Thought"></textarea>
              <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save" />
            </form>
          </div>
          <!-- End Quick Draft Widget -->
          
          <!-- Start Ticket Widget -->
         
          <!-- End Ticket Widget -->
          
     
        </div>
        <!-- Start Projects Table -->
        
        <!-- End Projects Table -->
    

@endsection

