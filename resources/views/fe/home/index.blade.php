@extends('fe.layouts.home')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Trang Chủ')


@section('content')

<div class="container">
    <div class="row">
        <div class="hero-section section position-relative">

            <div class="tf-element-carousel slider-nav" data-slick-options='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "infinite": true,
            "arrows": true,
            "dots": true
            }' data-slick-responsive='[
            {"breakpoint":768, "settings": {
            "slidesToShow": 1
            }},
            {"breakpoint":575, "settings": {
            "slidesToShow": 1,
            "arrows": false,
            "autoplay": false
            }}
            ]'>
                <!--Hero Item start-->
                @foreach($baners as $baner)
                    <div class="hero-item bg-image" >
                        @if($baner->type == 1)
                            <img src="{{$baner->banner}}" />
                        @else
                            <video src="{{@$baner->banner}}" controls autoplay></video>
                        @endif
                        <!-- <div class="container">
                            <div class="row">
                                <div class="col-12"> -->

                                    <!--Hero Content start-->
                                    <!-- <div class="hero-content-2 color-1 center"> -->

                                        <!-- <h2>view our</h2> -->
                                        <!-- <h1>{{@$baner->text}}</h1>
                                        <h3>{{@$baner->description}}</h3> -->
                                        <!-- <a href="shop.html">shop now</a> -->

                                    <!-- </div> -->
                                    <!--Hero Content end-->

                                <!-- </div>
                            </div>
                        </div> -->
                    </div>
                @endforeach
                
                <!--Hero Item end-->

            </div>

        </div>
    </div>
</div>

<!--Banner section start-->
<div class="banner-section section ">
    <div class="container p-0">
        <div class="row">
            <p class="col-lg-12 title-box-slide">
                Sản Phẩm Mới
            </p>
            @foreach($productNew as $key => $product )
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <!-- Single Product Start -->
                <div class="single-product mb-2">
                    <div class="product-img">
                        <a href="/san-pham/{{$product->slug}}.html">
                            <img src="{{$product->image}}" alt="{{$product->name}}">
                        </a>
                        <!-- <span class="descount-sticker">-10%</span> -->
                        <!-- <span class="sticker">Mới</span> -->
                        <div class="product-action d-flex justify-content-between">
                            <!-- <a class="product-btn" href="#">Add to Cart</a> -->
                            <ul class="d-flex">
                                <!-- <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-heart-o"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-exchange"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="/san-pham/{{$product->slug}}.html">{{$product->name}}</a></h3>
                        <!-- <h5><a href="/san-pham/{{$product->slug}}.html">{{$product->size}}</a></h5> -->
                        <!-- <div class="ratting">
                            @for($i = 0; $i < Helper::getRatingProduct($product->id); $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </div> -->
                        <h4 class="price">
                            <span class="new">{{Helper::formatCurency($product->pricenew)}}</span>
                            @if($product->pricenew != $product->price)
                            <del class="old">{{Helper::formatCurency($product->price)}}</del>
                            @endif
                        </h4>
                        @if($product->category_id == 2)
                        <div class="single-product-quantity" style="margin: 0px;position: absolute;right: 10px;bottom: 25px">
                            <div class="add-to-link">
                                <button type="button"  rel="{{$product->id}}" name="{{Helper::formatCurency($product->pricenew)}}"  alt="{{$product->name}}" class="btn btn-primary product-add-btn col-md-12" data-toggle="modal" data-target="#exampleModal" >Mua Hàng</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- Single Product End -->
            </div>
            @endforeach
            <div class="col-lg-12 img-mobile-ads">
                <img class="ads-home" src="{{$adsHome1->image}}">
            </div>
            
        </div>
    </div>
    
</div>
<!--Banner section end-->


<div class="banner-section section">
    <div class="container p-0">
        <div class="row">
            <p class="col-lg-12 title-box-slide">
                Sản Phẩm Nổi Bật
            </p>
            @foreach($productHot as $key => $product )
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <!-- Single Product Start -->
                <div class="single-product mb-2">
                    <div class="product-img">
                        <a href="/san-pham/{{$product->slug}}.html">
                            <img src="{{$product->image}}" alt="{{$product->name}}">
                        </a>
                        <!-- <span class="descount-sticker">-10%</span> -->
                        <!-- <span class="sticker">Mới</span> -->
                        <div class="product-action d-flex justify-content-between">
                            <!-- <a class="product-btn" href="#">Add to Cart</a> -->
                            <ul class="d-flex">
                                <!-- <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-heart-o"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-exchange"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="/san-pham/{{$product->slug}}.html">{{$product->name}}</a></h3>
                        <!-- <h5><a href="/san-pham/{{$product->slug}}.html">{{$product->size}}</a></h5> -->
                        <!-- <div class="ratting">
                            @for($i = 0; $i < Helper::getRatingProduct($product->id); $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </div> -->
                        <h4 class="price">
                            <span class="new">{{Helper::formatCurency($product->pricenew)}}</span>
                            @if($product->pricenew != $product->price)
                            <del class="old">{{Helper::formatCurency($product->price)}}</del>
                            @endif
                        </h4>
                        @if($product->category_id == 2)
                        <div class="single-product-quantity" style="margin: 0px;position: absolute;right: 10px;bottom: 25px">
                            <div class="add-to-link">
                                <button type="button"  rel="{{$product->id}}"  name="{{Helper::formatCurency($product->pricenew)}}" alt="{{$product->name}}" class="btn btn-primary product-add-btn col-md-12" data-toggle="modal" data-target="#exampleModal" >Mua Hàng</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- Single Product End -->
            </div>
            @endforeach
            <div class="col-lg-12 img-mobile-ads">
                <img class="ads-home" src="{{$adsHome2->image}}">
            </div>
            
            
        </div>
    </div>
    
</div>
</div>


<!--Blog section start-->
<div class="blog-new-mobile section mb-30">
    <div class="container bg-white p-0">

        <div class="row">
            <div class=" col-lg-12 section-title-news ">
                <div class="red-box"></div>
                <h2>Bài Viết</h2>
            </div>
        </div>
        <div class="row block-blog">
            
            <div class="col-lg-6 title-box-slide pl-0">
                <div class="blog-full col pl-0">
                    <div class="blog-inner">
                        <div class="media">
                            <a href="/bai-viet/{{@$new->slug}}.html" class="image"><img src="{{@$newsTop->image}}" alt=""></a>
                        </div>
                        <a class="content"  href="/bai-viet/{{@$newsTop->slug}}.html">
                            <h3 class="title">{{@$newsTop->title}}</h3>
                            <div class="des">{!! $newsTop->short_description !!}</div>
                            
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 title-box-slide pr-0" >

                @foreach($news as $key => $new )
                    @if(!$new->video_url)
                        <div class="blog-han col">
                            <div class="blog-inner">
                                <div class="media">
                                    <a href="/bai-viet/{{@$new->slug}}.html" class="image"><img src="{{@$new->image}}" alt=""></a>
                                </div>
                                <div class="content">
                                    <div class="title"><a href="/bai-viet/{{@$new->slug}}.html">{{@$new->title}}</a></div>
                                    <div class="des">{!! $new->short_description !!}</div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="blog-han col">
                            <div class="blog-inner">
                                <div class="media">
                                    <video src="{{@$new->video_url}}" controls></video>
                                </div>
                                <div class="content">
                                    <div class="title"><a href="/bai-viet/{{@$new->slug}}.html">{{@$new->title}}</a></div>
                                    <div class="des"> {!! $new->short_description !!}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            
            </div>
        </div>

        
    </div>
</div>

@if($popup)
<div class="modal-custom-news">
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
</div>
@endif



@stop

@section('script')

<script>
    function removePopup(idCart) {
               $('.modal-custom-news').attr('style','display:none;')
                
    }
</script>

@stop