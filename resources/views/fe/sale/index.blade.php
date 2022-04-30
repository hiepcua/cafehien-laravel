@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Chi Tiết Bài Viết')


@section('content')
    
<ng-controller ng-controller="AppController as demo">

        <!-- Blog Section Start -->
        <div class="blog-section-detail section">
            <div class="container">
                <div class="row">
                        <div class="col-lg-12 col-12 mb-10">
                            <div class="contact-form-wrap">
                                <h3 class="contact-title">Mã Khuyến Mãi</h3>
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
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Họ Tên*</label>
                                            <input type="text"  placeholder="Họ Tên"
                                                name="name" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Số Điện Thoại*</label>
                                            <input type="text" name="phone" 
                                                placeholder="Số Điện Thoại" required>
                                        </div>
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Mã Khuyến Mãi*</label>
                                            <input type="text" placeholder="Mã Khuyến Mãi" 
                                                name="gift_code" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Địa Chỉ*</label>
                                            <input type="text" placeholder="Địa Chỉ" 
                                                name="address" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Tỉnh</label>
                                            <select class="custom-select" 
                                                name="province_id" ng-model="province" ng-change="getDistricts()"
                                                required>
                                                <option value="">Chọn Tỉnh Thành</option>
                                                @foreach($listProvinces as $item)
                                                <option value="{{$item->id}}" @if($item->id == @old('province_id'))
                                                    selected @endif>{{$item->province}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Quận</label>
                                            <select class="custom-select" 
                                                ng-model="district" name="district_id" ng-change="getWards()" required>
                                                <option value="">Chọn Quận</option>
                                                <option ng-repeat="content in district_list" value="((content.id))">
                                                    ((content.district))</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Phường</label>
                                            <select class="custom-select" 
                                                ng-model="ward" name="ward_id" required>
                                                <option value="">Chọn Phường</option>
                                                <option ng-repeat="content in ward_list" value="((content.id))">
                                                    ((content.ward))</option>
                                            </select>
                                        </div>


                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Note</label>
                                            <textarea  type="text" placeholder="Nội Dung"
                                                name="note"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-form-style">
                                                <button class="btn" type="submit"><span>Gửi</span></button>                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                   


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
            </ng-controller>
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