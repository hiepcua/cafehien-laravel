<ng-controller ng-controller="AppControllerFooter as footerControler">
<footer class="footer-section section bg-white">

            <!--Footer Top start-->
            <div
                class="footer-top section pt-50">
                <div class="container">
                    <div class="row row-25">

                        <!--Footer Widget start-->
                        <div class="footer-widget col-lg-4 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                            <h4 class="title"><span class="text">Thương hiệu Cafe Nhiên</span></h4>
                            <p>{{@Helper::getSocialLink(9)->value}}</p>
                            <!-- <div class="footer-social">
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="{{@Helper::getSocialLink(3)->value}}" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="{{@Helper::getSocialLink(4)->value}}" class="google"><i class="fa fa-google-plus"></i></a>
                                <a href="{{@Helper::getSocialLink(6)->value}}" class="pinterest"><i class="fa fa-youtube"></i></a>
                                <a href="{{@Helper::getSocialLink(7)->value}}" class="linkedin"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                            </div> -->
                        </div>
                        <!--Footer Widget end-->


                        <!--Footer Widget start-->
                        <div class="footer-widget col-lg-2 col-md-6 col-sm-6 col-6 mb-40 mb-xs-35">
                            <h4 class="title"><span class="text">Sản Phẩm</span></h4>
                            <ul class="ft-menu">
                                @foreach(Helper::getListCateProduct() as $category)
                                    <li class="">
                                        <a href="{{@$category['url']}}">{{ @$category['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--Footer Widget end-->


                        <!--Footer Widget start-->
                        <div class="footer-widget col-lg-2 col-md-6 col-sm-6 col-6 mb-40 mb-xs-35">
                            <h4 class="title"><span class="text">Bài Viết</span></h4>
                            <ul class="ft-menu">
                                @foreach(Helper::getListCatePost() as $category)
                                    <li class="">
                                        <a href="{{@$category['url']}}">{{ @$category['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--Footer Widget end-->

                        <!--Footer Widget start-->
                        <div class="footer-widget col-lg-4 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                            <h4 class="title"><span class="text">Liên Hệ</span></h4>
                            <ul class="address">
                                <li><span>{{@Helper::getSocialLink(5)->value}}</span></li>
                                <li><span><a href="#">{{@Helper::getSocialLink(1)->value}}</a></span></li>
                                <li><span><a href="#">{{@Helper::getSocialLink(2)->value}}</a></span></li>
                            </ul>
                            <!-- <div class="payment-box mt-15 mb-15">
                                <a href="#"><img src="assets/images/payment.png" alt=""></a>
                            </div> -->
                        </div>
                        <!--Footer Widget end-->
                    </div>
                </div>
            </div>
            <!--Footer Top end-->

            <!--Footer bottom start-->
            <div class="footer-bottom section">
                <div class="container ft-border pt-40 pb-40 pt-xs-20 pb-xs-20">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-8">
                            <div class="copyright text-left">
                                <p>{{@Helper::getSocialLink(10)->value}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-4">
                            <div class="header-top-social color-white">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="{{@Helper::getSocialLink(3)->value}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{@Helper::getSocialLink(4)->value}}"><i class="fa fa-google-plus"></i></a>
                                <a href="{{@Helper::getSocialLink(6)->value}}"><i class="fa fa-youtube"></i></a>
                                <a href="{{@Helper::getSocialLink(7)->value}}"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-vimeo"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer bottom end-->

        </footer>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="acc-to-cart-form">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nameproduct_cart"></h5><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row" style="padding: 0px 20px">
                    <div ng-if="error == 1" class="alert alert-success alert-dismissible col-md-12 col-12 mb-20" role="alert">
                        <strong>((message))</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div ng-if="error == 2"  class="alert alert-danger alert-dismissible col-md-12 col-12 mb-20" role="alert">
                        <strong>((message))</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="col-md-12 col-12 " style="font-size: 30px; margin: 10px 0px;" id="price_popup">
                        <span class="new">{{Helper::formatCurency(50000)}}</span>
                        <del class="old">{{Helper::formatCurency(40000)}}</del>
                    </div>

                    <div class="col-md-6 col-12 " style="    display: flex;">
                        <input type="text" ng-model="code_sale" class="input_form_custome"  placeholder="Mã Giảm Giá"
                            name="code_sale">
                            <button style="margin-left: 5px;"  type="button" class="btn" ng-click="checkCoupontData()">Áp Dụng</button>
                        <input type="hidden" ng-model="id_product" class="input_form_custome"  name="id_product" id="id_product_cart">
                    </div>
                    <div class="col-md-6 col-12 ">
                        <input type="number" ng-model="quantity" class="input_form_custome"  placeholder="Số Lượng"
                            name="quantity" required>
                    </div>

                    <div class="col-md-6 col-12 ">
                        <input type="text" ng-model="name" class="input_form_custome"  placeholder="Họ Tên"
                            name="name" required>
                    </div>

                    <div class="col-md-6 col-12 ">
                        <input type="text" ng-model="phone" class="input_form_custome" name="phone"
                            placeholder="Số Điện Thoại" required>
                    </div>



                    <div class="col-md-6 col-12 ">
                        <select class="custom-select input_form_custome"
                            name="province_id" ng-model="province" ng-change="getDistricts()"
                            required>
                            <option value="">Chọn Tỉnh Thành</option>
                            @foreach(Helper::getdistrict() as $item)
                            <option value="{{$item->id}}" @if($item->id == @old('province_id'))
                                selected @endif>{{$item->province}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 col-12 ">
                        <select class="custom-select input_form_custome"
                            ng-model="district" name="district_id" ng-change="getWards()" required>
                            <option value="">Chọn Quận</option>
                            <option ng-repeat="content in district_list" value="((content.id))">
                                ((content.district))</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-12 ">
                        <select class="custom-select input_form_custome"
                            ng-model="ward" name="ward_id" required>
                            <option value="">Chọn Phường</option>
                            <option ng-repeat="content in ward_list" value="((content.id))">
                                ((content.ward))</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-12 ">
                        <input type="text" ng-model="address" class="input_form_custome" placeholder="Địa Chỉ"
                            name="address" required>
                    </div>

                    <div class="col-md-12 col-12 mb-20">
                        <textarea ng-model="note" type="text" class="input_form_custome" placeholder="Ghi Chú"
                            name="note"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" ng-click="postData()">Mua Hàng</button>
                </div>
                </div>
            </div>
            </form>
        </div>
        </ng-controller>

        @section('scriptFooter')
        <script>
    $( document ).ready(function() {
        $('.product-add-btn').on('click', function() {
            $('#nameproduct_cart').html($(this).attr('alt'));
            $('#id_product_cart').val($(this).attr('rel'));
            $('#price_popup').html('<span class="new">'+$(this).attr("name")+'</span>');

        });
    });
        </script>
        <script>
customInterpolationApp.controller('AppControllerFooter', function($scope, $http, $q) {
    // Funds Variable
    $scope.showPassword = 0;
    $scope.province = '{{@old("province_id")}}';
    $scope.district = '{{@old("district_id")}}';
    $scope.ward = '{{@old("ward_id")}}';
    $scope.code_sale = '';
    $scope.id_product = '';
    $scope.quantity = '';
    $scope.name = '';
    $scope.phone = '';
    $scope.address = '';
    $scope.note = '';
    $scope.checkAddress = 0;

    $scope.error = 0;
    $scope.message = '';
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

    $scope.checkCoupontData = function() {

        var data = $.param({
            id:  $('#id_product_cart').val(),
            code_sale: $scope.code_sale ,

        });
        if ($scope.code_sale == '') {
            alert('Vui lòng nhập mã giảm giá. Cảm ơn');
            return;
        }
        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $http.post('/check-coupon-cart.html', data, config)
        .then(function(data, status) {
            if(data.data.message.code == 1){
                $('#price_popup').html('<span class="new">'+data.data.priceNew+'</span><del class="old ml-2">'+data.data.priceOld+'</del>');
                $scope.error = 0;
            } else {
                $scope.error = data.data.message.code ;
                $scope.message = data.data.message.message ;
            }
        });

    }
    $scope.postData = function() {
        var data = $.param({
            id:  $('#id_product_cart').val(),
            province_id: $scope.province ,
            district_id: $scope.district ,
            ward_id: $scope.ward ,
            code_sale: $scope.code_sale ,
            quantity: $scope.quantity ,
            name: $scope.name ,
            phone: $scope.phone ,
            address: $scope.address ,
            note: $scope.note
        });
        if ($scope.province == '' || $scope.district == '' || $scope.ward == '' || $scope.quantity == '' || $scope.name == '' || $scope.phone == '' || $scope.address == '') {
            alert('Vui lòng điền đầy đủ thông tin. Cảm ơn');
            return;
        }
        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $http.post('/add-cart.html', data, config)
        .then(function(data, status) {
            if(data.data.message.code == 1){
                $scope.error = data.data.message.code ;
                $scope.message = data.data.message.message ;
                $scope.province = '';
                $scope.district = '';
                $scope.ward = '';
                $scope.code_sale = '';
                $scope.id_product = '';
                $scope.quantity = '';
                $scope.name = '';
                $scope.phone = '';
                $scope.address = '';
                $scope.note = '';
                setTimeout(function(){ $('#exampleModal').modal('toggle'); }, 1000);


            } else {
                $scope.error = data.data.message.code ;
                $scope.message = data.data.message.message ;
            }
        });
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
