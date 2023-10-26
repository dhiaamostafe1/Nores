<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('domain/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('domain/css/framework.css')}}" />
    <link rel="stylesheet" href="{{asset('domain/css/master.css')}}" />
    <link rel="stylesheet" href="{{asset('domain/css/bootstrap.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
  </head>
  <body dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">


    <div class="page d-flex">
        @include('domain.layouts.slider')
        <div class="content w-full">
            @include('domain.layouts.nav')
           @yield('body')
        </div>
    </div>


 </body>
</html>