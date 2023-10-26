@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.7.3/moyasar.css">

<!-- Moyasar Scripts -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
<script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>


<input type="hidden"  id="idUrl" value="{{$data}}">
<div class="container">

    <div class="row p-5">
        <div class="col-lg-12">
            <div class="mysr-form " style="width: 100%"></div>
        </div>
    
    </div>
  
<script>
    
    Moyasar.init({
    element: '.mysr-form',
    amount: 33200,
    language: 'ar',
    currency: 'SAR',
    description: 'اشتراك سنوي',
    publishable_api_key: 'pk_test_p2RxGKGLES8S8XNwoy4gjf9ngfEo66dqDt9fGcyD',
    callback_url:  'http://localhost:8000/en/sittingdomain.Payment/'+document.getElementById('idUrl').value+'/',
    methods: [
    'creditcard',
    'applepay' ,
    'stcpay',
],

 apple_pay: {
            country: 'SA',
            label: ' Smart  Systems',
            validate_merchant_url: 'https://api.moyasar.com/v1/applepay/initiate',
        },
    on_completed: function (payment) {
        console.log(payment);
    }
});
</script>
    
</div>
@endsection
