@extends('Tenancy.layouts.apptenancy')

@section('body')

<style>
  .form-control{
    HEIGHT: 32px !important;
  }
</style>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover  table-borderless" id="table-list">
                <thead>
                    <tr>

                       
              
                        {{-- <th>{{ __('Catagories.Item_cod')}}</th> --}}
                        <th>{{ __('Catagories.Item_Unit')}}</th>

                        <th>{{ __('Catagories.Item_BAY1')}}</th>
                        <th>{{ __('Catagories.Item_BAY')}}</th>
                        <th>{{ __('Catagories.Item_Sell')}}</th>
                        <th>{{ __('Catagories.Item_CNT')}}</th>
                        
                        {{-- <th style="width: 5% ">{{ __('Catagories.Edite')}}</th>
                        <th style="width: 5% ">{{ __('Catagories.Delete')}}</th> --}}
                    </tr>
                </thead>
                <tbody  id="ItemCatTableData">
                    @foreach ($data as $item)
                        <tr id="idItemCatData{{$item->id }}" data-falge="0" data-contact="{{$item->id }}">
                          {{-- <td id="ItemCatDatacode{{$item->id }}"> {{ $item->Item_cod }}</td> --}}
                          <td id="ItemCatDataname{{$item->id }}"> {{ $item->Item_Unit }}</td>
                          <td id="ItemCatDataItem_BAY{{$item->id }}"> {{ $item->Item_BAY1 }}</td>


                          <td id="ItemCatDataItem_CNT{{$item->id }}"> {{ $item->Item_BAY }}</td>
                          <td id="ItemCatDataItem_Sell{{$item->id }}"> {{ $item->Item_Sell }}</td>
                          

                          <td id="ItemCatDataItem_NAT{{$item->id }}"> {{ $item->Item_CNT }}</td>
                          
                        
                      </tr>
                        
                    @endforeach
                </tbody>
            </table>
         
        </div>
    </div>

</div>







<script src="{{asset('js/Category.js')}}"></script>
<script src="{{asset('js/bootstable.js')}}"></script>
<script>
//apply
$("#table-list").SetEditable();

$('#add').click(function() {
    rowAddNew('table-list');
});

</script>
 

@endsection
