@extends('layout.master')
@section('parentPageTitle', 'Forms')
@section('title', 'Summernote')


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
                <h2>Summernote</h2>
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
                <div class="summernote">
                    Hi there,
                    <br/><br/>
                    <p>The toolbar can be customized and it also supports various callbacks such as <code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many more.</p>
                    <p><strong>Note:</strong> The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English</p>                                
                    <br/><br/>
                    <p>Thank you!</p>
                    <h6>Summer Note</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote-bs4.min.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/summernote/dist/summernote-bs4.min.js') }}"></script>
@stop

@section('page-script')
<script>
    $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 1,
        height: 300
    });
</script>
@stop