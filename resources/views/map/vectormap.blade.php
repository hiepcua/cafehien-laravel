@extends('layout.master')
@section('parentPageTitle', 'Map')
@section('title', 'Vector map')


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
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>World Map</h2>
            </div>
            <div class="body">
                <div id="world-map-markers" class="jvector-map" style="height: 300px"></div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="header">
                <h2>India Map</h2>
            </div>
            <div class="body text-center">
                <div id="india" style="height: 400px"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="header">
                <h2>USA Map</h2>
            </div>
            <div class="body text-center">
                <div id="usa" style="height: 400px"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="header">
                <h2>UK Map</h2>
            </div>
            <div class="body text-center">
                <div id="uk" style="height: 400px"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="header">
                <h2>Australia Map</h2>
            </div>
            <div class="body text-center">
                <div id="australia" style="height: 400px"></div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-in-mill.js') }}"></script>
<script src="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
<script src="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-uk-mill-en.js') }}"></script>
<script src="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-au-mill.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/maps/jvectormap.js') }}"></script>
@stop