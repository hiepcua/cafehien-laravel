@extends('layout.master')
@section('parentPageTitle', 'Thành Viên')
@section('title', 'Thay Đổi Thông Tin')


@section('content')
<ng-controller ng-controller="AppController as demo">
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>Chỉnh Sửa Thông Tin,</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            
        </div>
    </div>
</div>


<!-- datepicker -->
<div class="row clearfix">
    <div class="col-md-12">
        <form action="" method="POST" >
            <div class="card">
                <div class="header">
                    <h2>Thông Tin Cá Nhân</h2>
                    <button type="submit" class="btn btn-primary theme-bg">Lưu Lại</button>
                </div>
                <div class="body">
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
                        @if(session('message-add'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{session('message-add')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        
                        @endif

                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group c_form_group ">
                                    <label>Họ Tên</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Họ Và Tên" aria-label="Họ Và Tên" name="name" value="{{@$user->name}}" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group c_form_group">
                                    <label>Số Điện Thoại</label>
                                    <div class="input-group">
                                        <input type="text" disabled class="form-control" placeholder="Số Điện Thoại" name="phone" aria-label="Số Điện Thoại" value="{{@$user->phone}}" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group c_form_group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <input type="text" disabled class="form-control" placeholder="Email" name="email" aria-label="Email" value="{{@$user->email}}" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group c_form_group">
                                    <label>code</label>
                                    <div class="input-group">
                                        <input type="text" disabled class="form-control" placeholder="code" name="code" aria-label="code" value="{{@$user->code}}" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group c_form_group">
                                    <label>Avatar</label>
                                    <div class="input-group">
                                        <ul id="images">
                                            <li>   
                                                <input class="input_image" type="hidden" id="chooseImage_input1" name="avatar" value="{{@$user->avatar != '' ? @$user->avatar : '' }}">
                                                <div id="chooseImage_div1" style="display: none;">
                                                    <img src="{{@$user->avatar != '' ? @$user->avatar : '' }}" id="chooseImage_img1" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                </div>
                                                <div id="chooseImage_noImage_div1" style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                    No image
                                                </div>
                                                <br/>
                                                <a href="javascript:chooseImage(1);">Choose image</a>
                                                | 
                                                <a href="javascript:clearImage(1);">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                
                                <p ng-if="showPassword == 0" ><a class="link_update" ng-click="updatePassword()">Thay đổi mật khẩu?</a></p>  
                                <div ng-if="showPassword == 1" class="form-group c_form_group">
                                    <label>Mật Khẩu</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control focus_pw" name="password" aria-label="Mật Khẩu" value="" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div ng-if="showPassword == 1" class="form-group c_form_group">
                                    <label>Nhập Lại Mật Khẩu</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="re_password" aria-label="Mật Khẩu" value="" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="form-group c_form_group">
                                    <label>Ngày Sinh</label>
                                    <div class="input-group">
                                        <input data-provide="datepicker" data-date-autoclose="true" name="birthday" class="form-control birthday" placeholder="Chọn Ngày" value="{{@$user->birthday}}">
                                    </div>
                                </div>
                                <div class="form-group c_form_group">
                                    <label>Địa Chỉ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Address" name="address" aria-label="Email" value="{{@$user->address}}" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group c_form_group">
                                    <label>Cấp Bậc</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="level_id">
                                            <option value="">Chọn Cấp Bậc</option>
                                            @foreach($levels as $item)
                                                <option value="{{$item->id}}" @if($item->id == @$user->level_id) selected @endif>{{$item->level}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group c_form_group">
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

                                <div class="form-group c_form_group">
                                    <label>Quận</label>
                                    <div class="input-group">
                                        <select class="custom-select" ng-model="district" name="district_id" ng-change="getWards()">
                                            <option value="">Chọn Quận</option>
                                            <option ng-repeat="content in district_list" value="((content.id))">((content.district))</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group c_form_group">
                                    <label>Phường</label>
                                    <div class="input-group">
                                        <select class="custom-select"  ng-model="ward"  name="ward_id">
                                            <option value="">Chọn Phường</option>
                                            <option ng-repeat="content in ward_list" value="((content.id))">((content.ward))</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group c_form_group">
                                    <label>Điểm Tích Lũy</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Điểm Tích Lũy" name="points" aria-label="Điểm Tích Lũy" value="{{@$user->points}}" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="form-group c_form_group">
                                    <label>Trạng Thái</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="is_active">
                                            <option value="1" @if(@$user->is_active == 1) selected="selected"  @endif>Mở</option>
                                            <option value="0" @if(@$user->is_active == 0) selected="selected"  @endif>Khóa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group c_form_group">
                                    <label>Thông Báo</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="notify">
                                            <option value="1" @if(@$user->notify == 1) selected="selected"  @endif>Mở</option>
                                            <option value="0" @if(@$user->notify == 0) selected="selected"  @endif>Khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary theme-bg">Lưu Lại</button>

                                
                            </div>
                        </div>
                        
                    
                </div>
            </div>
        </form>
    </div>
</div>
</ng-controller>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>
@stop

@section('vendor-script')
<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script>
@stop

@section('page-script')
<script type="text/javascript">
   $('.birthday').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       format: 'dd/mm/yyyy' 
   });
</script>
<!-- <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script> -->
@stop


@section('script')
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Sweet Alerts js -->
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>

<script type="text/javascript" src="{{ asset('lib_upload/ckeditor/ckeditor.js') }}"></script> 
<script type="text/javascript" src="{{ asset('lib_upload/ckfinder/ckfinder.js') }}"></script>  
<link href="{{ asset('lib_upload/jquery-ui/css/ui-lightness/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('lib_upload/jquery-ui/js/jquery-ui.js') }}"></script>
<script src="{{ asset('lib_upload/jquery.slug.js') }}"></script>


<script type="text/javascript">
    //<![CDATA[

    jQuery(document).ready(function (){
        CKFinder.setupCKEditor( null, '/lib_upload/ckfinder/' );
        // jQuery( "#images" ).sortable();
        // jQuery( "#images" ).disableSelection();
        //Display images
        jQuery(".input_image[value!='']").parent().find('div').each( function (index, element){
            jQuery(this).toggle();
        });
        
            
    });
    var imgId;
    function chooseImage(id)
    {
        imgId = id;
        // You can use the "CKFinder" class to render CKFinder in a page:
        var finder = new CKFinder();
        finder.basePath = '/lib_upload/ckfinder/'; // The path for the installation of CKFinder (default = "/ckfinder/").
        finder.selectActionFunction = setFileField;
        finder.popup();
    } 
    // This is a sample function which is called when a file is selected in CKFinder.
    function setFileField( fileUrl )
    {
        document.getElementById( 'chooseImage_img' + imgId ).src = fileUrl;
        document.getElementById( 'chooseImage_input' + imgId).value = fileUrl;
        document.getElementById( 'chooseImage_div' + imgId).style.display = '';
        document.getElementById( 'chooseImage_noImage_div' + imgId ).style.display = 'none';
    }
    function clearImage(imgId)
    {
        document.getElementById( 'chooseImage_img' + imgId ).src = '';
        document.getElementById( 'chooseImage_input' + imgId ).value = '';
        document.getElementById( 'chooseImage_div' + imgId).style.display = 'none';
        document.getElementById( 'chooseImage_noImage_div' + imgId).style.display = '';
    }

    function addMoreImg()
    {
        jQuery("ul#images > li.hidden").filter(":first").removeClass('hidden');
    }

//]]>
</script>
<style type="text/css">
    #images { list-style-type: none; margin: 0; padding: 0;}
    #images li { margin: 10px; float: left; text-align: center;  height: 190px;}
</style>



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


$(document).ready(function () {
            // Swal.fire({
            //     title: "Are you sure?",
            //     text: "Are you sure you delete this data stream?",
            //     type: "warning",
            //     showCancelButton: !0,
            //     confirmButtonColor: "#3085d6",
            //     cancelButtonColor: "#d33",
            //     confirmButtonText: "Yes, delete it!",
            //     cancelButtonText: "Don't delete !",
            //     allowOutsideClick: false,
            //     allowEscapeKey : false
            // }).then(function(t) {
            //     if(t.dismiss == "cancel"){
            //           return;
            //     }

            //     $.ajax({
            //         url: "/custodian/delete/"+id_delete,
            //         type: 'GET',
            //         dataType: 'json',
            //         success: function(res) {
            //             Swal.fire({
            //                 title: "Delete Successful!"
            //             });
            //             window.location.href = "/";
            //         }
            //     });

            // })
     });
</script>
@endsection