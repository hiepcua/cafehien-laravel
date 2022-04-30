@extends('customer.main')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Thông tin cá nhân')


@section('content')
    <!-- Page Banner Section Start -->
<ng-controller ng-controller="AppController as demo">
<div class="page-content">
    <form action="" method="post" enctype="multipart/form-data">
    @csrf  
        <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <h3>
                <span class="hidden-320 ng-binding">Thông Tin Cá Nhân</span>
            </h3>
            <div class="toolbar">
                <button class="btn btn-success btn-primary" type="submit">
                    <i class="icon-save white"></i>
                    <span class="hidden-480">Chỉnh Sửa</span>
                </button>
            </div>
        </div>
        <div class="page-content">
            <div class="row ">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row clearfix">
                        @if ( $message['status'] == 1 )
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{  $message['message'] }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        @if ( $message['status'] === 2 )
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{  $message['message'] }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif



                        <div class="tabbable">
                            

                           
                            <div class="col-lg-12 col-md-12 relative p-0">
                                <div class="widget-box widget-color-blue">
                                    <div class="widget-header">
                                        <h5 class="widget-title ng-binding"><i class="icon-barcode"></i> Thông Tin Cơ Bản</h5>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main row">
                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative ">
                                                <label>Họ Tên</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Họ Và Tên" aria-label="Họ Và Tên" name="name" value="{{@$user->name}}" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative">
                                                <label>Địa Chỉ</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address" aria-label="Email" value="{{@$user->address}}" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative">
                                                <label>Số Điện Thoại</label>
                                                <div class="input-group">
                                                    <input type="text" disabled class="form-control" placeholder="Số Điện Thoại" name="phone" aria-label="Số Điện Thoại" value="{{@$user->phone}}" aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative">
                                                <label>Tỉnh</label>
                                                <div class="input-group">
                                                    <select class="custom-select" name="province_id" ng-model="province" ng-change="getDistricts()">
                                                        <option value="">Chọn Tỉnh Thành</option>
                                                        @foreach($listProvinces as $item)
                                                            <option value="{{$item->id}}" @if($item->id == @$user->province_id) selected @endif>{{$item->province}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <input type="text" disabled class="form-control" placeholder="Email" name="email" aria-label="Email" value="{{@$user->email}}" aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative">
                                                <label>Quận</label>
                                                <div class="input-group">
                                                    <select class="custom-select" ng-model="district" name="district_id" ng-change="getWards()">
                                                        <option value="">Chọn Quận</option>
                                                        <option ng-repeat="content in district_list" value="((content.id))">((content.district))</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative">
                                                <label>Ngày Sinh</label>
                                                <div class="input-group">
                                                    <input name="birthday" class="form-control birthday" placeholder="Chọn ngày" value="{{@$user->birthday}}">
                                                </div>
                                            </div>

                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative">
                                                <label>Phường</label>
                                                <div class="input-group">
                                                    <select class="custom-select"  ng-model="ward"  name="ward_id">
                                                        <option value="">Chọn Phường</option>
                                                        <option ng-repeat="content in ward_list" value="((content.id))">((content.ward))</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>



                    </div>


                </div><!-- /.col -->

            </div>
        </div><!-- /.row -->
    </form>
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
   $( document ).ready(function() {
        $('#imageShow').on('click',function() {
            $('#fileupload').click();
        });
        $('#fileupload').on('change',function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#imageShow').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });
    });

</script>
<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>

<!-- Sweet Alerts js -->
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>



<script>
    
customInterpolationApp.controller('AppController', function($scope, $http , $q) {
         // Funds Variable
         $scope.showPassword = 0;
         $scope.province = '{{@$user->province_id}}';
         $scope.district = '{{@$user->district_id}}';
         $scope.ward = '{{@$user->ward_id}}';

         $scope.district_list = [];
         $scope.ward_list = [];

         var canceler = $q.defer();
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         
        $scope.updatePassword = function(){
            $scope.showPassword = 1;
            $('.focus_pw').focus();
        }

        $scope.getDistricts = function(){
            let id_province = $scope.province;
            if(id_province != ''){
                $scope.ward_list = [];
                $scope.district_list = [];
                $scope.district = '';
                $scope.ward = '';
                $http.get("/admin/district/list-by-province/"+id_province).then(function(data, status) {
                    $scope.district_list = data.data.data;
                });
            } else {
                $scope.ward_list = [];
                $scope.district_list = [];
                $scope.district = '';
                $scope.ward = '';
            }
            
        }
        if ( $scope.province != '' ) {
            $scope.getDistricts();
            $scope.district = '{{@$user->district_id}}';
        }
        


        $scope.getWards = function(){
            let id_ward = $scope.district;
            if(id_ward != ''){
                $scope.ward_list = [];
                $scope.ward = '';
                $http.get("/admin/ward/list-by-district/"+id_ward).then(function(data, status) {
                    $scope.ward_list = data.data.data;
                });
            } else {
                $scope.ward_list = [];
                $scope.ward = '';
            }
            
        }
        if ( $scope.district != '' ) {
            $scope.getWards();
            $scope.ward = '{{@$user->ward_id}}';
        }


        



    

});

</script>
@stop