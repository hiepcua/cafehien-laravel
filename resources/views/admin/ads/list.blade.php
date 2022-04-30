@extends('layout.master')
@section('parentPageTitle', 'Quảng Cáo')
@section('title', 'Danh Sách Quảng Cáo')


@section('content')
<ng-controller ng-controller="AppController as demo">
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>Danh sách Quảng Cáo,</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Tất Cả</p>
                    <h5 class="mb-0">((totalCategorys)) Quảng Cáo</h5>
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
                            <input type="text" ng-model="nameCondition" ng-keydown="changeKey($event)" class="form-control" placeholder="Tên Banners">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm theme-bg" type="button" ng-click="run_action()" >Tìm</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive custom-table-responsive">
                        
                        <table class="table table-hover table-custom spacing5 mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Hình Ảnh</th> 
                                    <th>Nội Dung</th>                                        
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="content in data">
                                    <td>
                                        <span ng-if="content.edit == 1"><img src="((content.image))" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle h-100"> </span>
                                        <div ng-if="content.edit == 2" class="input-group">
                                            <ul id="images">
                                                <li>   
                                                    <input class="input_image" type="hidden" id="chooseImage_input((content.id))" ng-model="content.image" value="((content.image))">
                                                    <div id="chooseImage_div((content.id))" style="((content.image != '' ? '' : 'display: none;')) ">
                                                        <img src="((content.image))" id="chooseImage_img((content.id))" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div id="chooseImage_noImage_div((content.id))" style="((content.image == '' ? '' : 'display: none;'))width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                        No image
                                                    </div>
                                                    <br/>
                                                    <a onclick="chooseImage(this)"  rel="((content.id))">Choose image</a>
                                                    | 
                                                    <a onclick="clearImage(this)" rel="((content.id))">Delete</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <span ng-if="content.edit == 1">((content.description))</span>
                                        <div ng-if="content.edit == 2" >
                                            <input class="form-control edit-in-table" type="text" id="chooseImage_inputvideo((content.id))" ng-model="content.video" value="((content.video))">
                                            <div id="chooseImage_divvideo((content.id))" style="display: none;">
                                                <img src="((content.video))" id="chooseImage_imgvideo((content.id))" style="display: none;"></img>
                                            </div>
                                            <div id="chooseImage_noImage_divvideo((content.id))" style="display: none;">
                                                No image
                                            </div>
                                            <a onclick="chooseImage(this)"  rel="video((content.id))">Chọn Video</a>
                                            | 
                                            <a onclick="clearImage(this)" rel="video((content.id))">Xóa</a>
                                        </div>
                                        <input ng-if="content.edit == 2" autofocus type="text" ng-model="content.link" class="form-control edit-in-table" placeholder="Link">
                                        <input ng-if="content.edit == 2" autofocus type="text" ng-model="content.position" class="form-control edit-in-table" placeholder="Vị Trí">
                                        <textarea ng-if="content.edit == 2"  ng-model="content.description" class="form-control edit-in-table" rows="4" ></textarea>
                                        
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
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Banner</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Vị Trí</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="name_banner" class="form-control" placeholder="Nhập Vị Trí">
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Nội Dung</label>
                                            <div class="input-group">
                                                <textarea ng-model="description_banner" class="form-control" rows="4" ></textarea>
                                            </div>
                                        </div>
                                        <ul id="images">
                                            <li>   
                                                <input class="input_image" type="hidden" id="chooseImage_inputnew" value="">
                                                <div id="chooseImage_divnew" style="display: none;">
                                                    <img src="" id="chooseImage_imgnew" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                </div>
                                                <div id="chooseImage_noImage_divnew" style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                    No image
                                                </div>
                                                <br/>
                                                <a onclick="chooseImage(this)"  rel="new">Choose image</a>
                                                | 
                                                <a onclick="clearImage(this)" rel="new">Delete</a>
                                            </li>
                                        </ul>
                                        <div class="form-group c_form_group">
                                            <label>Video</label>
                                            <div class="input-group">
                                            <input class="input_image" type="text" id="chooseImage_inputnewvideo" value="">
                                                <div id="chooseImage_divnewvideo" style="display: none;">
                                                    <img src="" id="chooseImage_imgnewvideo" style="display: none;"></img>
                                                </div>
                                                <div id="chooseImage_noImage_divnewvideo" style="display: none;">
                                                    No image
                                                </div>
                                                <br/>
                                                <a onclick="chooseImage(this)"  rel="newvideo">Chọn Video</a>
                                                | 
                                                <a onclick="clearImage(this)" rel="newvideo">Xóa</a>
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Link</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="link_banner" class="form-control" placeholder="Nhập Link">
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
         $scope.src_video = '';
         $scope.link_banner = '';

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
            $http.get("{{route('admin.getListAdvertisements')}}?page="+$scope.pageLoad+"&text="+$scope.nameCondition).then(function(data, status) {
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

        $scope.updateConfirm = function(i){
            
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thay đổi quảng cáo này không?",
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
                    image : $("#chooseImage_input"+i.id).val(),
                    position : i.position,
                    description : i.description,
                    video : $("#chooseImage_inputvideo"+i.id).val(),
                    link : i.link
                };

                $http.post('/admin/advertisements/edit/'+i.id, body).then(function(data, status) {
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
            $http.get("{{route('admin.getListAdvertisements')}}?page="+$scope.pageLoad+"&text="+$scope.nameCondition).then(function(data, status) {
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
                text: "Bạn có đồng ý thêm quảng cáo này không?",
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
                    position : $scope.name_banner,
                    description : $scope.description_banner,
                    image : $("#chooseImage_inputnew").val(),
                    video : $("#chooseImage_inputnewvideo").val(),
                    link : $scope.link_banner
                };
                $http.post("{{route('admin.addAdvertisements')}}", body).then(function(data, status) {
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
                text: "Bạn có đồng ý xóa quảng cáo này không?",
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
                    url: "/admin/advertisements/delete/"+id_delete,
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