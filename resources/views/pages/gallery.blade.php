@extends('layout.master')
@section('parentPageTitle', 'Pages')
@section('title', 'Gallery')


@section('content')

<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>JustDo @yield('title'),</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Total</p>
                    <h5 class="mb-0">12K</h5>
                </div>
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Views</p>
                    <h5 class="mb-0">62K</h5>
                </div>
                <div class="mb-3 mb-xl-0">
                    <p class="text-muted mb-1">Followers</p>
                    <h5 class="mb-0">2021</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light page_menu">
            <a class="navbar-brand" href="javascript:void(0);">M.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-muted"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item vivify swoopInTop delay-150 active"><a class="nav-link" href="javascript:void(0);">All</a></li>
                    <li class="nav-item vivify swoopInTop delay-250"><a class="nav-link" href="javascript:void(0);">Illustration</a></li>
                    <li class="nav-item vivify swoopInTop delay-350"><a class="nav-link" href="javascript:void(0);">Product</a></li>
                    <li class="nav-item vivify swoopInTop delay-350"><a class="nav-link" href="javascript:void(0);">Typography</a></li>
                    <li class="nav-item dropdown vivify swoopInTop delay-450">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown">More</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);">Print</a>
                            <a class="dropdown-item" href="javascript:void(0);">Web Design</a>
                            <a class="dropdown-item" href="javascript:void(0);">Mobile</a>
                            <a class="dropdown-item" href="javascript:void(0);">Animation</a>
                        </div>
                    </li>
                </ul>
                <div class="ml-auto">
                    <button type="button" class="btn btn-default">Upload</button>
                    <a href="javascript:void(0);" class="btn btn-dark">Buy this item</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div id="lightgallery" class="row clearfix lightGallery">
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/1.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/1.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/2.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/2.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/3.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/3.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/4.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/4.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/5.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/5.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/6.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/6.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/7.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/7.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/8.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/8.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/9.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/9.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/10.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/10.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/11.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/11.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/12.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/12.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/13.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/13.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/14.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/14.jpg') }}" alt=""></a></div>
                    <div class="col-lg-3 col-md-6 m-b-15"><a class="light-link" href="{{ asset('assets/images/image-gallery/15.jpg') }}"><img class="img-fluid" src="{{ asset('assets/images/image-gallery/15.jpg') }}" alt=""></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/light-gallery/css/lightgallery.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/light-gallery/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('assets/vendor/light-gallery/js/mousewheel.min.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/medias/image-gallery.js') }}"></script>
@stop