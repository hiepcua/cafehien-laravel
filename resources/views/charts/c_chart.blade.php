@extends('layout.master')
@section('parentPageTitle', 'Charts')
@section('title', 'C3 chart')


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

<div class="row row-cards">
    <div class="col-12">
        <div class="card">
            <div class="header">
                <h2>Wind speed during two days</h2>
            </div>
            <div class="body">
                <div id="chart-spline" style="height: 300px"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Employment Growth</h2>
            </div>
            <div class="body">
                <div id="chart-employment" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Monthly Average Temperature</h3>
            </div>
            <div class="body">
                <div id="chart-temperature" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Area Chart</h2>
            </div>
            <div class="body">
                <div id="chart-area" style="height: 300px"></div>
            </div>
        </div>                    
        <div class="card">
            <div class="header">
                <h2>Step Chart</h2>
            </div>
            <div class="body">
                <div id="chart-step" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Step Chart Fill</h2>
            </div>
            <div class="body">
                <div id="chart-area-step" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Stacked Bar Chart</h2>
            </div>
            <div class="body">
                <div id="chart-bar-stacked" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Combination chart</h2>
            </div>
            <div class="body">
                <div id="chart-combination" style="height: 300px"></div>
            </div>
        </div> 
    </div>
    <div class="col-xl-4 col-lg-5 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Pie Chart</h2>
            </div>
            <div class="body">
                <div id="chart-pie" style="height: 300px"></div>
            </div>
        </div> 
        <div class="card">
            <div class="header">
                <h2>Donut Chart</h2>
            </div>
            <div class="body">
                <div id="chart-donut" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Area Chart Sracked</h2>
            </div>
            <div class="body">
                <div id="chart-area-spline-sracked" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Rotated Chart</h2>
            </div>
            <div class="body">
                <div id="chart-spline-rotated" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Bar Rotated Chart</h2>
            </div>
            <div class="body">
                <div id="chart-bar-rotated" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Bar Chart</h2>
            </div>
            <div class="body">
                <div id="chart-bar" style="height: 300px"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>scatter Chart</h2>
            </div>
            <div class="body">
                <div id="chart-scatter" style="height: 300px"></div>
            </div>
        </div>                
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/charts/c3.js') }}"></script>
@stop