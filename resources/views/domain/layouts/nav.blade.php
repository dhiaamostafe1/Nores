<div class="head bg-white pnav-5  between-flex">
    <div class="search p-relative">
      {{-- <input class="p-10" type="search" placeholder="Type A Keyword" /> --}}
    </div>
    <div class="icons d-flex align-center">
        <nav class="navbar navbar-expand-lg ">
            <ul class="navbar-nav ">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="list-group-item p-1 border border-white">
                        <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
                <li class="list-group-item p-2 border border-white">
                  <span class="notification p-relative">
                    <i class="fa-regular fa-bell fa-lg"></i>
                  </span>

                </li>
                <li class="list-group-item p-1 border border-white">
                  <img class="" src="{{asset('domain/imgs/avatar.png')}}" alt="" />
                </li>
            </ul>
        </nav>
     
     
    </div>
  </div>