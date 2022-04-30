@extends('layout.master')
@section('parentPageTitle', 'Sản Phẩm')
@section('title', 'Danh Sách Sản Phẩm')


@section('content')
<ng-controller ng-controller="AppController as demo">
<!-- Page header section  -->
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Hi, Welcomeback!</h1>
            <span>Danh sách Sản Phẩm,</span>
        </div>            
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                    <p class="text-muted mb-1">Tất Cả</p>
                    <h5 class="mb-0">((totalUsers)) Sản Phẩm</h5>
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
                            <input type="text" ng-model="nameCondition" ng-keydown="changeKey($event)" class="form-control" placeholder="Tên Sản Phẩm">
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
                                    <th>SKU</th>
                                    <th>Hiển Thị</th>                                        
                                    <th>Sản Phẩm Hot</th>                                        
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="content in data">
                                    <td class="w60">
                                        <a href="/admin/products/edit/((content.id))">
                                            <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" ng-if="!content.image" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                            <img src="((content.image))" ng-if="content.image" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/admin/products/edit/((content.id))" title="">((content.name))</a>
                                        <p class="mb-0">((content.parent.category))</p>
                                    </td>
                                    <td>
                                        <span>((content.sku))</span>
                                    </td>
                                    <td>
                                        <span>
                                            <label class="switch">
                                                <input type="checkbox" ng-change="changeStatus(content)" ng-model="content.is_active" ng-true-value="1" ng-false-value="0">
                                                <span class="slider round"></span>
                                            </label>
                                        
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <label class="switch">
                                                <input type="checkbox" ng-change="changeStatusHot(content)" ng-model="content.is_hot" ng-true-value="1" ng-false-value="0">
                                                <span class="slider round"></span>
                                            </label>
                                        </span>
                                        
                                    </td>
                                    <td>
                                        <a href="/admin/products/edit/((content.id))" class="btn btn-primary theme-bg btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm" ng-click="delete(content.id)" ><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-warning btn-sm" ng-click="loadOptionData(content.id)" >Nhập Hàng</button>
                                        <button class="btn btn-info btn-sm" ng-click="loadWarehousesData(content.id)" >Kho Hàng</button>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Sản Phẩm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Tên Sản Phẩm</label>
                                            <div class="input-group">
                                                <input ng-change="convertSlug(name_product)" id="nameNew" type="text" ng-model="name_product" class="form-control" placeholder="Nhập Tên Sản Phẩm">
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Slug</label>
                                            <div class="input-group">
                                                <input id="slugNew" type="text" ng-model="slug_product" class="form-control" placeholder="Slug">
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Sku</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="sku_product" class="form-control" placeholder="Sku">
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
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-success" ng-click="newDataConfirm()" >Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade import-option-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nhập Hàng Vào Kho</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group c_form_group">
                                            <label>Thuộc Tính</label>
                                            <div class="input-group">
                                            
                                                <select class="custom-select" ng-model="id_option">
                                                    <option value="">Chọn Thuộc Tính</option>
                                                    <option ng-repeat="content in optionList" value="((content.id))" >Size : ((content.size)) - Giá : ((content.price)) - Số Lương : ((content.quantity))</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Số Lượng</label>
                                            <div class="input-group">
                                                <input type="text" ng-model="quantity_option" class="form-control" placeholder="Màu Sắc">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-success" ng-click="importOption()">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade list-option-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg bd-example-modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hàng Trong Kho</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-hover table-custom spacing5 mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Size</th>
                                                    <th>Màu</th>
                                                    <th>Material</th>
                                                    <th>Số Lượng</th>                                        
                                                    <th>Giá Tiền</th>                                        
                                                    <th>Giá Giảm</th>    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="content in optionList">
                                                    <td class="w60">
                                                        <p ng-if="content.edit != 2" >((content.size))</p>
                                                        <input style="width : 100px" ng-if="content.edit == 2" autofocus type="text" ng-model="content.size" class="form-control edit-in-table" placeholder="Size">
                                                    </td>
                                                    <td>
                                                        <p ng-if="content.edit != 2" >((content.color))</p>
                                                        <input style="width : 100px" ng-if="content.edit == 2" autofocus type="text" ng-model="content.color" class="form-control edit-in-table" placeholder="Màu Sắc">
                                                    </td>
                                                    <td>
                                                        <p ng-if="content.edit != 2" >((content.material))</p>
                                                        <input style="width : 100px" ng-if="content.edit == 2" autofocus type="text" ng-model="content.material" class="form-control edit-in-table" placeholder="Material">
                                                    </td>
                                                    <td>
                                                        <p>((content.quantity))</p>
                                                        <input style="width : 100px" ng-if="content.edit == 3" autofocus type="text" ng-model="content.import" class="form-control edit-in-table" placeholder="Số Lượng">
                                                    </td>
                                                    <td>
                                                        <p ng-if="content.edit != 2" >(( parseCurency(content.price) ))</p>
                                                        <input style="width : 100px" ng-if="content.edit == 2" autofocus type="text" ng-model="content.price" class="form-control edit-in-table" placeholder="Giá">
                                                    </td>
                                                    <td>
                                                        <p ng-if="content.edit != 2" >(( parseCurency(content.sale_price) ))</p>
                                                        <input style="width : 100px" ng-if="content.edit == 2" autofocus type="text" ng-model="content.sale_price" class="form-control edit-in-table" placeholder="Giảm Giá">
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
    #images { list-style-type: none; margin: 0; padding: 0;
        width: 100%;
    float: left;
    margin: 0px 0px 15px;}
    #images li { margin: 10px; float: left; text-align: center;  height: 190px;}
</style>

<script type="text/javascript" >



customInterpolationApp.controller('AppController', function($scope, $http , $q) {
         // Funds Variable


         $scope.loadingInstitution = 0;
         $scope.totalUsers = 0;
         $scope.nameCondition = '';

         $scope.name_product = '';
         $scope.slug_product = '';
         $scope.sku_product = '';
         $scope.image_product = '';

         $scope.quantity_option = 0;
         $scope.id_option = '';

         $scope.data = [];

         $scope.pageLoad = 1;
         var canceler = $q.defer();
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

         // navigation
         $scope.pageCount = [];
         $scope.optionList = [];
         
         $scope.loadWarehousesData = function(idLoad){
            $http.get("/admin/products/list-option/"+idLoad).then(function(data, status) {
                $scope.optionList = [];
                $scope.optionList = data.data.data;
                $('.list-option-modal').modal();
            });
            
            
        }
        $scope.parseCurency = function(money){
            if (money != null) {
                return money.toLocaleString('en-US', {style : 'currency', currency : 'VND'});
            } else {
                return '';
            }
            
        }


         $scope.importOption = function(){
             if ($scope.id_option == '') {
                Swal.fire({
                    title: "Vui lòng chọn thuộc tính sản phẩm!",
                    type: "warning",

                });
                return;
             }
             Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý nhập hàng vào kho không?",
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
                    product_options_id : $scope.id_option,
                    quantity : $scope.quantity_option,
                };
                $http.post("/admin/products/warehouses-import", body).then(function(data, status) {
                    $('.import-option-modal').modal('hide');
                    $scope.quantity_option = 0;
                    $scope.id_option = '';
                    Swal.fire({
                        title: "Nhập hàng thành công!"
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

        $scope.loadOptionData = function(idLoad){
            $http.get("/admin/products/list-option/"+idLoad).then(function(data, status) {
                $scope.optionList = [];
                $scope.optionList = data.data.data;
            });
            $('.import-option-modal').modal();
            
        }

        $scope.run_action = function(){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = 1;
            $http.get("{{route('admin.getListProducts')}}?page="+$scope.pageLoad+"&name="+$scope.nameCondition).then(function(data, status) {
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

        $scope.convertSlug = function(title){
            var slug = '';
            slug = title.toLowerCase();
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            slug = slug.replace(/ /gi, "-");
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            $scope.slug_product = slug;
        }

        

        $scope.changePage = function(id_page){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = id_page;

            $http.get("{{route('admin.getListProducts')}}?page="+$scope.pageLoad+"&name="+$scope.nameCondition).then(function(data, status) {
                $scope.data = data.data.data;
                $scope.loadingInstitution = 0;
            });
            
        }

        $scope.changeStatus = function(updateItem){
            if (updateItem.is_active === 1) {
                $.ajax({
                    url: "/admin/products/active-status/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        if (res.error && res.error == 1){
                            $scope.changePage($scope.pageLoad);
                            Swal.fire({
                                title: "Vui lòng cập nhật đầy đủ danh sách hình ảnh sản phẩm và thuộc tính trước khi hiển thị sản phẩm!",
                                type: "warning",

                            });
                        }
                    }
                });
            } else {
                $.ajax({
                    url: "/admin/products/deactive-status/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {

                    }
                });
            }
        }

        $scope.changeStatusHot = function(updateItem){
            if (updateItem.is_hot === 1) {
                $.ajax({
                    url: "/admin/products/active-status-hot/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                    }
                });
            } else {
                $.ajax({
                    url: "/admin/products/deactive-status-hot/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                    }
                });
            }
        }

        $scope.changeKey = function(e){
            if (event.key === "Enter") {
                $scope.run_action();
            }
            
        }
        $scope.newData = function(e){
            $('.new-project-modal').modal();
        }

        $scope.newDataConfirm = function(e){
            $('.new-project-modal').modal('hide');
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thêm sản phẩm này không?",
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

                if ( $("#chooseImage_inputnew").val() === '' ) {
                    Swal.fire({
                        title: "Vui lòng chọn hình ảnh sản phẩm!",
                        type: "warning",

                    });
                    return;
                }
                var body = { 
                    _token: CSRF_TOKEN ,
                    name : $scope.name_product,
                    slug : $scope.slug_product,
                    sku : $scope.sku_product,
                    image : $("#chooseImage_inputnew").val()
                };
                $http.post("{{route('admin.addProducts')}}", body).then(function(data, status) {
                    console.log(data);
                    if (data.data.errors === 0 ) {
                        window.location.replace("/admin/products/edit/"+data.data.data.id);
                    } else {
                        Swal.fire({
                            title: "Slug đã tồn tại trong cơ sở dữ liệu!",
                            type: "warning",

                        });
                    }
                    
                });
                
            });
        }
        $scope.delete = function(id_delete){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý xóa sản phẩm này không?",
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
                    url: "/admin/products/delete/"+id_delete,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Xóa sản phẩm thành cônng!"
                        });
                        $scope.changePage($scope.pageLoad);
                    }
                });

            })
            
        }
    

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