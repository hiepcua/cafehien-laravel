@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Danh Mục Sản Phẩm')


@section('content')
<div class="shop-section section pt-20">
            <div class="container p-0">
                <div class="row">
                    <!-- <div class="col-lg-3 order-lg-1 order-2 bg-while mobile-off ">
                        
                        <div class="common-sidebar-widget">
                            <h3 class="sidebar-title">Danh Mục</h3>
                            <ul class="sidebar-list">
                                @foreach($categorys as $item)
                                    <li><a href="/san-pham/{{\Helper::convertSlug($item->category)}}.{{$item->id}}"><i class="fa fa-angle-right"></i>{{$item->category}}</a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                        @foreach(@Helper::getADSRight() as $item)
                            <div class="common-sidebar-widget">
                                <div class="">
                                    <a href="#">
                                        <img src="{{$item->image}}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        
                        
                    </div> -->
                    <div class="col-lg-12 order-lg-2 p-0">
                        <div class="row m-0">
                            <div class="col-12 p-0">
                                <div class="shop-banner-title">
                                    <h3 class="sidebar-title"2>@if($category) {{$category->category}} @else Tất Cả @endif</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12  p-0">
                                <div class="shop-product">
                                    <div id="myTabContent-2" class="tab-content">
                                        <div id="grid" class="tab-pane fade active show">
                                            <div class="product-grid-view">
                                                <div class="row">
                                                    @foreach($products as $key => $product )
                                                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                            <!-- Single Product Start -->
                                                            <div class="single-product mb-2">
                                                                <div class="product-img">
                                                                    <a href="/san-pham/{{$product->slug}}.html">
                                                                        <img src="{{$product->image}}" alt="{{$product->name}}">
                                                                    </a>
                                                                   
                                                                </div>
                                                                <div class="product-content">
                                                                    <h3><a href="/san-pham/{{$product->slug}}.html">{{$product->name}}</a></h3>
                                                                    <h4 class="price">
                                                                        <span class="new">{{Helper::formatCurency($product->pricenew)}}</span>
                                                                        @if($product->pricenew != $product->price)
                                                                        <del class="old">{{Helper::formatCurency($product->price)}}</del>
                                                                        @endif
                                                                    </h4>
                                                                    @if($product->category_id == 2)
                                                                    <div class="single-product-quantity" style="margin: 0px;position: absolute;right: 10px;bottom: 25px">
                                                                        <div class="add-to-link">
                                                                            <button type="button"   name="{{Helper::formatCurency($product->pricenew)}}"  rel="{{$product->id}}"  alt="{{$product->name}}" class="btn btn-primary product-add-btn col-md-12" data-toggle="modal" data-target="#exampleModal" >Mua Hàng</button>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <!-- Single Product End -->
                                                        </div>
                                                        
                                                    @endforeach
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <ul class="page-pagination">
                                    @if ($products->lastPage() > 1)
                                        <li class="{{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a href="{{ $products->url(1) }}{{$name ? '&name='.$name : ''}}"><</a>
                                        </li>
                                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                                            <li class="{{ ($products->currentPage() == $i) ? ' active' : '' }}">
                                                <a href="{{ $products->url($i) }}{{$name ? '&name='.$name : ''}}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="{{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                            <a href="{{ $products->url($products->currentPage()+1) }}{{$name ? '&name='.$name : ''}}" >></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 order-lg-2 p-0">

                            <div class="row">
                                <p class="col-lg-12 title-box-slide-detail">
                                    Sản Phẩm Nổi Bật
                                </p>
                            </div>
                            
                            <div class="row tf-element-carousel" data-slick-options='{
                            "slidesToShow": 4,
                            "slidesToScroll": 1,
                            "infinite": true,
                            "arrows": true,
                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                            }' data-slick-responsive='[
                            {"breakpoint":1199, "settings": {
                            "slidesToShow": 3
                            }},
                            {"breakpoint":992, "settings": {
                            "slidesToShow": 2
                            }},
                            {"breakpoint":768, "settings": {
                            "slidesToShow": 2,
                            "arrows": false,
                            "autoplay": true
                            }},
                            {"breakpoint":576, "settings": {
                            "slidesToShow": 2,
                            "arrows": false,
                            "autoplay": true
                            }}
                            ]'>

                                @foreach($productHot as $key => $product )
                                <div class="col-lg-3">
                                    <!-- Single Product Start -->
                                    <div class="single-product mb-30">
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
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                    
                                @endforeach
                                
                            </div>
                    </div>

                    
                </div>
            </div>
        </div>
        
        <!-- Shop Section End -->


@stop

@section('script')

@stop