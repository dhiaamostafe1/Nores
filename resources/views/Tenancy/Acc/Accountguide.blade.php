@extends('Tenancy.layouts.apptenancy')

@section('body')

<div class="card">
    <div class="card-header">
        <table class="table table-borderless" style="color: black">
                    
            <tbody>
              <tr>
                <td>{{__('Accguide.Madin')}}  : <span id="MadinAcc"> {{$inf->DebitAccount}}</span></td>
                <td>{{__('Accguide.Account')}} :<span id="AccountAcc">  {{$inf->AccountID}}</span></td>
                <td>{{__('Accguide.Source')}} :<span id="SourceAcc">  {{$inf->AccountSource}} </span></td>
                <td>{{__('Accguide.name')}} : :<span id="NameAcc">  {{$inf->AccountName}} </span> </td>
                <td></td>
              </tr>
              <tr>
                <td>{{__('Accguide.Dain')}} : <span id="DainAcc">  {{$inf->CreditAccount}}</span></td>
                <td>{{__('Accguide.Balance')}}:<span id="BalanceAcc"> {{$inf->BalanceAccount}}</span></td>
                <td>{{__('Accguide.MAIN')}} :<span id="MAINAcc">  {{$inf->DebitAccount}}</span></td>
                <td></td>
              </tr>
            </tbody>
        </table>

    </div>
    <div class="card-body">
        <ul id="myUL">
            @foreach($data as $category)
                <li   data-count="{{ $category->id }}">
                    
                 
                    <span class="box" data-count="{{ $category->id }}"> {{ $category->AccountName }}</span>
                    @if(count($category->childs))
                        @include('manageChild',['childs' => $category->childs])
                    @endif
                </li>
            @endforeach
       </ul>
    </div>
</div>




    <script src="{{asset('js/Acount.js')}}"></script>
{{-- <script src="{{asset('js/MultiNestedList.js')}}"></script> --}}
@endsection
