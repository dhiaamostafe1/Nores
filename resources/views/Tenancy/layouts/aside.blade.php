  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('DashboardTenancy')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">{{ __('aside.Dashboard')}}</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#Saller" aria-expanded="false" aria-controls="Saller">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Saller</span>
         
        </a>
        <div class="collapse" id="Saller">
          <ul class="nav flex-column sub-menu">
    
            @if (getrull(session()->get('loginuser'), 29,'Show'))
              
                <li class="nav-item"> <a class="nav-link" href="{{route('Client.index')}}">{{__('aside.Cleint')}}</a></li>
            @endif
            <li class="nav-item"> <a class="nav-link" href="{{ route('SallerFatoorrah.create') }}">{{ __('fatoorah.sales')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('viewpriceFatoorah.create') }}">{{ __('fatoorah.price')}}</a></li>



          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#Buyment" aria-expanded="false" aria-controls="Buyment">
          <i class="icon-ban menu-icon"></i>
          <span class="menu-title">Buy</span>
       
        </a>
        <div class="collapse" id="Buyment">
          <ul class="nav flex-column sub-menu">
            @if (getrull(session()->get('loginuser'), 29,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{route('Supplier.index')}}">{{__('aside.Supplier')}}</a></li>
            @endif
            

            <li class="nav-item"> <a class="nav-link" href="{{ route('Bayfatoorah.create') }}">{{ __('fatoorah.Buy')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('MorBayfatoorah.create') }}">{{ __('fatoorah.Mort')}}</a></li>

            
            

          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">{{ __('aside.Basicdata')}}</span>
        
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            @if (getrull(session()->get('loginuser'), 21,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{route('group.index')}}">{{ __('aside.Group')}}</a></li>
            @endif
            @if (getrull(session()->get('loginuser'), 17,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{route('unite.unite')}}">{{ __('aside.Unite')}}</a></li>
            @endif
            @if (getrull(session()->get('loginuser'), 33,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{route('EntryType.index')}}">{{__('aside.Entry')}}</a> </li>
            @endif
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">{{ __('aside.Acc')}}</span>
         
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            @if (getrull(session()->get('loginuser'), 25,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('Bank.index')}}">{{ __('aside.Bank')}}</a></li>
            @endif
            @if (getrull(session()->get('loginuser'), 74,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('box.index')}}">{{ __('aside.Box')}}</a></li>
            @endif
            @if (getrull(session()->get('loginuser'), 23,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('Branch.index')}}">{{ __('aside.Branch')}}</a></li>
            @endif
            @if (getrull(session()->get('loginuser'), 28,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('envoy.index')}}">{{ __('aside.envoy')}}</a></li>
            @endif
            @if (getrull(session()->get('loginuser'), 24,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('Store.index')}}">{{ __('aside.Store')}}</a></li>
            @endif
            @if (getrull(session()->get('loginuser'), 19,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('Accountguide.index')}}">{{ __('aside.Acc')}}</a></li>
            @endif
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="icon-bar-graph menu-icon"></i>
          <span class="menu-title">{{__('aside.inf')}}</span>
      
        </a>
        <div class="collapse" id="charts" style="">
          <ul class="nav flex-column sub-menu">
           
              
              @if (getrull(session()->get('loginuser'), 22,'Show'))
              <li class="nav-item"> <a class="nav-link" href="{{ route('Cost.index') }}">{{ __('aside.Cost')}}</a></li>
              @endif
              @if (getrull(session()->get('loginuser'), 31,'Show'))
              <li class="nav-item"> <a class="nav-link" href="{{ route('User.index') }}">{{ __('aside.User')}}</a></li>
              @endif
              
              @if (getrull(session()->get('loginuser'), 31,'Show'))
              <li class="nav-item"> <a class="nav-link" href="{{ route('tabledate.index') }}">{{ __('aside.tabledate')}}</a></li>
              @endif
              @if (getrull(session()->get('loginuser'), 30,'Show'))
          
              <li class="nav-item"> <a class="nav-link" href="{{ route('restrict.index') }}">{{ __('aside.restrictions')}}</a></li>
              @endif
            
              <li class="nav-item"> <a class="nav-link" href="{{ route('sanadat.index') }}">{{ __('aside.SanadatSarf')}}</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('sanadatQ.index') }}">{{ __('aside.SanadatQabd')}}</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ route('daybox.index') }}">{{ __('aside.Daybox')}}</a></li>



              {{-- 'SanadatSarf' => 'سندات صرف',
              'SanadatQabd' => 'سندات قبض',
              'Daybox' => 'يوميات صندوق',
               --}}
              {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('restrict.index') }}">{{ __('sanadat')}}</a></li> --}}
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">{{__('aside.Mostafed')}}</span>
         
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
          
           
            @if (getrull(session()->get('loginuser'), 29,'Show'))
              <li class="nav-item"> <a class="nav-link" href="{{route('Supplier.index')}}">{{__('aside.Supplier')}}</a></li>
            
            @endif
            
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="icon-contract menu-icon"></i>
          <span class="menu-title">{{ __('aside.Move')}}</span>
         
        </a>
        <div class="collapse" id="icons" style="">
          <ul class="nav flex-column sub-menu">
            @if (getrull(session()->get('loginuser'), 16,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('Category.index')}}">{{ __('aside.Categories')}}</a></li>
            @endif


            @if (getrull(session()->get('loginuser'), 61,'Show'))
            <li class="nav-item"> <a class="nav-link" href="{{ route('TabaleCategory.index')}}">{{ __('aside.tabCategories')}}</a></li>
           
            @endif
           

        




            <li class="nav-item"> <a class="nav-link" href="{{ route('athenFatoorah.create') }}">{{ __('fatoorah.Soadd')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('deleteFatoorah.create') }}">{{ __('fatoorah.delete')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('destoryFatoorah.create') }}">{{ __('fatoorah.tune')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('kardFatoorah.create') }}">{{ __('fatoorah.Storeinventory')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('mortaghFatoorah.create') }}">{{ __('fatoorah.throwback')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('saleFatoorah.create') }}">{{ __('fatoorah.sales')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('sarfFatoorah.create') }}">{{ __('fatoorah.Dismissalnotice')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('tahapFatoorah.create') }}">{{ __('fatoorah.gold')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('viewpriceFatoorah.create') }}">{{ __('fatoorah.price')}}</a></li>

          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
         
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="icon-ban menu-icon"></i>
          <span class="menu-title">Error pages</span>
       
        </a>
        <div class="collapse" id="error">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>