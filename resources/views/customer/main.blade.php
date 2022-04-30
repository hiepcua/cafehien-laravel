<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ asset('customer/img/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
<title>@yield('title') - {{ config('app.name') }}</title>
<meta name="description" content="@yield('meta_description', config('app.name'))">
<meta name="author" content="@yield('meta_author', config('app.name'))">



<link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('customer/font-awesome/4.2.0/css/font-awesome.min.css') }}" />

<link rel="stylesheet" href="{{ asset('customer/fonts/fonts.googleapis.com.css') }}" />

<link rel="stylesheet" href="{{ asset('customer/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

<link rel="stylesheet" href="{{ asset('customer/css/custom.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

<script src="{{ asset('customer/js/ace-extra.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('customer/font-awesome/css/font-awesome.min.css') }}">

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/angular.js') }}"></script>


@yield('meta')
@stack('before-styles')


@stack('after-styles')
@if (trim($__env->yieldContent('page-styles')))    
@yield('page-styles')
@endif    

</head>

<body  ng-app="app-manager" class="no-skin" >
    @include('customer.navbar')

    <div class="main-container" id="main-container">
        <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
        </script>
        @include('customer.rightbar')
        <div class="main-content">
            @yield('content')
        </div>
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>

<script src="{{ asset('customer/js/jquery.2.1.1.min.js') }}"></script>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('customer/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('customer/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>


<script src="{{ asset('customer/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('customer/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('customer/js/fuelux.spinner.min.js') }}"></script>
<script src="{{ asset('customer/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('customer/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('customer/js/moment.min.js') }}"></script>
<script src="{{ asset('customer/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('customer/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('customer/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('customer/js/bootstrap-tag.min.js') }}"></script>

<script src="{{ asset('customer/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.flot.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('customer/js/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('customer/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('customer/js/ace.min.js') }}"></script>
<script src="{{ asset('fe/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('fe/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('fe/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('fe/assets/js/plugins.js') }}"></script>
<script src="{{ asset('fe/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Sweet Alerts js -->
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>

<script>
        var customInterpolationApp = angular.module('app-manager', []);

        customInterpolationApp.config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('((');
        $interpolateProvider.endSymbol('))');
        });
        
</script>
@stack('before-scripts')

    @stack('after-scripts')

    <!-- vendor js file -->
    @yield('vendor-script')

    <!-- project main Scripts js-->

    <!-- page Scripts ja -->
    @yield('page-script')
    @yield('script')

</body>
</html>
