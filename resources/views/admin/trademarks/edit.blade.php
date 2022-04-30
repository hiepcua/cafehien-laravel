@extends('layout.master')
@section('parentPageTitle', 'Nhãn Hiệu')
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
                    <h2>Thông Tin Nhãn Hiệu</h2>
                    <button type="submit" class="btn btn-primary theme-bg">Lưu Lại</button>
                </div>
                <div class="body">
                        @if ( @$message['status'] == 1 )
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{  $message['message'] }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        @if ( @$message['status'] === 2 )
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{  $message['message'] }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif

                        @csrf
                        <ul class="nav nav-tabs3 white">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-new2">Thông Tin Chung</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-new2">Hình Ảnh Mobile</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="Home-new2">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group c_form_group ">
                                            <label>Tên Nhãn Hiệu</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Tên Nhãn Hiệu" aria-label="Tên Nhãn Hiệu" name="trademark" value="{{@$data->trademark}}" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="Contact-new2">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group c_form_group">
                                        <label>Icon</label>
                                        <div class="input-group">
                                            <ul id="images">
                                                <li>   
                                                    <input class="input_image" type="hidden" id="chooseImage_inputbig" name="icon" value="{{@$data->icon != '' ? @$data->icon : '' }}">
                                                    <div id="chooseImage_divbig" style="display: none;">
                                                        <img src="{{@$data->icon != '' ? @$data->icon : '' }}" id="chooseImage_imgbig" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div id="chooseImage_noImage_divbig" style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                        No image
                                                    </div>
                                                    <br/>
                                                    <a href="javascript:chooseImage('big');">Choose image</a>
                                                    | 
                                                    <a href="javascript:clearImage('big');">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <label>Slide</label>

                                        <!-- IMAGES -->   
                                        
                                        <p><a href="javascript:addMoreImg()">+ Add more images</a></p> 
                                        <ul id="images">
                                            @foreach ($data->list_slide as $i => $item)
                                            <li @if($i >=2 && '' == $item) class="hidden"@endif>   
                                                    <input class="input_image" type="hidden" id="chooseImage_input{{$i}}" name="data[images][]" value="@if($item != ''){{$item}}@endif">
                                                    <div id="chooseImage_div{{$i}}" style="display: none;">
                                                        <img src="@if($item != ''){{$item}}@endif" id="chooseImage_img{{$i}}" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div id="chooseImage_noImage_div{{$i}}" style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                        No image
                                                    </div>
                                                    <br/>
                                                    <a href="javascript:chooseImage({{$i}});">Choose image</a>
                                                    | 
                                                    <a href="javascript:clearImage({{$i}});">Delete</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <!-- END IMAGES --> 
                                </div>
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
    #images { list-style-type: none; margin: 0px 0px 20px 0px; padding: 0; float: left;}
    #images li { margin: 10px; float: left; text-align: center;  height: 190px;}
    .hidden {display:none;}
</style>



<script>

customInterpolationApp.controller('AppController', function($scope, $http , $q) {
        $scope.dataComment = [];
        $scope.dataFaq = [];
        $scope.dataOption = [];
        $scope.dataNotifies = [];
        
        $scope.size_option = '';
        $scope.time_push = '';
        $scope.color_option = '';
        $scope.material_option = '';
        $scope.price_option = '';
        $scope.sale_price_option = '';
        $scope.title_push = '';
        $scope.description_push = '';
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        $scope.totalComment = 0 ;

        $scope.parseCurency = function(money){
            if (money != null) {
                return money.toLocaleString('en-US', {style : 'currency', currency : 'VND'});
            } else {
                return '';
            }
            
        }
        
        $scope.updateNotifies = function(updateItem) {
            updateItem.edit = 2 ;
        }
        $scope.cancleNotifies = function(updateItem) {
            updateItem.edit = 1 ;
        }
        $scope.newNotifies = function(e){
            $('.new-notifies-modal').modal();
        }
        $scope.addNotifiesConfirm = function(e){
            
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thêm thông báo này không?",
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
                    product_id : "{{$id}}",
                    time_push : $scope.time_push,
                    title : $scope.title_push,
                    description : $scope.description_push,
                };
                $http.post("/admin/products/add-notify", body).then(function(data, status) {
                    $scope.getNotifies();
                    $('.new-notifies-modal').modal("hide");
                    $scope.time_push = '';
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
        $scope.updateNotifiesConfirm = function(updateItem) {
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thay đổi thông báo này không?",
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
                    time_push : updateItem.time_push,
                    title : updateItem.title,
                    description : updateItem.description,
                };

                $http.post('/admin/products/update-notify/'+updateItem.id, body).then(function(data, status) {
                    updateItem.edit = 1;
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


        $scope.deleteNotifies = function(id_delete){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý xóa thông báo này không?",
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
                    url: "/admin/products/delete-notify/"+id_delete,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Xóa thông báo thành cônng!"
                        });
                        $scope.getNotifies();
                    }
                });

            })
            
        }



        
        $scope.newOption = function(e){
            $('.new-option-modal').modal();
        }
        $scope.closeZomeImage = function(){
            
            modal.style.display = "none";
        }
        
        
        $scope.confirmImport = function(e){
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
                    product_id : "{{$id}}",
                    product_options_id : e.id,
                    quantity : e.import,
                    price : e.price,
                };
                $http.post("/admin/products/warehouses-import", body).then(function(data, status) {
                    $scope.getOption();
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
        $scope.importOption = function(e){
            e.edit = 3;
        }
        
        $scope.addOptionConfirm = function(e){
            
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thêm thuộc tính này không?",
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
                    product_id : "{{$id}}",
                    size : $scope.size_option,
                    color : $scope.color_option,
                    material : $scope.material_option,
                    price : $scope.price_option,
                    sale_price : $scope.sale_price_option,
                    size : $scope.size_option
                };
                $http.post("/admin/products/add-option", body).then(function(data, status) {
                    $scope.getOption();
                    $('.new-option-modal').modal("hide");
                    $scope.size_option = '';
                    $scope.color_option = '';
                    $scope.material_option = '';
                    $scope.price_option = '';
                    $scope.sale_price_option = '';
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


        $scope.getOption = function(){
            $http.get("/admin/products/list-option/{{$id}}").then(function(data, status) {
                $scope.dataOption = [];
                data.data.data.map(itemUpdate => {
                    itemUpdate.edit = 1 ;
                });
                $scope.dataOption = data.data.data;
            });
            
        }
        $scope.getOption();

        $scope.updateOption = function(updateItem) {
            updateItem.edit = 2 ;
        }
        $scope.cancleOption = function(updateItem) {
            updateItem.edit = 1 ;
        }

        
        $scope.updateOptionConfirm = function(updateItem) {
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý thay đổi thuộc tính này không?",
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
                    size : updateItem.size,
                    color : updateItem.color,
                    material : updateItem.material,
                    price : updateItem.price,
                    sale_price : updateItem.sale_price
                };

                $http.post('/admin/products/update-option/'+updateItem.id, body).then(function(data, status) {
                    updateItem.edit = 1;
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


        $scope.deleteOption = function(id_delete){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý xóa thuộc tính này không?",
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
                    url: "/admin/products/delete-option/"+id_delete,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Xóa thuộc tính thành cônng!"
                        });
                        $scope.getOption();
                    }
                });

            })
            
        }
        
        $scope.getComment = function(){
            $scope.loadingInstitution = 1;
            $scope.pageLoad = 1;
            $http.get("/admin/products/get-comment/{{$id}}").then(function(data, status) {
                $scope.totalComment = data.data.count;
                $scope.pageCount = [];
                $scope.dataComment = data.data.data;
                
            });
            
        }

        
        $scope.getComment();
        $scope.zomeImage = function(e){
            modal.style.display = "block";
            modalImg.src = e.images;
        }
        

        $scope.getFAQ = function(){
            $http.get("/admin/products/list-faq/{{$id}}").then(function(data, status) {
                $scope.dataFaq = [];
                data.data.data.map(itemUpdate => {
                    itemUpdate.edit = 1 ;
                });
                $scope.dataFaq = data.data.data;
            });
        }
        $scope.getFAQ();

        $scope.updateFaq = function(updateItem) {
            updateItem.edit = 2 ;
        }

        $scope.cancleFaq = function(updateItem) {
            updateItem.edit = 1 ;
        }

        $scope.updateFaqConfirm = function(updateItem) {
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý trả lời này không?",
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
                    id : updateItem.id,
                    answer : updateItem.answer
                };

                $http.post('/admin/products/answer-faq/'+updateItem.id, body).then(function(data, status) {
                    updateItem.edit = 1;
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
        

        $scope.deleteComment = function(id_delete){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý xóa comment này không?",
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
                    url: "/admin/products/delete-comment/"+id_delete,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Xóa comment thành cônng!"
                        });
                        $scope.getComment();
                    }
                });

            })
            
        }
        $scope.deleteFaq = function(id_delete){
            Swal.fire({
                title: "Xác Nhận",
                text: "Bạn có đồng ý xóa faq này không?",
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
                    url: "/admin/products/delete-faq/"+id_delete,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Xóa faq thành cônng!"
                        });
                        $scope.getFAQ();
                    }
                });

            })
            
        }

        $scope.changeStatusFaq = function(updateItem){
            if (updateItem.status === 1) {
                $.ajax({
                    url: "/admin/products/active-faq/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                    }
                });
            } else {
                $.ajax({
                    url: "/admin/products/deactive-faq/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                    }
                });
            }
        }

        
        
        
        
        



    

});

</script>
@endsection