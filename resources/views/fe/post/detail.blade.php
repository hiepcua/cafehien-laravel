@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Chi Tiết Bài Viết')


@section('content')



        <!-- Blog Section Start -->
        <div class="blog-section-detail section">
            <div class="container">
                <div class="row">

                    @if($new->id != 3 && $new->id != 4)
                    <div class="col-lg-3 order-lg-1 order-2">

                        <!-- Single Sidebar Start  -->
                        <div class="common-sidebar-widget">
                            <h3 class="sidebar-title">Bài Viết Mới</h3>
                            <ul class="sidebar-list">
                                @foreach($news as $key => $item )
                                    <li><a href="/bai-viet/{{@$item->slug}}.html"><i class="fa fa-angle-right"></i>{{@$item->title}}</a></li>
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
                        <!-- Single Sidebar End  -->

                    </div>
                    <div class="col-lg-9 mb-sm-40 mb-xs-30">
                        <div class="blog_area">
                            <article class="blog_single blog-details">
                                <header class="entry-header">
                                    <span class="post-category">
                                        <a href="#"> {{$new->parent->category}}</a>
                                    </span>
                                    <h2 class="entry-title">
                                        {{$new->title}}
                                    </h2>
                                    <span class="post-author">
                                    <!-- <span class="post-by"> Posts by : </span> admin </span>
                                    <span class="post-separator">|</span> -->
                                    <span class="post-date"><i class="fas fa-calendar-alt"></i>{{$new->created_at}}</span>
                                </header>
                                <div class="post-thumbnail img-full">
                                    @if(!$new->video_url)
                                        <img src="{{@$new->image}}" alt="{{@$new->title}}">
                                    @else
                                        <video src="{{@$new->video_url}}" controls></video>
                                    @endif

                                </div>
                                <div class="postinfo-wrapper">
                                    <div class="post-info">
                                        <div class="entry-summary blog-post-description">
                                            {!! $new->description !!}
                                            <!--Blog Post Tag-->
                                            <!-- <div class="single-post-tag">
                                                <a href="#">3 comments</a>
                                                Tags:
                                                <a href="#">fashion</a>,
                                                <a href="#">t-shirt</a>,
                                                <a href="#">white</a>,
                                            </div> -->
                                            <!--Blog Post Tag-->
                                            <!-- <div class="social-sharing">
                                                <div class="widget widget_socialsharing_widget">
                                                    <h3 class="widget-title">Share this post</h3>
                                                    <ul class="blog-social-icons">
                                                        <li>
                                                            <a target="_blank" title="Facebook" href="#" class="facebook social-icon">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" title="twitter" href="#" class="twitter social-icon">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" title="pinterest" href="#" class="pinterest social-icon">
                                                                <i class="fa fa-pinterest"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" title="linkedin" href="#" class="linkedin social-icon">
                                                                <i class="fa fa-linkedin"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- <div class="relatedposts">
                                <h3>Bài Viết Liên Quan</h3>
                                <div class="row">

                                    @foreach($news as $key => $item )
                                        @if(!$item->video_url)
                                            <div class="col-md-4 col-sm-6">
                                                <div class="relatedthumb mb-xs-30">
                                                    <div class="image">
                                                        <a href="/bai-viet/{{@$item->slug}}.html"><img src="{{@$item->image}}" alt="{{@$item->title}}"></a>
                                                    </div>
                                                    <h4><a href="/bai-viet/{{@$item->slug}}.html">{{@$item->title}}</a></h4>
                                                    <span class="rl-post-date">{{@$item->created_at}}</span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-4 col-sm-6">
                                                <div class="relatedthumb mb-xs-30">
                                                    <div class="image">
                                                        <video src="{{@$item->video_url}}" controls></video>
                                                    </div>
                                                    <h4><a href="/bai-viet/{{@$item->slug}}.html">{{@$item->title}}</a></h4>
                                                    <span class="rl-post-date">{{@$item->created_at}}</span>
                                                </div>
                                            </div>


                                        @endif
                                    @endforeach

                                </div>
                            </div> -->
                        </div>

                    </div>
                    @elseif($new->id == 4)
                        <div class="col-lg-12 col-12 mb-10">
                            <div class="contact-form-wrap">
                                <h3 class="contact-title">TRỞ THÀNH ĐỐI TÁC</h3>
                                @if ( $error == 1 )
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                @endif
                                @if ( $error == 2 )
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                @endif
                                <form  autocomplete="off"  id="contact-form-lienhe" action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-form-style mb-20 input-group">
                                                <select required class="custom-select" name="province_id" >
                                                    <option value="">Tỉnh Thành</option>
                                                    @foreach($listProvinces as $item)
                                                        <option value="{{$item->id}}">{{$item->province}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-style mb-20 input-group">
                                                <select required class="custom-select" name="partner_style">
                                                    <option value="">Loại Thành Viên</option>
                                                    @foreach($partnerStyle as $item)
                                                        <option value="{{$item->id}}" >{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="name" placeholder="Họ Tên*" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="birthday" class="form-control birthday"  placeholder="Ngày Sinh*" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="email" placeholder="Email*" type="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="phone" placeholder="Số điện thoại*" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-style mb-20 input-group">
                                                <select required class="custom-select" name="male">
                                                        <option value="1" >Nam</option>
                                                        <option value="2" >Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="ccid" placeholder="CMND/Passport*" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-form-style mb-20">
                                                <input name="address" placeholder="Địa chỉ*" type="text" required>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="contact-form-style">
                                                <textarea name="note" placeholder="Những kinh nghiệm cộng tác đã có.." required></textarea>
                                                <button class="btn" type="submit"><span>Gửi</span></button>
                                                <!-- @if(Auth::guard('web')->user())

                                                @else
                                                <a class="form-button" href="/dang-nhap?callback=/{{Request::path()}}">
                                                                Gửi</a>
                                                @endif -->

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 mb-10">
                        {!! $new->description !!}
                        </div>
                    @else
                        {!! $new->description !!}
                    @endif


                </div>
            </div>




        </div>
        <!-- Blog Section End -->

        <div class="product-section section">
                <div class="container">

                    <div class="row">
                        <!-- Section Title Start -->
                        <div class="col">
                            <p class="col-lg-12 title-box-slide-detail p-0">
                                Sản Phẩm Nổi Bật
                            </p>
                        </div>
                        <!-- Section Title End -->
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
@stop

@section('script')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">

<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script>
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript">
   $('.birthday').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       format: 'dd/mm/yyyy'
   });

</script>

<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Sweet Alerts js -->
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>
<script src="{{ asset('fe/assets/js/jquery.emojiRatings.js') }}"></script>
<script>

</script>

@stop
