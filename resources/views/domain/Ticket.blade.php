


@extends('domain.layouts.layouts')

@section('body')


<div class="projects p-20 bg-white rad-10 m-20">
  <h2 class="mt-0 mb-20">{{__('Dom.Paymentinf')}}</h2>
  <div class="responsive-table">
    <table class="fs-15 w-full">
      <thead>
        <tr>
          <td>{{__('Dom.id')}}</td>
          <td>{{__('Dom.numberBay')}}</td>
          <td>{{__('Dom.Status')}}</td>
          <td>{{__('Dom.Price')}}</td>
          <td>{{__('Dom.data')}}</td>
          <td>{{__('Dom.period')}}</td>
      
        </tr>

      
        
      </thead>
      <tbody>
        @foreach ($data as $item)

      
          <tr>
           
            <td style="width: 4%">{{ $item->id}}</td>
            <td>{{ $item->message}}</td>
            <td>{{ $item->state }}</td>
            <td>{{ $item->source}} </td>
            <td>{{ $item->main }}</td>
            <td>{{ $item->name}} </td>
           
           
          </tr> 
        </a>
            
        @endforeach

      </tbody>
    </table>
  </div>
</div>


    
@endsection



