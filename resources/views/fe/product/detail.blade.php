@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Chi Tiết Sản Phẩm')


@section('content')
<ng-controller ng-controller="AppController as demo">
        <!-- Single Product Section Start -->
        <div class="single-product-section section pt-20">
            <div class="container">
                <div class="row">
                
                    <h2 class="col-md-12 title_proDuct_mobile">{{$product->name}}</h2>
		            <div class="col-md-8 ">
		                <!-- Product Details Left -->
                        <div class="product-details-left ">
                            <div class="col-md-2 product-details-thumbs slider-thumbs-1 tf-element-carousel" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "focusOnSelect": true,
                                "asNavFor": ".slider-lg-image-1",
                                "arrows": false,
                                "dots" : true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive= '[
                                {"breakpoint":991, "settings": {
                                    "slidesToShow": 3
                                }},
                                {"breakpoint":767, "settings": {
                                    "slidesToShow": 4
                                }},
                                {"breakpoint":479, "settings": {
                                    "slidesToShow": 2
                                }}
                            ]'>				
                                @foreach($productImages as $key => $item )
                                <div class="sm-image"><img src="{{$item->image}}" alt="product image thumb"></div>
                                @endforeach
                                
                            </div>
                            <div class=" col-md-10 product-details-images slider-lg-image-1 tf-element-carousel" data-slick-options='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "asNavFor": ".slider-thumbs-1",
                                "arrows": false,
                                "dots" : true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }'>
                                
                                @foreach($productImages as $key => $item )
                                <div class="lg-image">
                                    <img src="{{$item->image}}" alt="{{$product->name}}">
                                    <a href="{{$item->image}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                </div>
                                @endforeach

                            </div>
                            
                        </div>
                        <!--Product Details Left -->
		            </div>
		            <div class="col-md-4">
                        <!--Product Details Content Start-->
                        
		                <div class="product-details-content">
                            
		                    <h2>{{$product->name}}</h2>
		                    <div class="product-description">
                                <p>
                                    {!! $product->short_description !!}
                                </p>
                            </div>

                            
                            

                            @if ( @$statusCart == 1 )
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>{{  $messageCart }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            @if ( @$statusCart === 2 )
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{  $messageCart }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                                <form class="add-quantity" action="" method="post">
                                    @csrf
                                    <input name="type" value="1" type="hidden"/>
                                    <div class="choose-group-product">
                                        <div class="group-cart-table table-responsive">
                                            <!-- <table class="table table-bordered">
                                                <tbody>
                                                    @foreach($productOption as $key => $item )
                                                        <tr>
                                                            <td class="product-quantity">
                                                                <div class="quantity-field">
                                                                    <label for="qty">Số Lượng</label>
                                                                    <input id="qty" min="0" max="100" value="0" type="number" name="cart[{{$item->id}}]">
                                                                </div>
                                                            </td>
                                                            <td class="pro-title">
                                                                {!! $item->size ? 'Size : '.$item->size .'<br/>' : '' !!}
                                                                {!! $item->color ? 'Màu : '.$item->color .'<br/>': '' !!} 
                                                                {!! $item->material ? 'Thành Phần : '.$item->material .'<br/>' : '' !!}
                                                            </td>
                                                            <td class="pro-price">
                                                                <span>{{Helper::formatCurency($item->price - $item->sale_price )}}</span> 
                                                                @if ($item->sale_price != '' || $item->sale_price != 0)
                                                                <del>{{Helper::formatCurency($item->price )}}</del>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table> -->
                                            
                                        </div>
                                    </div>
                                    
                            
                                </form>
                            
                            @if(count($productOption) > 0)
                            @endif
                            <!-- <div class="wishlist-compare-btn">
                                <a href="#" class="wishlist-btn">Add to Wishlist</a>
                                <a href="#" class="add-compare">Compare</a>
                            </div> -->
                            <!-- <div class="product-meta">
                                <span class="posted-in">
                                        Danh Mục: 
		                                <a href="/san-pham/{{\Helper::convertSlug($product->parent->category)}}.{{$product->parent->id}}">{{$product->parent->category}}</a>
		                            </span>
                            </div> -->
                            <!-- <div class="single-product-sharing">
                                <h3>Share this product</h3>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                </ul>
                            </div> -->
                        </div>
                        

                        <div class="single-product-price">
                            <span class="new">{{Helper::formatCurency($product->pricenew)}}</span>
                            @if($product->pricenew != $product->price)
                            <del class="old">{{Helper::formatCurency($product->price)}}</del>
                            @endif
                            <!-- <span class="regular-price">$77.00</span> -->
                        </div>
		                <!--Product Details Content End-->
		            </div>
		        </div>
            </div>
        </div>
        <!-- Single Product Section End -->

        <!--Product Description Review Section Start-->
		<div class="product-description-review-section section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="product-review-tab">
                        {!! $product->description !!}
                            <!--Review And Description Tab Menu Start-->
                            <!-- <ul class="nav dec-and-review-menu">
                                <li>
                                <a class="active" data-toggle="tab" href="#description">Nội Dung</a>
                                </li>
                                <li>
                                <a data-toggle="tab" href="#reviews">Bình Luận</a>
                                </li>
                            </ul> -->
                            <!--Review And Description Tab Menu End-->
                            <!--Review And Description Tab Content Start-->
                            <!-- <div class="tab-content product-review-content-tab" id="myTabContent-4">
                                <div class="tab-pane fade active show" id="description">
                                    <div class="single-product-description">
                                        {!! $product->description !!}
                                    </div>
                                </div> -->
                                <!-- <div class="tab-pane fade" id="reviews">
                                    <div class="review-page-comment">
                                    <h2>{{count($productRating)}} lượt đánh giá</h2>
                                    <ul>
                                        @foreach($productRating as $key => $item )
                                            <li>
                                                <div class="product-comment">
                                                    <img src="{{$item->user->avatar ? $item->user->avatar : asset('assets/images/xs/avatar1.jpg')}}" alt="">
                                                    <div class="product-comment-content">
                                                        <div class="product-reviews">
                                                            @for($i = 0; $i < $item->rating; $i++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                            @for($i = 0; $i < 5 - $item->rating ; $i++)
                                                                <i class="fa fa-star-o"></i>
                                                            @endfor
                                                        </div>
                                                        <p class="meta">
                                                            <strong>{{$item->user->name}}</strong> - <span>{{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span>
                                                            <div class="image-list-aptach" >
                                                                @foreach($item->images as $imageRating)
                                                                    <img class="thumbnail show-image-full" src="{{$imageRating->images}}" />
                                                                @endforeach
                                                                
                                                            </div>    
                                                        <div class="description">
                                                            <p>{{$item->comment}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="review-form-wrapper">
                                        <div class="review-form">
                                            <span class="comment-reply-title">Thêm Bình luận </span>
                                            <form action="" method="POST" id="rating-form" enctype="multipart/form-data">
                                                @csrf
                                                <p class="comment-notes">
                                                    <span id="email-notes" style="color:red">Vui lòng đánh giá sao cho sản phẩm trước khi gửi.</span>
                                                       <span class="required"  style="color:red">*</span>
                                                </p>
                                                <input name="type" value="2" type="hidden"/>
                                                <div class="comment-form-rating">
                                                    <label>Đánh Giá Của Bạn</label>
                                                    <div class="rating" id="rating"></div>
                                                </div>

                                                <div class="comment-form-rating">
                                                    <label>Ảnh Đính Kèm</label>
                                                    <div class="image-list-aptach" id="image-list-aptach">
                                                        <input id="fileupload" style="display:none;" class="image" type="file" accept="image/*"  name="files[]" multiple>
                                                        <span id="upload-file-aptach"><i class="fa fa-plus"></i></span>
                                                        <div id="image-list-aptach-show"></div>
                                                    </div>
                                                    <span id="error-show" class="hidden" style="color:red">Tối đa 5 ảnh.</span>
                                                </div>
                                                <div class="input-element">
                                                    <div class="comment-form-comment">
                                                        <label>Nội Dung</label>
                                                        <textarea name="message" cols="40" rows="8" required></textarea>
                                                    </div>
                                                    <div class="comment-submit">
                                                        @if(Auth::guard('web')->user())
                                                            <button type="submit" class="form-button">Gửi</button>
                                                        @else 
                                                            <a class="form-button" href="/dang-nhap?callback=/{{Request::path()}}">
                                                            Gửi</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div> -->
                            <!-- </div> -->
                            <!--Review And Description Tab Content End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Product Description Review Section Start-->

        <!--Product section start-->
        <div
            class="product-section section">
            <div class="container">

                <div class="row">
                    <!-- Section Title Start -->
                    <div class="col">
                        <p class="col-lg-12 title-box-slide-detail p-0">
                            Sản Phẩm Tương Tự
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

                    @foreach($productRelate as $key => $product )
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
        <!--Product section end-->

        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
        </ng-controller>
@stop

@section('script')

<script src="{{ asset('fe/assets/js/jquery.emojiRatings.js') }}"></script>
<script>

    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    $('.show-image-full').on('click', function() {
        modal.style.display = "block";
        modalImg.src = this.src;
    });

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
    $( document ).ready(function() {
        $('#upload-file-aptach').on('click', function() {
            $('#fileupload').click();
        });
        $('#fileupload').on('change',function() {
            var x = document.getElementById("fileupload");
            var txt = "";
            if ('files' in x) {
                if (x.files.length < 5) {
                    $('#error-show').addClass('hidden');
                } else {
                    $('#error-show').removeClass('hidden');
                }
            }
            
        });

        // var filesInput = document.getElementById("fileupload");
        // filesInput.addEventListener("change", function(event) {
        //     var files = document.getElementById("fileupload").files; 
        //     var output = document.getElementById("image-list-aptach");
        //     $('#image-list-aptach-show').html('');
        //     for (var i = 0; i < files.length && i < 5; i++) {
        //         var file = files[i];
        //         if (!file.type.match('image'))
        //         continue;
        //         var picReader = new FileReader();
        //         picReader.addEventListener("load", function(event) {
        //             var picFile = event.target;
        //             $('#image-list-aptach-show').append("<img class='thumbnail' src='" + picFile.result + "'" +
        //                 "title='" + picFile.name + "'/>");
        //         });
        //         picReader.readAsDataURL(file);
        //     }
        // });
        

    });
    @if ( $error == 1 )
       Swal.fire({
            title: "{{ $message }}",
            type: "success",
        });
    @endif
    @if ( $error == 2 )
        Swal.fire({
            title: "{{ $message }}",
            type: "error",
        });
    @endif


    $("#rating").emojiRating({
        fontSize: 24,
        count: 5,
        onUpdate: function(count) {
            $(".review-text").show();
            $("#starCount").html(count + " Star");
        }
    });

    $("#rating-form").submit( function(e) {
        // e.preventDefault();
        if (!$(this).find('.emoji-rating').val()) {
            Swal.fire({
                title: "Vui Lòng Chọn Sao Cho Sản Phẩm",
                type: "success",
            });
            e.preventDefault();
            return;
        }
        $("#rating-form").submit();
    });
</script>
    

<script>
customInterpolationApp.controller('AppController', function($scope, $http, $q) {
    // Funds Variable
    $scope.showPassword = 0;
    $scope.province = '{{@old("province_id")}}';
    $scope.district = '{{@old("district_id")}}';
    $scope.ward = '{{@old("ward_id")}}';
    $scope.checkAddress = 0;

    $scope.district_list = [];
    $scope.ward_list = [];

    var canceler = $q.defer();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $scope.updatePassword = function() {
        $scope.showPassword = 1;
        $('.focus_pw').focus();
    }

    $scope.getDistricts = function() {
        let id_province = $scope.province;
        if (id_province != '') {
            $scope.ward_list = [];
            $scope.district_list = [];
            $scope.district = '';
            $scope.ward = '';
            $http.get("/admin/district/list-by-province/" + id_province).then(function(data, status) {
                $scope.district_list = data.data.data;
            });
        } else {
            $scope.ward_list = [];
            $scope.district_list = [];
            $scope.district = '';
            $scope.ward = '';
        }

    }
    if ($scope.province != '') {
        $scope.getDistricts();
    }

    $scope.submitForm = function() {
        // 
        var form = $('#check-out-form');

        if ($scope.checkAddress == 1) {
            let reportValidity = form[0].reportValidity();
            if (reportValidity) {
                form.submit();
            }
            return;
        }
        $('#check-out-form').submit();
    }

    $scope.getWards = function() {
        let id_ward = $scope.district;
        if (id_ward != '') {
            $scope.ward_list = [];
            $scope.ward = '';
            $http.get("/admin/ward/list-by-district/" + id_ward).then(function(data, status) {
                $scope.ward_list = data.data.data;
            });
        } else {
            $scope.ward_list = [];
            $scope.ward = '';
        }

    }
    if ($scope.district != '') {
        $scope.getWards();
    }


});
</script>


@stop