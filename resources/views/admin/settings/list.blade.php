@extends('layout.master')
@section('parentPageTitle', 'Cài Đặt')
@section('title', 'Cài Đặt')


@section('content')
<ng-controller ng-controller="AppController as demo">
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>Cài Đặt,</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Tất Cả</p>
                    <h5 class="mb-0">((totalLevels)) Cài Đặt</h5>
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
                            <input type="text" ng-model="nameCondition" ng-keydown="changeKey($event)" class="form-control" placeholder="Tên Cài Đặt">
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
                                    <th>Tên</th> 
                                    <th>Key</th>                                       
                                    <th>Giá Trị</th>                                       
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="content in data">
                                    <td>
                                        <span ng-if="content.edit == 1">((content.name))</span>
                                        <input ng-if="content.edit == 2" autofocus type="text" ng-model="content.name" class="form-control edit-in-table" placeholder="Tên Cài Đặt">
                                    </td>
                                    <td>
                                        <span ng-if="content.edit == 1">((content.key))</span>
                                        <input ng-if="content.edit == 2" autofocus type="text" ng-model="content.key" class="form-control edit-in-table" placeholder="Key Cài Đặt">
                                    </td>
                                    <td>
                                        <span ng-if="content.edit == 1">((content.value))</span>
                                        <input ng-if="content.edit == 2" autofocus type="text" ng-model="content.value" class="form-control edit-in-table" placeholder="Giá Trị">
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
                                        <li ng-repeat="item in pageCount " ng-click="changePage(item)" ng-class="{'active': pageLoad == item }" class="paginate_button page-item">
                                            <a class="page-link">((item))</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    
                        </div>

                        <div class="modal fade new-project-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm Giá Trị Cài Đặt Mới</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Tên Cài Đặt</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="name_settings" class="form-control" placeholder="Tên Cài Đặt">
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Key Cài Đặt</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="key_settings" class="form-control" placeholder="Key Cài Đặt">
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Giá Trị</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="value_settings" class="form-control" placeholder="Giá Trị">
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
            $http.get("{{route('admin.getListSettings')}}?page="+$scope.pageLoad+"&name="+$scope.nameCondition).then(function(data, status) {
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

        $scope.updateConfirm = function(i){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thay đổi giá trị cài đặt này không?",
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
                    key : i.key,
                    name : i.name,
                    value : i.value
                };

                $http.post('/admin/settings/edit/'+i.id, body).then(function(data, status) {
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
        
        $scope.changePage = function(id_page){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = id_page;
            $http.get("{{route('admin.getListSettings')}}?page="+$scope.pageLoad+"&name="+$scope.nameCondition).then(function(data, status) {
                data.data.data.map(item => {
                    item.edit = 1;
                });
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
            $('.new-project-modal').modal('hide');
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
                    $('.new-project-modal').modal();
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