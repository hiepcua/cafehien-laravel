@extends('layout.master')
@section('parentPageTitle', 'Mã Giảm Giá')
@section('title', 'Mã Giảm Giá')


@section('content')
<ng-controller ng-controller="AppController as demo">
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>Mã Giảm Giá,</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Tất Cả</p>
                    <h5 class="mb-0">((totalLevels)) Mã Giảm Giá</h5>
                </div>
                
                <div class="mb-3 mb-xl-0">
                    <a  class="btn btn-dark" ng-click="newData()">Thêm Mới</a>
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
                            <input type="text" ng-model="nameCondition" ng-keydown="changeKey($event)" class="form-control" placeholder="Mã Giảm Giá">
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
                                    <th>ID</th> 
                                    <th>Mã Giảm Giá</th>
                                    <th>Kiểu Giảm Giá</th>
                                    <th>Giảm Giá</th>
                                    <th>Ngày Bắt Đầu</th>
                                    <th>Ngày Kết Thúc</th>
                                    <th>Chức Năng</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="content in data">
                                    <td>
                                        <span>((content.id))</span>
                                    </td>
                                    <td>
                                        <span ng-if="content.edit == 1">((content.promotion_code))</span>
                                        <input ng-class="content.edit == 2 ? '' : 'hidden'" autofocus type="text" ng-model="content.promotion_code" class="form-control edit-in-table" placeholder="Mã Giảm Giá">
                                    </td>
                                    <td>
                                        <span ng-if="content.edit == 1">(( content.type == 1 ? 'Phần Trăm' : 'Tiền Cố Định'))</span>
                                        <select ng-if="content.edit == 2" class="custom-select edit-in-table" ng-model="content.type"  >
                                            <option value='1' >Phần Trăm</option>
                                            <option value='2' >Tiền Cố Định</option>
                                        </select>
                                    </td>
                                    <td>
                                        <span ng-if="content.edit == 1">((content.discount))</span>
                                        <input ng-class="content.edit == 2 ? '' : 'hidden'" autofocus type="text" ng-model="content.discount" class="form-control edit-in-table" >
                                    </td>
                                    
                                    <td>
                                        <span ng-if="content.edit == 1">((content.start_date))</span>
                                        <input ng-class="content.edit == 2 ? '' : 'hidden'" autofocus type="text" ng-model="content.start_date" class="form-control edit-in-table date-picker-custom new-date-start_((content.id))" placeholder="Ngày bắt đầu">
                                    </td>
                                    <td>
                                        <span ng-if="content.edit == 1">((content.end_date))</span>
                                        <input ng-class="content.edit == 2 ? '' : 'hidden'" autofocus type="text" ng-model="content.end_date" class="form-control edit-in-table date-picker-custom new-date-end_((content.id))" placeholder="Ngày kết thúc">
                                    </td>
                                    
                                    <td>
                                        <button ng-if="content.edit == 2" class="btn btn-info btn-sm a-button-table " ng-click="updateConfirm(content)" >
                                            <i class="fa fa-save"></i>
                                        </button>
                                        <button ng-if="content.edit == 2" class="btn btn-danger btn-sm a-button-table " ng-click="cancelupdateConfirm(content)" >
                                            <i class="fa fa-ban"></i>
                                        </button>
                                        <a ng-click="changeEdit(content)" class="btn btn-primary theme-bg btn-sm a-button-table ">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm a-button-table " ng-click="delete(content.id)" >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm-12 col-md-5"></div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li ng-click="changePage(pageLoad - 1 )" ng-if="pageLoad > 1" class="paginate_button page-item">
                                            <a class="page-link">Pre</a>
                                        </li>
                                        <li ng-repeat="item in pageCount " ng-if="pageLoad > 6 && item < 4"  ng-click="changePage(item)" ng-class="{'active': pageLoad == item }" class="paginate_button page-item">
                                            <a class="page-link">((item))</a>
                                        </li>
                                        <li ng-if="pageLoad > 6"  class="paginate_button page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li ng-repeat="item in pageCount " ng-if="item  < (pageLoad + 3) && item > (pageLoad - 3)"  ng-click="changePage(item)" ng-class="{'active': pageLoad == item }" class="paginate_button page-item">
                                            <a class="page-link">((item))</a>
                                        </li>
                                        <li ng-if="pageLoad < pageCount.length - 6"  class="paginate_button page-item">
                                            <a class="page-link">...</a>
                                        </li>
                                        <li ng-repeat="item in pageCount " ng-if="pageLoad < pageCount.length - 6 && item > pageCount.length - 4"  ng-click="changePage(item)" ng-class="{'active': pageLoad == item }" class="paginate_button page-item">
                                            <a class="page-link">((item))</a>
                                        </li>

                                        <li  ng-click="changePage(pageLoad + 1)" ng-if="pageLoad < pageCount.length" class="paginate_button page-item">
                                            <a class="page-link">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    
                        </div>

                        <div class="modal fade new-project-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm Mã Giảm Giá Mới</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Code</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="code_settings" class="form-control" placeholder="Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Loại Giảm Giá</label>
                                            <div class="input-group">
                                                <select class="form-control" ng-model="type_settings"  >
                                                    <option value="1">Phần Trăm</option>
                                                    <option value="2">Tiền Cố Định</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Giảm Giá</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="discount_settings" class="form-control" placeholder="%">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Ngày Bắt Đầu</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="start_settings" class="form-control date-picker-custom new-date-start" placeholder="Ngày Bắt Đầu">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Ngày Kết Thúc</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="end_settings" class="form-control date-picker-custom new-date-end" placeholder="Ngày Kết Thúc">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-success" ng-click="addConfirm()">Lưu</button>
                                    </div>
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
   $('.date-picker-custom').datepicker({
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

         $scope.code_settings = '';
         $scope.discount_settings = '';
         $scope.start_settings = '';
         $scope.type_settings = '';
         $scope.price_settings = '';
         $scope.end_settings = '';

         $scope.data = [];
         $scope.dataParent = [];

         $scope.pageLoad = 1;
         var canceler = $q.defer();
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

         // navigation
         $scope.pageCount = [];

         $scope.convertToInt = function(id){
            return parseInt(id, 10);
        };

         $scope.run_action = function(){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = 1;
            $http.get("{{route('admin.getListPromotions')}}?page="+$scope.pageLoad+"&name="+$scope.nameCondition).then(function(data, status) {
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
            $http.get("{{route('admin.getListPromotions')}}?page="+$scope.pageLoad+"&name="+$scope.nameCondition).then(function(data, status) {
                data.data.data.map(item => {
                    item.edit = 1;
                });
                $scope.data = data.data.data;
                $scope.loadingInstitution = 0;
            });
            
        }

        $scope.updateConfirm = function(i){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thay đổi giá trị này không?",
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
                    id : i.id,
                    name : i.promotion_code,
                    discount : i.discount,
                    type : i.type,
                    start_date : $('.new-date-start_'+i.id).val(),
                    end_date : $('.new-date-end_'+i.id).val(),
                };

                $http.post('/admin/promotions/edit/'+i.id, body).then(function(data, status) {
                    i.edit = 1;
                    $scope.changePage($scope.pageLoad);
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
                
            });
        }
        
        
        $scope.changeKey = function(e){
            if (event.key === "Enter") {
                $scope.run_action();
            }
            
        }

        $scope.changeEdit = function(e){
            e.edit = 2;
            $('.date-picker-custom').datepicker({
                todayBtn: "linked",
                language: "it",
                autoclose: true,
                todayHighlight: true,
                format: 'dd/mm/yyyy' 
            });
        }
        $scope.cancelupdateConfirm = function(e){
            e.edit = 1;
        }
        

        $scope.newData = function(e){
            $('.new-project-modal').modal();
        }
        $scope.addConfirm = function(){
            $('.new-project-modal').modal('hide');
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thêm giá trị này không?",
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
                    $('.new-project-modal').modal();
                      return;
                }

                var body = { 
                    _token: CSRF_TOKEN ,
                    name : $scope.code_settings,
                    type : $scope.type_settings,
                    discount : $scope.discount_settings,
                    start_date : $('.new-date-start').val(),
                    end_date : $('.new-date-end').val(),
                };
                $http.post("{{route('admin.addPromotions')}}", body).then(function(data, status) {
                    $scope.run_action();
                    $('.new-project-modal').modal("hide");
                    $scope.name_settings = '';
                    $scope.key_settings = '';
                    $scope.value_settings = '';
                    $scope.type_settings = '';
                    $scope.price_settings = '';
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
                text: "Bạn có đồng ý xóa giá trị này không?",
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
                    url: "/admin/promotions/delete/"+id_delete,
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