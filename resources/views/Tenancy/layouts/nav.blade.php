<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      {{-- <h2 class="navbar-brand brand-logo mr-5">smart System</h2>
      <h2  class="navbar-brand brand-logo-mini">smart System</h2> --}}
      <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{asset('images/smart.jpeg')}}" class="mr-2" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/smart.jpeg')}}" alt="logo"/></a>
    </div>
    
    <div class="navbar-menu-wrapper ">



    
      
      <nav class="navheadermenu">
        <ul  class="navbar-nav ulnavheadermenu">
          <li class="nav-item">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="icon-menu"></span>
            </button>
            
          </li>
         
          <li>
            <ul class="navbar-nav  navbar-toggler-left ">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="fa fa-globe" aria-hidden="true"></i>
                
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header"> {{__('aside.language')}}</p>
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            
                  <a rel="alternate" class="dropdown-item d-flex align-items-center" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                      {{ $properties['native'] }}
                  </a>
              
                  @endforeach
                </div>
              </li>
      
      
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle"  href="{{route('tichet.create')}}" >
                  <i class="icon-bell mx-0"></i>
                  <span class="count"></span>
                </a>
                
              </li>

         
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <img src="{{asset('images/smart.jpeg')}}" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="{{route('SYSAccount.index')}}">
                    <i class="ti-settings text-primary"></i>
                    {{__('aside.AccGuid')}}
                  </a>
                  <a class="dropdown-item" href="{{ route('UserPowers.create' , 1) }}">
                    <i class="ti-settings text-primary"></i>
                    {{__('aside.SittingPower')}}
                  </a>
                  <a class="dropdown-item" href="{{ route('SittingSystem.index') }}">
                    <i class="ti-settings text-primary"></i>
                    {{__('aside.Setting')}}
                  </a>
                  <a class="dropdown-item" href="{{route('logintenancy.close')}}">
                    <i class="ti-power-off text-primary"></i>
                    {{__('aside.logout')}}
                  </a>
                </div>
              </li>
             
            </ul>
          </li>
        </ul>
      </nav>

      
      
     
      {{-- <ul class="navbar-nav d-flex navbar-toggler-left flex-row-reverse">
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="fa fa-globe" aria-hidden="true"></i>
          
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header"> {{__('aside.language')}}</p>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                      
            <a rel="alternate" class="dropdown-item d-flex align-items-center" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        
            @endforeach
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle"  href="{{route('tichet.create')}}" >
            <i class="icon-bell mx-0"></i>
            <span class="count"></span>
          </a>
          
        </li>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{asset('images/smart.jpeg')}}" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item">
              <i class="ti-settings text-primary"></i>
              Settings
            </a>
            <a class="dropdown-item">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a>
          </div>
        </li>
       
      </ul> --}}
      
    </div>
  </nav>