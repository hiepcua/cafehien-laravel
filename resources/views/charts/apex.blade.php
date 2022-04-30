@extends('layout.master')
@section('parentPageTitle', 'Charts')
@section('title', 'Apex chart')


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
    <div class="col-xl-4 col-lg-5 col-md-12">
        <div class="card">
            <div class="body">
                <div id="apexspark1"></div>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <div id="apexspark2"></div>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <div id="apexspark3"></div>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <div id="apexspark-chart1"></div>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <div id="apexspark-chart2"></div>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <div id="apexspark-chart3"></div>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <div id="apexspark-chart4"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Basic Radar</h2>
            </div>
            <div class="body">
                <div id="apex-basic-radar"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Radar Multiple Series</h2>
            </div>
            <div class="body">
                <div id="apex-radar-multiple-series"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Radar with Polygon Fill</h2>
            </div>
            <div class="body">
                <div id="apex-radar-polygon-fill"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Simple Donut</h2>
            </div>
            <div class="body">
                <div id="apex-simple-donut"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Circle Chart</h2>
            </div>
            <div class="body">
                <div id="apex-circle-chart"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Circle Chart Multiple</h2>
            </div>
            <div class="body">
                <div id="apex-circle-chart-multiple"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Circle Gradient</h2>
            </div>
            <div class="body">
                <div id="apex-circle-gradient"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Stroked Gauge</h2>
            </div>
            <div class="body">
                <div id="apex-stroked-gauge"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Area Datetime</h2>
                <ul class="header-dropdown dropdown">
                    <li><button class="btn btn-sm btn-outline-secondary mr-1" id="one_month">1M</button></li>
                    <li><button class="btn btn-sm btn-outline-secondary mr-1" id="six_months">6M</button></li>
                    <li><button class="btn btn-sm btn-outline-secondary mr-1" id="one_year" class="active">1Y</button></li>
                    <li><button class="btn btn-sm btn-outline-secondary mr-1" id="ytd">YTD</button></li>
                    <li><button class="btn btn-sm btn-outline-secondary" id="all">ALL</button></li>
                </ul>
            </div>
            <div class="body">
                <div id="apex-timeline-chart"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Stacked Area</h2>
            </div>
            <div class="body">
                <div id="apex-stacked-area"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Timeline</h2>
            </div>
            <div class="body">
                <div id="apex-timeline"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Basic Bar</h2>
            </div>
            <div class="body">
                <div id="apex-basic-bar"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Basic CandleStick</h2>
            </div>
            <div class="body">
                <div id="apex-CandleStick"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Basic Column</h2>
            </div>
            <div class="body">
                <div id="apex-basic-column"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Basic Heatmap Chart</h2>
            </div>
            <div class="body">
                <div id="apex-basic-heatmap"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Basic Scatter Chart</h2>
            </div>
            <div class="body">
                <div id="apex-basic-scatter"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Basic Line Column</h2>
            </div>
            <div class="body">
                <div id="apex-chart-line-column"></div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Simple Bubble</h2>
            </div>
            <div class="body">
                <div id="apex-simple-bubble"></div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')

@stop

@section('vendor-script')
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/charts/apex.js') }}"></script>
@stop