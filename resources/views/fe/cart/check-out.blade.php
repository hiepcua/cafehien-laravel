@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Thanh Toán')


@section('content')
<ng-controller ng-controller="AppController as demo">
    <!-- Page Banner Section Start -->
    <div class="page-banner-section section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-banner text-center">
                        <h1>Thanh Toán</h1>
                        <ul class="page-breadcrumb">
                            <li><a href="/">Trang Chủ</a></li>
                            <li>Thanh Toán</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!--Checkout section start-->
    <div
        class="checkout-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Checkout Form Start-->
                    <form action="" method="post" name="checkoutForm" class="checkout-form" id="check-out-form">
                        @csrf
                        <div class="row row-40">
                            
                            @if ( @$message['status'] == 1 )
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>{{  $message['message'] }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            @if ( @$message['status'] === 2 )
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{  $message['message'] }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            <div class="col-lg-7">
                                <div class="w-100 row mb-20 m_i_0">
                                    @foreach($address as $item)
                                    <div class="col-md-6 col-12 p-0">
                                        <div class="checkout-payment-method checkout-payment-method-custom">

                                            <div class="single-method">
                                                <input @if($item->is_default == 1) checked @endif type="radio" id="address_old_{{$item->id}}" name="address_old" value="{{$item->id}}">
                                                <label for="address_old_{{$item->id}}"></label>
                                                <span><b>Họ Tên : </b>{{$item->name}}</span><br class="br" />
                                                <span><b>Số Điện Thoại : </b>{{$item->phone}}</span><br class="br" />
                                                <span><b>Địa Chỉ : </b>{{$item->address}}</span><br class="br" />
                                                <!-- <span>{{$item->ward->ward}} - {{$item->district->district}} - {{$item->province->province}}</span> -->
                                            </div>


                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="col-12 mb-30 p-0">
                                    <div class="check-box">
                                        <input type="checkbox" {{count($address) > 0 ? '' : 'disabled'}} id="create_address"
                                            name="create_address" ng-model="checkAddress" value="1" ng-true-value="1"
                                            ng-false-value="0">
                                        <label for="create_address">Thêm địa chỉ giao hàng</label>
                                    </div>
                                </div>

                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-10">
                                    <h4 class="checkout-title">Địa Chỉ Giao Hàng Mới</h4>

                                    <div class="row">

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Họ Tên*</label>
                                            <input type="text" ng-disabled="checkAddress != 1" placeholder="Họ Tên"
                                                name="name" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Số Điện Thoại*</label>
                                            <input type="text" name="phone" ng-disabled="checkAddress != 1"
                                                placeholder="Số Điện Thoại" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Địa Chỉ*</label>
                                            <input type="text" placeholder="Địa Chỉ" ng-disabled="checkAddress != 1"
                                                name="address" required>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Tỉnh</label>
                                            <select class="custom-select" ng-disabled="checkAddress != 1"
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
                                            <select class="custom-select" ng-disabled="checkAddress != 1"
                                                ng-model="district" name="district_id" ng-change="getWards()" required>
                                                <option value="">Chọn Quận</option>
                                                <option ng-repeat="content in district_list" value="((content.id))">
                                                    ((content.district))</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Phường</label>
                                            <select class="custom-select" ng-disabled="checkAddress != 1"
                                                ng-model="ward" name="ward_id" required>
                                                <option value="">Chọn Phường</option>
                                                <option ng-repeat="content in ward_list" value="((content.id))">
                                                    ((content.ward))</option>
                                            </select>
                                        </div>


                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Note</label>
                                            <textarea ng-disabled="checkAddress != 1" type="text" placeholder="Nội Dung"
                                                name="note"></textarea>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="col-lg-5">
                                <div class="row">

                                    <!-- Cart Total -->
                                    <div class="col-12 mb-60">
<!-- 
                                        <h4 class="checkout-title">Thanh Toán</h4> -->

                                        <div class="checkout-cart-total">

                                            <h4>Sản Phẩm <span>Tổng Cộng</span></h4>

                                            <ul>
                                                @foreach($cartProdctReturn as $key => $item )
                                                <li>
                                                    <p>{{$item['data']->product->name}} X {{$item['quality']}}</p>
                                                    <span>{{Helper::formatCurency($item['data']->price - $item['data']->sale_price )}}</span>
                                                </li>
                                                @endforeach
                                            </ul>

                                            <p>Tổng Hàng <span>{{Helper::formatCurency($total)}}</span></p>
                                            <p>Mã Giảm Giá <span>- {{Helper::formatCurency($couponPrice)}}</span></p>
                                            <p>Thành Viên Giảm Giá <span>- {{Helper::formatCurency($userPrice)}}</span>
                                            </p>

                                            <h4>Tổng Đơn Hàng
                                                <span>{{Helper::formatCurency($total-$couponPrice-$userPrice)}}</span>
                                            </h4>

                                        </div>

                                    </div>
                                    <div class="col-12 mb-30">

                                        <h4 class="checkout-title">Phương Thức Giao Hàng</h4>

                                        <div class="checkout-payment-method">
                                            @foreach($deliveries as $key => $item )
                                            <div class="single-method">
                                                <input type="radio" checked id="delivery_id{{$item->id}}"
                                                    name="delivery_id" value="{{$item->id}}">
                                                <label for="delivery_id{{$item->id}}">{{$item->delivery}} +
                                                    {{Helper::formatCurency($item->price)}}</label>
                                            </div>
                                            @endforeach


                                        </div>
                                    </div>
                                    <!-- Payment Method -->
                                    <div class="col-12 mb-30">

                                        <h4 class="checkout-title">Phương Thức Thanh Toán</h4>

                                        <div class="checkout-payment-method">

                                            <div class="single-method">
                                                <input type="radio" id="payment_check" name="payment_method" checked
                                                    disable value="1">
                                                <label for="payment_check">Giao Hàng Nhận Tiền Mặt</label>
                                            </div>


                                        </div>

                                        <button class="place-order btn btn-lg btn-round" type="button"
                                            ng-click="submitForm()">Thanh
                                            Toán</button>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--Checkout section end-->

</ng-controller>
@stop

@section('script')


<script>
customInterpolationApp.controller('AppController', function($scope, $http, $q) {
    // Funds Variable
    $scope.showPassword = 0;
    $scope.province = '{{@old("province_id")}}';
    $scope.district = '{{@old("district_id")}}';
    $scope.ward = '{{@old("ward_id")}}';
    $scope.checkAddress = {{ count($address) > 0 ? 0 : 1 }};

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