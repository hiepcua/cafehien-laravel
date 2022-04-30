@extends('layout.master')
@section('parentPageTitle', 'Forms')
@section('title', 'Drag & Drop File Upload,')


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
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="header">
                <h2>Default <small>Taken from: https://github.com/JeremyFagis/dropify</small></h2>
            </div>
            <div class="body">
                <input type="file" class="dropify">
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>With event and default file <small>try to remove the image</small></h2>
            </div>
            <div class="body">
                <input type="file" id="dropify-event" data-default-file="{{ asset('assets/images/image-gallery/1.jpg') }}">
            </div>
        </div>                    
        <div class="card">
            <div class="header">
                <h2>Disabled file upload</h2>
            </div>
            <div class="body">
                <input type="file" class="dropify" disabled="disabled">
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="header">
                <h2>Limit file type <small>try to upload png or pdf only</small></h2>
            </div>
            <div class="body">
                <input type="file" class="dropify" data-allowed-file-extensions="pdf png">
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Limit file size <small>try to upload file larger than 100 KB</small></h2>
            </div>
            <div class="body">
                <input type="file" class="dropify" data-max-file-size="100K">
            </div>
        </div>                    
        <div class="card">
            <div class="header">
                <h2>Custom messages for default <small>replace, remove and error</small></h2>
            </div>
            <div class="body">
                <input type="file" class="dropify-fr">
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
@stop