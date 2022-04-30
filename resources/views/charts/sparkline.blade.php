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
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>All</strong> Examples</h2>
                <ul class="header-dropdown dropdown">
                    
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu theme-bg">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <p> Mouse speed <span id="mousespeed">Loading..</span></p>
                        <p> Inline <span class="sparkline-1">10,8,9,3,5,8,5</span> line graphs <span class="sparkline-1">8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10</span></p>
                        <p> Bar charts <span class="sparkbar">10,8,9,3,5,8,5</span> negative values: <span class="sparkbar">-3,1,2,0,3,-1</span> stacked: <span class="sparkbar">0:2,2:4,4:2,4:1</span></p>
                        <p> Composite inline <span id="compositeline">8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10</span></p>
                        <p> Inline with normal range <span id="normalline">8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10</span></p>
                        <p> Composite bar <span id="compositebar">4,6,7,7,4,3,2,1,4</span></p>
                        <p> Discrete <span class="discrete1">4,6,7,7,4,3,2,1,4,4,5,6,7,6,6,2,4,5</span><br>
                            Discrete with
                            threshold <span id="discrete2">4,6,7,7,4,3,2,1,4</span></p>
                        <p> Bullet charts<br>
                            <span class="sparkbullet">10,12,12,9,7</span><br>
                            <span class="sparkbullet">14,12,12,9,7</span><br>
                            <span class="sparkbullet">10,12,14,9,7</span><br>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p> Customize size and colours <span id="linecustom">10,8,9,3,5,8,5,7</span></p>
                        <p> Tristate charts <span class="sparktristate">1,1,0,1,-1,-1,1,-1,0,0,1,1</span><br>
                            (think games won,
                            lost or drawn) </p>
                        <p> Tristate chart using a colour map: <span class="sparktristatecols">1,2,0,2,-1,-2,1,-2,0,0,1,1</span></p>
                        <p> Box Plot: <span class="sparkboxplot">4,27,34,52,54,59,61,68,78,82,85,87,91,93,100</span><br>
                            Pre-computed box plot <span class="sparkboxplotraw">Loading..</span></p>
                        <p><span class="sparkpie">1,1,2,4,3</span><span class="sparkpie">1,5</span><span class="sparkpie">20,50,80</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')

@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/charts/sparkline.js') }}"></script>
@stop