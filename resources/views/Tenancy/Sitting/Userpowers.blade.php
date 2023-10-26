@extends('Tenancy.layouts.apptenancy')

@section('body')

<form   method="POST" class="form-check" action="{{ route('UserPowers.store') }}">
    @csrf
    <div class="card">
                <input type="hidden" name="id" value="{{$id}}">
            <div class="card-header" style="padding: 8px 14px 0px 14px">
                
             

                <div class="row">
                    <div class="col-lg-9 col-sm-6 col-xs-6 mb-2">
                        <button type="submit" class="btn btn-primary d-flex flex-row">{{__('All.Save')}}</button>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-6 ">
                        <select class="form-select d-flex flex-row-reverse" id="SelectUser" aria-label="Default select example">
                            <option value="{{$id}}">.....</option>
                            @foreach ($user as $item)
                                
                                @if($item->id ==$id)
                                   <option selected value="{{$item->id}}">{{$item->name}}</option>
                                @else
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            
                            @endforeach
                        </select> 
                    </div>

                </div>
               

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table text-center">
                        <thead>
                        
                            <tr>
                                <th style="width: 5%">{{__('All.id')}}</th>
                                <th>{{__('All.Name')}}</th>
                                <th style="width: 8%">{{__('All.Insert')}}</th>
                                <th style="width: 8%">{{__('All.add')}}</th>
                                <th style="width: 8%">{{__('All.Update')}}</th>
                                <th style="width: 8%">{{__('All.delete')}}</th>
                                <th style="width: 8%">{{__('All.Show')}}</th>
                                <th style="width: 8%">{{__('All.Print')}}</th>
                                
                            </tr>
                        </thead>
                        <tbody class=" ">
                            
                            @foreach ($power as $key => $item)
                                <tr>
                                    <th scope="row">{{$key }}</th>
                            
                                
                                    @if (LaravelLocalization::getCurrentLocaleDirection() =="ltr")
                                    <td>{{$item->Scrn_Name_E}}</td>
                                
                                    @else
                                    <td>{{$item->Scrn_Name}}</td>
                                    @endif 
                                
                                
                                    <td>  <input class="form-check-input" type="checkbox" name="inser{{$key}}" value="{{ $item->Inter}}"  @if ($item->Inter ==1 ) checked @endif></td>
                                    <td> <input class="form-check-input"  type="checkbox" name="ADD{{$key}}"   value="{{ $item->ADD }}"   @if ($item->ADD ==1 ) checked @endif></td>
                                    <td>  <input class="form-check-input" type="checkbox" name="Update{{$key}}"value="{{$item->Update}}"  @if ($item->Update ==1 ) checked @endif></td>
                                    <td> <input class="form-check-input"  type="checkbox" name="Delete{{$key}}"value="{{ $item->Delete }}"@if ($item->Delete ==1 ) checked @endif></td>
                                    <td> <input class="form-check-input"  type="checkbox" name="Show{{$key}}"  value="{{ $item->Show }}"  @if ($item->Show ==1 ) checked @endif></td>
                                    <td> <input class="form-check-input"  type="checkbox" name="Print{{$key}}" value="{{ $item->Print}}"  @if ($item->Print ==1 ) checked @endif></td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
  
    </div>
</form>
         


    
 





@endsection
