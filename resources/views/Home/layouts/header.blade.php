<header>
    <!-- Header Start -->
   <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="{{route('welcome')}}"><img src="{{asset('homeStyle/assets/img/logo/logo.png')}}" alt="" style="width: 150px;"></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8 col-md-8">
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav> 
                                <ul id="navigation">    
                                    <li><a href="{{ route('home')}}"> {{ __('home.home')}}</a></li>
                                    <li><a href="about.html"> {{ __('home.about')}}</a></li>
                                    <li><a href="services.html"> {{ __('home.Services')}}</a></li>
                                    <li><a href="contact.html"> {{ __('home.Contact')}}</a></li>
                                    <li><a href="blog.html"> {{ __('home.language')}}</a>
                                        <ul class="submenu">
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a rel="alternate"hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> 
                                                    {{ $properties['native'] }}
                                                </a>
                                            </li>
                                            @endforeach
                                            
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>             
                 
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
   </div>
    <!-- Header End -->
</header>