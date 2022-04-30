@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Địa Chỉ')


@section('content')
<ng-controller ng-controller="AppController as demo">
    <!-- Page Banner Section Start -->
    <div class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                
                <div class="col-12">
                    <div class="row">
                        @include('fe.layouts.sidebarUser')  

                        <div class="col-lg-9 col-12">
                            <div class="tab-pane">
                                <div class="myaccount-content">
                                    <h3>Danh Sách Địa Chỉ</h3>
                                    <div class="account-details-form">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Cơ Bản</th>
                                                    <th>Địa Chỉ</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr  ng-repeat="content in data">
                                                    <td>
                                                        <div class="w-100" ng-if="content.edit == 1">
                                                            <b>((content.name))</b></br class="br">
                                                            <b>((content.phone))</b></br class="br">
                                                        </div>
                                                        <div class="w-100" ng-if="content.edit == 2">
                                                            <div class="col-md-12 col-12 mb-20">
                                                                <input type="text" placeholder="Họ tên"  ng-model="content.name">
                                                            </div>
                                                            <div class="col-md-12 col-12 mb-20">
                                                                <input type="text" placeholder="Số điện thoại"  ng-model="content.phone">
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td>
                                                        <div class="w-100" ng-if="content.edit == 1">
                                                            <b>((content.address))</b></br class="br">
                                                            <b>((content.ward.ward))</b></br class="br">
                                                            <b>((content.district.district))</b></br class="br">
                                                            <b>((content.province.province))</b>
                                                        </div>
                                                        <div class="w-100" ng-if="content.edit == 2">
                                                            <div class="col-md-12 col-12 mb-20">
                                                                <textarea placeholder="Địa Chỉ" class="w-100"  ng-model="content.address"></textarea>
                                                            </div>
                                                            <div class="col-md-12 col-12 mb-20">
                                                                <label>Tỉnh/Thành Phố</label>
                                                                <select class="custom-select" ng-model="content.province_id" ng-change="updateDistricts(content)" >
                                                                    <option value="">Chọn Tỉnh/Thành</option>
                                                                    <option ng-repeat="f in province_list" value="((f.id))">
                                                                        ((f.province))</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-12 mb-20">
                                                                <label>Quận</label>
                                                                <select class="custom-select" ng-model="content.district_id" ng-change="updateWards(content)" >
                                                                    <option value="">Chọn Quận</option>
                                                                    <option ng-repeat="f in district_list" value="((f.id))">
                                                                        ((f.district))</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-12 mb-20">
                                                                <label>Quận</label>
                                                                <select class="custom-select" ng-model="content.ward_id" >
                                                                    <option value="">Chọn Phường</option>
                                                                    <option ng-repeat="f in ward_list" value="((f.id))">
                                                                        ((f.ward))</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td>
                                                        <button ng-if="content.edit == 2" class="btn btn-danger btn-sm a-button-table " ng-click="updateConfirm(content)" >
                                                            <i class="fa fa-save"></i>
                                                        </button>
                                                        <button ng-if="content.edit == 2" class="btn btn-danger btn-sm a-button-table " ng-click="update(content)" >
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                        <button ng-if="content.edit == 1" class="btn btn-danger btn-sm a-button-table " ng-click="update(content)" >
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button ng-if="content.is_default == 0 && content.edit == 1" class="btn btn-danger btn-sm a-button-table " ng-click="setDefault(content.id)" >
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>


</ng-controller>
@stop

@section('script')
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Sweet Alerts js -->
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>
<script src="{{ asset('fe/assets/js/jquery.emojiRatings.js') }}"></script>
<script>
customInterpolationApp.controller('AppController', function($scope, $http, $q) {
    // Funds Variable
    $scope.showPassword = 0;

    $scope.province = '';
    $scope.district = '';
    $scope.ward = '';

    $scope.province_list = [];
    $scope.district_list = [];
    $scope.ward_list = [];
    $scope.data = [];

    @foreach($listProvinces as $item)
        $scope.province_list.push({id : {{$item->id}}, province : '{{$item->province}}' });
    @endforeach

    var canceler = $q.defer();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $scope.getDataList = function() {
       
        $http.get("/thanh-vien/list-address").then(function(data, status) {
            if ( data.data.errors == 1 ) {
                Swal.fire({
                    title: "Vui lòng đăng nhập để lấy dữ liệu",
                    type: "error",
                });
                return ;
            }
            data.data.data.map(item => {
                item.edit = 1;
                item.province_id = item.province_id + '';
                item.district_id = item.district_id + '';
                item.ward_id = item.ward_id + '';
            });
            $scope.data = data.data.data;
            
        });

    }
    $scope.getDataList();
    

    $scope.getDistricts = function(idGet) {
        $scope.ward_list = [];
        $scope.district_list = [];
        $http.get("/admin/district/list-by-province/" + idGet).then(function(data, status) {
            $scope.district_list = data.data.data;
        });

    }
    $scope.updateDistricts = function(e) {
        $scope.ward_list = [];
        $scope.district_list = [];
        e.district_id = '';
        e.ward_id = '';
        if (e.province_id != '') {
            $http.get("/admin/district/list-by-province/" + e.province_id).then(function(data, status) {
                $scope.district_list = data.data.data;
            });
        }

    }
    $scope.updateWards = function(e) {
        $scope.ward_list = [];
        e.ward_id = '';
        if (e.district_id != '') {
            $http.get("/admin/ward/list-by-district/" + e.district_id).then(function(data, status) {
                $scope.ward_list = data.data.data;
            });
        }
        
    }
    $scope.getWards = function(idGet) {
        $scope.ward_list = [];
        $http.get("/admin/ward/list-by-district/" + idGet).then(function(data, status) {
            $scope.ward_list = data.data.data;
        });
    }
    $scope.update = function(e) {
        $scope.data.map(item => {
            if (item.id != e.id) {
                item.edit = 1;
            }
        });
        e.edit = e.edit == 1 ? 2 : 1;
        if (e.edit == 2) {
            $scope.getDistricts(e.province_id);
            $scope.getWards(e.district_id);
        } else {
            $scope.getDataList();
        }
    }
    $scope.updateConfirm = function(e) {
        var body = { 
            _token: CSRF_TOKEN ,
            id : e.id,
            province_id : e.province_id,
            district_id : e.district_id,
            ward_id : e.ward_id,
            name : e.name,
            phone : e.phone,
            address : e.address
        };

        $http.post('/thanh-vien/address/update/'+e.id, body).then(function(data, status) {
            $scope.getDataList();
            e.edit = e.edit == 1 ? 2 : 1;
            if ( data.data.errors == 1 ) {
                Swal.fire({
                    title: "Vui lòng đăng nhập để lấy dữ liệu",
                    type: "error",
                });
                return ;
            }
            Swal.fire({
                title: "Thay đổi thành công!"
            });
        }).catch(function (data) {
                // Handle error here
                Swal.fire({
                    title: "Có lỗi dữ liệu nhập vào!",
                    type: "warning",

                });
        });
    }
    
    $scope.setDefault = function(idUpdate) {
        $http.get("/thanh-vien/address/default/"+idUpdate).then(function(data, status) {
            if ( data.data.errors == 1 ) {
                Swal.fire({
                    title: "Bạn không có quyền thay đổi dữ liệu này",
                    type: "error",
                });
                return ;
            }
            $scope.getDataList();
            Swal.fire({
                title: "Đã thay đổi địa chỉ mặc định",
                type: "success",
            });
            
        });
    }
    


});
</script>
@stop