@extends('fe.layouts.electronic.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Trang Chủ')


@section('content')

<div class="while slider-product-custom">
        <div class="content-slide-image" style="background: {{$productBanner->bg_slider_color}};">
            @foreach($productBannerImage as $key => $image_banner)
                @if($key < 1)
                    <img src="{{$image_banner->image}}" alt="Bootstrap">
                @else
                    <img src="{{$image_banner->image}}" class="hidden" alt="Bootstrap">
                @endif
            @endforeach
            
        </div>
        <div class="content-slide-text">
            <div class="data-1"></div>
            <div class="data-2">
                <div class="content-description">
                    <span class="title">{{$productBanner->name}}</span>
                    <p class="description-product-slide">
                        <span>
                        {{$productBanner->slogan_slider_1}}
                        </span>
                        
                        <span class="price">Giá Dùng Thử : {{Helper::formatCurency($productBanner->pricenew)}}</span>
                    </p>
                </div>
            </div>
            <div class="data-3">
                <div class="content-description">
                    <div class="title">{{$productBanner->slogan_slider_2}}</div>
                </div>
            </div>
            <div class="data-4">
                <div class="content-description">
                    <div class="title">{{$productBanner->slogan_slider_3}}</div>
                </div>
            </div>
        </div>

    </div>

    <div class="zoom-product-video-custom">

        <div class="zoom-text">
            <p class="text-title-product">{{$productBanner->name}}</p>
        </div>
        <video autoplay loop muted>
            <source src="{{$productBanner->video}}" type="video/mp4">
        </video>

    </div>
    @foreach($categoryAll as $key => $image_category)
        <div class="content-custom while p-0">
            <a href="/san-pham/{{Helper::convertSlug($image_category->category)}}.{{$image_category->id}}" class="wow animate__fadeInUp bannerCategory">
                <img src="{{$image_category->banner}}" class="image-category-full" />
            </a>
        </div>
    @endforeach
    

    <div class="bg-gradient-to-top while p-5 ">
        <div class="container">
            <div class="pt-5 mt-5 pb-5">
                <div class=" title-box uppercase main-color font-weight-medium text-center text-lg-start">Sản Phẩm Nổi Bật</div>
                <h2 class="text-color text-black font-weight-semibold text-center text-lg-start">
                    {{@Helper::getValueSetingByKey(slogan_SP_hot)->value}}
                </h2>
                <p class="font-size-14 accent-text-color text-center text-lg-start">
                    {{@Helper::getValueSetingByKey(des_SP_hot)->value}}
                </p>
            </div>
            <div class="row gy-lg-0 gy-5 wow wow animate__fadeInUp">
                @foreach($productHot as $key => $productItem )
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm">
                            <img src="{{$productItem->image}}" class="card-img-top" alt="{{$productItem->name}}">
                            <div class="card-body">
                                <p class="card-text d-flex justify-content-between">
                                    <a href="/san-pham/{{$productItem->slug}}.html"  class="uppercase font-size-12 main-color font-weight-medium title-hot-pr">{{$productItem->name}}</a>
                                    <a href="/san-pham/{{$productItem->slug}}.html"  class="font-size-12 accent-text-color font-weight-medium">{{Helper::formatCurency($productItem->pricenew)}}</a>
                                </p>
                                <!-- <h6 class="card-title text-color">{{$productItem->name}}</h6> -->
                                <div class="card-text accent-text-color font-size-12">{!! $productItem->short_description !!}</div>
                                <a href="/san-pham/{{$productItem->slug}}.html" class="main-color read-more text-decoration-none font-size-12">Xem Thêm <i data-feather="chevron-right" class="icon-12"></i></a>
                            </div>
                        </div>
                    </div>
                
                @endforeach
                    
            </div>
        </div>
    </div>
    <!-- ::::::::::::::: BLOG ::::::::::::::::::::-->
    <div class="bg-while-to-top while p-5 ">
        <div class="container">
            <div class="pb-5">
                <div class=" title-box uppercase main-color font-weight-medium text-center text-lg-start">Khuyến Mãi</div>
                <h2 class="text-color text-black font-weight-semibold text-center text-lg-start">
                    {{@Helper::getValueSetingByKey(KM_title)->value}}
                </h2>
                <p class="font-size-14 accent-text-color text-center text-lg-start">
                    {{@Helper::getValueSetingByKey(KM_des)->value}}
                </p>
            </div>
            <div class="row gy-lg-0 gy-5 wow wow animate__fadeInUp">
                @foreach($news as $key => $new )
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm">
                            <img src="{{$new->image}}" class="card-img-top" alt="{{$new->title}}">
                            <div class="card-body">
                                <p class="card-text d-flex justify-content-between">
                                    <a href="/bai-viet/{{@$new->slug}}.html"  class="uppercase font-size-12 main-color font-weight-medium title-hot-pr">{{$new->title}}</a>
                                </p>
                                <div class="card-text accent-text-color font-size-12">{!! $new->short_description !!}</div>
                                <a href="/bai-viet/{{@$new->slug}}.html" class="main-color read-more text-decoration-none font-size-12">Xem Thêm <i data-feather="chevron-right" class="icon-12"></i></a>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- ::::::::::::::: /END BLOG :::::::::::::::-->



@if($popup)
<!-- <div class="modal-custom-news">
    <div class="content-popup">
        <i class="fa fa-close icon-close" onclick="removePopup()"></i>
        @if($popup->video_url != '')
            <a href="/bai-viet/{{$popup->slug}}.html">
                <video src="{{@$popup->video_url}}" controls></video>
            </a>
        @else
            <a href="/bai-viet/{{$popup->slug}}.html">
                <img src="{{$popup->image}}" alt="{{$popup->title}}">
            </a>
        @endif
        
    </div>
</div> -->
@endif



@stop

@section('script')

<script>
    function removePopup(idCart) {
               $('.modal-custom-news').attr('style','display:none;')
                
    }
</script>

@stop