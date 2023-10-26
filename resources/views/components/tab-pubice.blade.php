

   
    <div class="">
        <h4 class="border-bottom pb-2 mb-0">{{$header}}</h4>
        
      <fieldset id="group1">
          <div class="form-check  pe-2 pt-2">
              <input class="form-check-input " type="radio" name="{{$name}}" value="0" @if ($value ==0)
              checked
              @endif >
              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault1">
              {{$ridone}}
              </label>
            </div>
            <div class="form-check  pe-2 pt-2">
              <input class="form-check-input" type="radio" name="{{$name}}"   value="1"  @if ($value ==1)
              checked
              @endif>
              <label class="form-check-label  me-4 formlabelcu" for="flexRadioDefault2">
                  {{$ridtow}}
              </label>
            </div>
       </fieldset>
      </div>
  
    