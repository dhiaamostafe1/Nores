

@extends('Home.layouts.layout')

@section('body')
  
  

    <main style="text-align: start;">

        <!-- Slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-7 col-md-9 ">
                                <div class="hero__caption" style="text-align: start;">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s">{{__('home.SliderHeader')}}</h1>
                                    <p  style="text-align: start;" data-animation="fadeInLeft" data-delay=".6s">{{__('home.SliderHeader1')}}</p>
                                   
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                                    <img src="{{asset('homeStyle/assets/img/hero/hero_right.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
        <!-- Slider Area End-->






























        <!-- What We do start-->
        <div class="what-we-do we-padding">
            <div class="container">
                <!-- Section-tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center">
                            <h2>{{__('home.whyCHosesystem')}}​</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-do text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-tasks"></span>
                            </div>
                            <div class="do-caption">
                                <h4> {{__('home.FA1')}}</h4>
                                <p>{{__('home.des1')}}</p>
                            </div>
                            <div class="do-btn">
                                <a href="#"><i class="ti-arrow-right"></i> get started</a>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="single-do active text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-social-media-marketing"></span>
                            </div>
                            <div class="do-caption">
                                <h4>{{__('home.FA2')}}</h4>
                                <p>{{__('home.des2')}}</p>
                            </div>
                            <div class="do-btn">
                                <a href="#"><i class="ti-arrow-right"></i> get started</a>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="single-do text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-project"></span>
                            </div>
                            <div class="do-caption">
                                <h4>{{__('home.FA3')}}</h4>
                                <p>{{__('home.des3')}}</p>
                            </div>
                            <div class="do-btn">
                                <a href="#"><i class="ti-arrow-right"></i> get started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- What We do End-->



























        <!-- We Create Start -->
        <div class="we-create-area create-padding" style="text-align: start;">
            <div class="container">
                <div class="row d-flex align-items-end">
                    <div class="col-lg-6 col-md-12">
                        <div class="we-create-img">
                            <img src="{{asset('homeStyle/assets/img//service/we-create.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="we-create-cap">
                            <h3>{{__('home.GroupLLL')}}</h3>
                            <p>{{__('home.DesGroupLLL')}}</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- We Create End -->








































        <!-- Generating Start -->
        <div class="generating-area ">
            <div class="container">
                 <!-- Section-tittle -->
                 <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center">
                            <h2>{{__('home.ProgramAdvantages')}}​</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-generating d-flex mb-30">
                            <div class="generating-icon">
                                <span class="flaticon-chart"></span>
                            </div>
                            <div class="generating-cap">
                                <h4>{{__('home.Ad1')}}</h4>
                                <p>{{__('home.Addes1')}} </p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-6 col-md-6">
                        <div class="single-generating d-flex mb-30">
                            <div class="generating-icon">
                                <span class="flaticon-social-media-marketing"></span>
                            </div>
                            <div class="generating-cap">
                                <h4>{{__('home.Ad2')}}</h4>
                                <p>{{__('home.Addes2')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-generating d-flex mb-30">
                            <div class="generating-icon">
                                <span class="flaticon-speaker"></span>
                            </div>
                            <div class="generating-cap">
                                <h4>{{__('home.Ad3')}}</h4>
                                <p>{{__('home.Addes3')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-generating d-flex mb-30">
                            <div class="generating-icon">
                                <span class="flaticon-growth"></span>
                            </div>
                            <div class="generating-cap">
                                <h4>{{__('home.Ad4')}}</h4>
                                <p>{{__('home.Addes4')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="single-generating d-flex mb-30">
                          <div class="generating-icon">
                              <span class="flaticon-growth"></span>
                          </div>
                          <div class="generating-cap">
                              <h4>{{__('home.Ad5')}}</h4>
                              <p>{{__('home.Addes5')}} </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="single-generating d-flex mb-30">
                        <div class="generating-icon">
                            <span class="flaticon-growth"></span>
                        </div>
                        <div class="generating-cap">
                            <h4>{{__('home.Ad6')}}</h4>
                            <p>{{__('home.Addes6')}} </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Generating End -->









































        <!--Choose Best start-->
        <div class="choose-best choose-padding">
            <div class="container">
                <!-- Section-tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-tittle text-center">
                            <h2>Pricing  </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-choose text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-growth"></span>
                            </div>
                            <div class="do-caption">
                                <h4>$ 05.00</h4>
                                <ul>
                                    <li>Increase traffic 50%</li>
                                    <li>Social Media Marketing</li>
                                    <li>10 Free Optimization</li>
                                    <li>24/7  support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="single-choose active text-center mb-30">
                            <div class="do-icon">
                                <span class="flaticon-award"></span>
                            </div>
                            <div class="do-caption">
                                <h4>$ 20.00</h4>
                                <ul>
                                    <li>Increase traffic 50%</li>
                                    <li>Social Media Marketing</li>
                                    <li>10 Free Optimization</li>
                                    <li>24/7  support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="single-choose text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-project"></span>
                            </div>
                            <div class="do-caption">
                                <h4>$ 30.00</h4>
                                <ul>
                                    <li>Increase traffic 50%</li>
                                    <li>Social Media Marketing</li>
                                    <li>10 Free Optimization</li>
                                    <li>24/7  support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Choose Best do End-->
       
    </main>
  

   @endsection