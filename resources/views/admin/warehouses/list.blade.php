@extends('layout.master')
@section('parentPageTitle', 'Lịch Sử Nhập Hàng')
@section('title', 'Lịch Sử Nhập Hàng')


@section('content')
<ng-controller ng-controller="AppController as demo">
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>Lịch Sử Nhập Hàng,</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Tất Cả</p>
                    <h5 class="mb-0">((totalLevels)) Lịch Sử Nhập Hàng</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-12">
        <div class="card bg-clear">
           
            <div class="body">
                <div class="tab-content mt-0">
                    
                    <div class="form-group c_form_group bg-white">
                        <div class="input-group">
                            <input type="text" ng-model="nameCondition" ng-keydown="changeKey($event)" class="form-control" placeholder="Tên Sản Phẩm">
                            <input type="text" ng-model="dateForm"  class="form-control dateForm" placeholder="Ngày Bắt Đầu">
                            <input type="text" ng-model="dateTo" class="form-control dateTo" placeholder="Ngày Kết Thúc">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm theme-bg" type="button" ng-click="run_action()" >Tìm</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive custom-table-responsive">
                        <div class="loadding_api" ng-if="loadingInstitution == 1">
                            <div class="spinner-border text-success m-2 "  role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <table class="table table-hover table-custom spacing5 mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Người Nhập</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Option</th>
                                    <th>Số Lượng</th>
                                    <th>Ngày Nhập</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="content in data">
                                    <td>
                                        <span>((content.username))</span>
                                    </td>
                                    <td>
                                        <span>((content.name))</span>
                                    </td>
                                    <td>
                                        <span>Size : ((content.size)) ((content.color != null ? ' - Color : ' + content.color : '' ))</span>
                                    </td>
                                    <td>
                                        <span>((content.quantity))</span>
                                    </td>
                                    <td>
                                        <span>((content.date))</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-5"></div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li ng-repeat="item in pageCount " ng-click="changePage(item)" ng-class="{'active': pageLoad == item }" class="paginate_button page-item">
                                            <a class="page-link">((item))</a>
                                        </li>
                                    </ul>
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
   $('.dateTo').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       format: 'dd/mm/yyyy' 
   });
   $('.dateForm').datepicker({
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


<script>


customInterpolationApp.controller('AppController', function($scope, $http , $q) {
         // Funds Variable


         $scope.loadingInstitution = 0;
         $scope.totalLevels = 0;


         $scope.nameCondition = '';
         $scope.dateTo = '{{$dateTo}}';
         $scope.dateForm = '';

         $scope.name_settings = '';
         $scope.key_settings = '';
         $scope.value_settings = '';

         $scope.data = [];
         $scope.dataParent = [];

         $scope.pageLoad = 1;
         var canceler = $q.defer();
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

         // navigation
         $scope.pageCount = [];
        

         $scope.run_action = function(){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = 1;

            var body = { 
                _token: CSRF_TOKEN ,
                page : $scope.pageLoad,
                name : $scope.nameCondition,
                dateTo : $('.dateTo').val(),
                dateForm : $('.dateForm').val()
            };

            $http.post('/admin/warehouse/history-import-list', body).then(function(data, status) {
                data.data.data.map(item => {
                    item.edit = 1;
                });

                $scope.totalLevels = data.data.count;
                $scope.pageCount = [];
                for (let count = 1 ; count <= data.data.pageTotal; count++){
                    $scope.pageCount.push(count);
                }
                $scope.data = data.data.data;
                $scope.loadingInstitution = 0;
            });
            
            
        }
        $scope.run_action();

        
        
        $scope.changePage = function(id_page){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = id_page;
            var body = { 
                _token: CSRF_TOKEN ,
                page : $scope.pageLoad,
                name : $scope.nameCondition,
                dateTo : $('.dateTo').val(),
                dateForm : $('.dateForm').val()
            };

            $http.post('/admin/warehouse/history-import-list', body).then(function(data, status) {
                data.data.data.map(item => {
                    item.edit = 1;
                });

                $scope.totalLevels = data.data.count;
                $scope.pageCount = [];
                for (let count = 1 ; count <= data.data.pageTotal; count++){
                    $scope.pageCount.push(count);
                }
                $scope.data = data.data.data;
                $scope.loadingInstitution = 0;
            });
            
        }
        $scope.changeKey = function(e){
            if (event.key === "Enter") {
                $scope.run_action();
            }
            
        }

        $scope.changeEdit = function(e){
            e.edit = 2;
        }
        $scope.cancelupdateConfirm = function(e){
            e.edit = 1;
        }
        

        $scope.newData = function(e){
            $('.new-project-modal').modal();
        }
        $scope.addConfirm = function(){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thêm giá trị cài đặt này không?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có!",
                cancelButtonText: "Không!",
                allowOutsideClick: false,
                allowEscapeKey : false
            }).then(function(t) {
                if(t.dismiss == "cancel"){
                      return;
                }
            
                var body = { 
                    _token: CSRF_TOKEN ,
                    key : $scope.key_settings,
                    name : $scope.name_settings,
                    value : $scope.value_settings
                };
                $http.post("{{route('admin.addSettings')}}", body).then(function(data, status) {
                    $scope.run_action();
                    $('.new-project-modal').modal("hide");
                    $scope.name_settings = '';
                    $scope.key_settings = '';
                    $scope.value_settings = '';
                    Swal.fire({
                        title: "Thêm mới thành công!"
                    });
                }).catch(function (data) {
                        // Handle error here
                        Swal.fire({
                            title: "Có lỗi dữ liệu nhập vào!",
                            type: "warning",

                        });
                });
                
            });

            
            
        }
        
        $scope.delete = function(id_delete){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý xóa giá trị cài đặt này không?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có!",
                cancelButtonText: "Không!",
                allowOutsideClick: false,
                allowEscapeKey : false
            }).then(function(t) {
                if(t.dismiss == "cancel"){
                      return;
                }

                $.ajax({
                    url: "/admin/settings/delete/"+id_delete,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Đã xóa!"
                        });
                        $scope.changePage($scope.pageLoad);
                    }
                });

            })
            
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

@stop

@section('page-styles')
@stop

@section('vendor-script')
@stop

@section('page-script')
@stop