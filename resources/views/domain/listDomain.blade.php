


@extends('domain.layouts.layouts')

@section('body')


<div class="projects p-20 bg-white rad-10 m-20">
  <h2 class="mt-0 mb-20">{{__('Dom.listdomain')}}</h2>
  <div class="responsive-table">
    <table class="fs-15 w-full">
      <thead>
        <tr>
          <td>{{__('Dom.id')}}</td>
          <td>{{__('Dom.company')}}</td>
          <td>{{__('Dom.name')}}</td>
          <td>{{__('Dom.email')}}</td>
          <td>{{__('Dom.phone')}}</td>
          <td>{{__('Dom.domain')}}</td>
          <td style="width: 20%;">{{__('Dom.Control')}}</td>
        </tr>
        
      </thead>
      <tbody>
        @foreach ($data as $item)

      
          <tr>
            <td style="width: 4%">{{ $item->id}}</td>
            <td>{{ $item->company}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone}} </td>
            
            <td>
             <a href="http://{{$item->domain .config('Sitting.port')}}" target="_blank"  style="color: blue" >  {{ $item->domain}}</a>
            </td>
            <td>

              <a class="bg-blue c-white btn-shape" href="{{ route('Company.index', $item->id) }}" >Active</a>
              <a class="label btn-shape bg-orange  c-white"  href="{{ route('Payment.create', $item->id) }}">Paymant</a>
              <a class="bg-red c-white btn-shape" href="{{ route('Ticket.create', $item->id) }}" >Ticket</a>
            
            </td>
          </tr> 
        </a>
            
        @endforeach

      </tbody>
    </table>
  </div>
</div>


    
@endsection



