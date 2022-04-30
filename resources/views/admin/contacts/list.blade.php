@extends('layout.master')
@section('parentPageTitle', 'Banners')
@section('title', 'Danh Sách Liên Hệ')


@section('content')
<ng-controller ng-controller="AppController as demo">
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>Danh sách Liên Hệ,</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Tất Cả</p>
                    <h5 class="mb-0">((totalCategorys)) Liên Hệ</h5>
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
                    <div class="table-responsive custom-table-responsive">
                        <div class="loadding_api" ng-if="loadingInstitution == 1">
                            <div class="spinner-border text-success m-2 "  role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <table class="table table-hover table-custom spacing5 mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tên Người Gửi</th>   
                                    <th>Email Người Gửi</th>   
                                    <th>Nội Dung</th>   
                                    <th>Ngày Gửi</th>      
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="content in data">
                                    <td>
                                        <span>((content.name))</span>
                                    </td>
                                    <td>
                                        <span>((content.email))</span>
                                    </td>
                                    <td>
                                        <span>((content.content))</span>
                                    </td>
                                    <td>
                                        <span>((content.created_at))</span>
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
    function chooseImage(event)
    {   
        id= event.rel;
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
    function clearImage(event)
    {
        imgId= event.rel;
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


         $scope.loadingInstitution = 0;
         $scope.totalCategorys = 0;
         $scope.nameCondition = '';
         $scope.name_banner = '';
         $scope.description_banner = '';
         $scope.src_banner = '';

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
            $http.get("{{route('admin.getListContacts')}}?page="+$scope.pageLoad+"&text="+$scope.nameCondition).then(function(data, status) {
                data.data.data.map(item => {
                    item.edit = 1;
                });

                $scope.totalCategorys = data.data.count;
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
            $http.get("{{route('admin.getListContacts')}}?page="+$scope.pageLoad+"&text="+$scope.nameCondition).then(function(data, status) {
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

            console.log($scope.category_parent);
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thêm banner này không?",
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
                    text : $scope.name_banner,
                    description : $scope.description_banner,
                    banner : $("#chooseImage_inputnew").val()
                };
                $http.post("{{route('admin.addBanners')}}", body).then(function(data, status) {
                    $scope.run_action();
                    $('.new-project-modal').modal("hide");
                    
                    $scope.name_banner = '';
                    $scope.description_banner = '';
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
                text: "Bạn có đồng ý xóa danh mục này không?",
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
                    url: "/admin/categorys/delete/"+id_delete,
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