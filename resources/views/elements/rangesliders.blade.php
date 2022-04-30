@extends('layout.master')
@section('parentPageTitle', 'Elements')
@section('title', 'Range Sliders')


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
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Tabs With Only Icon Title</h2>
            </div>
            <div class="body">
                <div class="irs-demo m-b-30"><b>Start without params</b>
                    <input type="text" id="range_01" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>Set min value, max value and start point</b>
                    <input type="text" id="range_02" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>Set type to double and specify range, also showing grid and adding prefix "$"</b>
                    <input type="text" id="range_03" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>Set up range with negative values</b>
                    <input type="text" id="range_04" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>Using step 250</b>
                    <input type="text" id="range_05" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>Set up range with fractional values, using fractional step</b>
                    <input type="text" id="range_06" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>Set up you own numbers</b>
                    <input type="text" id="range_07" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>Using any strings as your values</b>
                    <input type="text" id="range_08" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>One more example with strings</b>
                    <input type="text" id="range_09" value="" />
                </div>
                <div class="irs-demo m-b-30"><b>No prettify. Big numbers are ugly and unreadable</b>
                    <input type="text" id="range_10" value="" />
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/rangeslider/css/ion.rangeSlider.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/rangeslider/css/ion.rangeSlider.skinNice.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/rangeslider/js/ion.rangeSlider.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/range-sliders.js') }}"></script>
@stop