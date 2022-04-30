@extends('layout.master')
@section('parentPageTitle', 'Thành Viên')
@section('title', 'Danh Sách Thành Viên')


@section('content')
<ng-controller ng-controller="AppController as demo">
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>Danh sách Thành Viên,</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Tất Cả</p>
                    <h5 class="mb-0">((totalUsers)) Thành Viên</h5>
                </div>
                
                <div class="mb-3 mb-xl-0">
                    <a  class="btn btn-dark" href="{{route('admin.addUser')}}">Thêm Mới</a>
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
                            <input type="text" ng-model="nameCondition" ng-keydown="changeKey($event)" class="form-control" placeholder="Tên Thành Viên">
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
                                    <th>#</th>
                                    <th></th>
                                    <th>Mã Đại Lý</th>
                                    <th>Email</th>
                                    <th>Điểm Tích Lũy</th>                                        
                                    <th>Cấp Bậc</th>  
                                    <th>Trạng Thái</th>                                        
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="content in data">
                                    <td class="w60">
                                        <a href="/admin/user/edit/((content.id))">
                                            <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" ng-if="!content.avatar" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                            <img src="((content.avatar))" ng-if="content.avatar" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/admin/user/edit/((content.id))" title="">((content.name))</a>
                                        <p class="mb-0">((content.phone))</p>
                                    </td>
                                    <td>
                                        <span>((content.code))</span>
                                    </td>
                                    <td>
                                        <span>((content.email))</span>
                                    </td>
                                    <td>
                                        <span>((content.points))</span>
                                    </td>
                                    <td>
                                        <span>((content.level.level))</span>
                                        
                                    </td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" ng-change="changeStatus(content)" ng-model="content.is_active" ng-true-value="1" ng-false-value="0">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="/admin/user/edit/((content.id))" class="btn btn-primary theme-bg btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm" ng-click="delete(content.id)" ><i class="fa fa-trash"></i></button>
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
         $scope.totalUsers = 0;
         $scope.nameCondition = '';

         $scope.data = [];

         $scope.pageLoad = 1;
         var canceler = $q.defer();
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

         // navigation
         $scope.pageCount = [];
         @for($i = 1 ; $i <= $totalPage; $i++)
            $scope.pageCount.push({{$i}});
         @endfor

         $scope.run_action = function(){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = 1;
            $http.get("{{route('admin.getListUser')}}?page="+$scope.pageLoad+"&name="+$scope.nameCondition).then(function(data, status) {
                $scope.totalUsers = data.data.count;
                $scope.pageCount = [];
                for (let count = 1 ; count <= data.data.pageTotal; count++){
                    $scope.pageCount.push(count);
                }
                $scope.data = data.data.data;
                $scope.loadingInstitution = 0;
            });
            
        }
        $scope.run_action();

        $scope.changeStatus = function(updateItem){
            if (updateItem.is_active === 1) {
                $.ajax({
                    url: "/admin/user/active-status/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                    }
                });
            } else {
                $.ajax({
                    url: "/admin/user/deactive-status/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                    }
                });
            }
        }

        $scope.changePage = function(id_page){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = id_page;

            $http.get("{{route('admin.getListUser')}}?page="+$scope.pageLoad+"&name="+$scope.nameCondition).then(function(data, status) {
               
                $scope.data = data.data.data;
                $scope.loadingInstitution = 0;
            });
            
        }
        $scope.changeKey = function(e){
            if (event.key === "Enter") {
                $scope.run_action();
            }
            
        }
        
        $scope.delete = function(id_delete){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý xóa thành viên này không?",
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
                    url: "/admin/user/delete/"+id_delete,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Delete Successful!"
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