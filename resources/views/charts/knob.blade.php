@extends('layout.master')
@section('parentPageTitle', 'Charts')
@section('title', 'Knob chart')


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
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="66" data-width="120" data-height="120" data-thickness="0.05" data-bgColor="#f7f7f7" data-fgColor="#ff598f">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="76" data-width="120" data-height="120" data-thickness="0.32" data-bgColor="#f7f7f7" data-fgColor="#64c8c0">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="47" data-width="120" data-height="120" data-thickness="0.50" data-bgColor="#f7f7f7" data-fgColor="#ffcd29">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="64" data-width="120" data-height="120" data-thickness="0.16" data-bgColor="#f7f7f7" data-fgColor="#cb8fe7">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="74" data-width="120" data-height="120" data-thickness="0.2" data-bgColor="#f7f7f7" data-fgColor="#f66d9b">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="33" data-width="120" data-height="120" data-thickness="0.12" data-bgColor="#f7f7f7" data-fgColor="#8bc3fe">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="45" data-width="125" data-height="125" data-thickness="0.25" data-angleArc="250" data-angleoffset="-125" data-bgColor="#f7f7f7" data-fgColor="#ff598f">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="53" data-width="125" data-height="125" data-thickness="0.25" data-angleArc="250" data-angleoffset="-305" data-bgColor="#f7f7f7" data-fgColor="#64c8c0">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="22" data-width="125" data-height="125" data-thickness="0.25" data-angleArc="250" data-angleoffset="-35" data-bgColor="#f7f7f7" data-fgColor="#ffcd29">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="67" data-width="125" data-height="125" data-thickness="0.25" data-angleArc="250" data-angleoffset="145" data-bgColor="#f7f7f7" data-fgColor="#cb8fe7">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="92" data-width="125" data-height="125" data-thickness="0.25" data-angleArc="270" data-angleoffset="-0" data-bgColor="#f7f7f7" data-fgColor="#f66d9b">
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <input type="text" class="knob" value="39" data-width="125" data-height="125" data-thickness="0.25" data-angleArc="270" data-angleoffset="90" data-bgColor="#f7f7f7" data-fgColor="#8bc3fe">
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')

@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/jquery-knob/jquery.knob.min.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/charts/jquery-knob.js') }}"></script>
@stop