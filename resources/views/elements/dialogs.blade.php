@extends('layout.master')
@section('parentPageTitle', 'Elements')
@section('title', 'Dialogs')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <p>A basic message</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="basic">Click Me</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <p>A title with a text under</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="with-title">Click Me</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <p>A success message!</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="success">Click Me</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <p>An HTML message</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="html-message">Click Me</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <p>A message with a custom icon</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="with-custom-icon">Click Me</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <p>A message with auto close timer</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="autoclose-timer">Click Me</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                <p>A warning message, with a function attached to the <b>Confirm</b> button...</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="confirm">Click Me</button>
            </div>
        </div>
            <div class="card">
            <div class="body">
                <p>A replacement for the <b>prompt</b> function</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="prompt">Click Me</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="body">
                    <p>With a loader (for AJAX request for example)</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="ajax-loader">Click Me</button>
            </div>
        </div>
        <div class="card">
            <div class="body">
                    <p>... and by passing a parameter, you can execute something else for <b>Cancel</b>.</p>
                <button class="btn btn-primary theme-bg js-sweetalert" data-type="cancel">Click Me</button>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/ui/dialogs.js') }}"></script>
@stop