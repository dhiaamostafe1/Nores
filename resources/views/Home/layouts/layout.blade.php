<!doctype html>
<html class="no-js" lang="zxx" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"  >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ذكاء الانظمة لتقنية المعلومات </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">


        <link rel="icon" type="image/x-icon" href="{{asset('homeStyle/assets/img/favicon.ico')}}">
        <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{asset('homeStyle/assets/img/favicon.ico')}}">
        <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('homeStyle/assets/img/favicon.ico')}}">
 
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('homeStyle/assets/img/favicon.ico')}}">
        <meta name=description content=" منصة انظمة محاسبة  ,   انظمة محاسبة  الكتروني ،   ,   ">
        <meta name=keywords content=" ،  امتلك نظام محاسبي  . ">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{asset('homeStyle/assets/css/style.css')}}">
   </head>

   <body style="text-align: end;">















        @include('Home.layouts.header')

         @yield('body')

         @include('Home.layouts.footer')

















    
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{asset('homeStyle/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{asset('homeStyle/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{asset('homeStyle/assets/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{asset('homeStyle/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/slick.min.js')}}"></script>
        <!-- Date Picker -->
        <script src="{{asset('homeStyle/assets/js/gijgo.min.js')}}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset('homeStyle/assets/js/wow.min.js')}}"></script>
		<script src="{{asset('homeStyle/assets/js/animated.headline.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{asset('homeStyle/assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('homeStyle/assets/js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{asset('homeStyle/assets/js/contact.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/jquery.form.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/mail-script.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/jquery.ajaxchimp.min.js')}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{asset('homeStyle/assets/js/plugins.js')}}"></script>
        <script src="{{asset('homeStyle/assets/js/main.js')}}"></script>
        
    </body>
</html>