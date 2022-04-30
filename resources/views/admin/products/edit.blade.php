@extends('layout.master')
@section('parentPageTitle', 'Sản Phẩm')
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
                    <h2>Thông Tin Sản Phẩm</h2>
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
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-new2">Nội Dung</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-new2">Hình Ảnh Mobile</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Option-new2">Option</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Notifies">Thông Báo</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#FAQ-new2">FAQ</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Comment-new2">Comment</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="Home-new2">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group c_form_group ">
                                            <label>Tên Sản Phẩm</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Tên Sản Phẩm" aria-label="Tên Sản Phẩm" name="name" value="{{@$data->name}}" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Danh Mục Sản Phẩm</label>
                                            <div class="input-group">
                                                <select class="custom-select" name="category_id">
                                                    <option value="">Chọn Danh Mục</option>
                                                    @foreach($categorys as $item)
                                                        <option value="{{$item->id}}" @if($item->id == @$data->category_id) selected @endif>{{$item->category}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Slug</label>
                                            <div class="input-group">
                                                <input type="text" disabled class="form-control" placeholder="Slug" name="slug" aria-label="Slug" value="{{@$data->slug}}" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>SKU</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="sku" name="sku" aria-label="sku" value="{{@$data->sku}}" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-group c_form_group row clearfix">

                                            <div class="col-lg-6 col-md-6">
                                                <label>Active</label>
                                                <div class="input-group">
                                                    <label class="switch">
                                                        <input type="checkbox" name="is_active" value="{{@$data->is_active == 1 ? 'true' : 'false'}}" {{@$data->is_active == 1 ? 'checked' : ''}} >
                                                        <span style="width:40px" class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label>Sản Phẩm Hot</label>
                                                <div class="input-group">
                                                    <label class="switch">
                                                        <input type="checkbox" name="is_hot" value="{{@$data->is_hot == 1 ? 'true' : 'false'}}" {{@$data->is_hot == 1 ? 'checked' : ''}} >
                                                        <span style="width:40px" class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group c_form_group">
                                            <label>Xuất Xứ</label>
                                            <div class="input-group">
                                                <select class="custom-select" name="origin_id">
                                                    <option value="">Chọn Xuất Xứ</option>
                                                    @foreach($origins as $item)
                                                        <option value="{{$item->id}}" @if($item->id == @$data->origin_id) selected @endif>{{$item->origin}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group c_form_group">
                                            <label>Nhãn Hiệu</label>
                                            <div class="input-group">
                                                <select class="custom-select" name="trademark_id">
                                                    <option value="">Chọn Nhãn Hiệu</option>
                                                    @foreach($trademarks as $item)
                                                        <option value="{{$item->id}}" @if($item->id == @$data->trademark_id) selected @endif>{{$item->trademark}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        
                                    </div>

                                    

                                   
                                </div>
                            </div>
                            <div class="tab-pane" id="Profile-new2">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group c_form_group">
                                            <label>Nội Dung Ngắn</label>
                                            <div class="input-group">
                                                <textarea class="text-input textarea ckeditor"  name="short_description" rows="5" >
                                                {{@$data->short_description}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group c_form_group">
                                            <label>Nội Dung</label>
                                            <div class="input-group">
                                                <textarea class="text-input textarea ckeditor"  name="description" rows="10" >
                                                {{@$data->description}}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group c_form_group">
                                            <label>Hướng Dẫn</label>
                                            <div class="input-group">
                                                <textarea class="text-input textarea ckeditor"  name="manuals" rows="10" >
                                                {{@$data->manuals}}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Contact-new2">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group c_form_group">
                                        <label>Hình 1:1</label>
                                        <div class="input-group">
                                            <ul id="images">
                                                <li>   
                                                    <input class="input_image" type="hidden" id="chooseImage_inputbig" name="image" value="{{@$data->image != '' ? @$data->image : '' }}">
                                                    <div id="chooseImage_divbig" style="display: none;">
                                                        <img src="{{@$data->image != '' ? @$data->image : '' }}" id="chooseImage_imgbig" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
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
                                    <div class="form-group c_form_group">
                                        <label>Hình 16:9</label>
                                        <div class="input-group">
                                            <ul id="images">
                                                <li>   
                                                    <input class="input_image" type="hidden" id="chooseImage_inputbig16_9" name="image_16_9" value="{{@$data->image_16_9 != '' ? @$data->image_16_9 : '' }}">
                                                    <div id="chooseImage_divbig16_9" style="display: none;">
                                                        <img src="{{@$data->image_16_9 != '' ? @$data->image_16_9 : '' }}" id="chooseImage_imgbig16_9" style="max-width: 150px; max-height:150px; border:dashed thin;"></img>
                                                    </div>
                                                    <div id="chooseImage_noImage_divbig16_9" style="width: 150px; border: thin dashed; text-align: center; padding:70px 0px;">
                                                        No image
                                                    </div>
                                                    <br/>
                                                    <a href="javascript:chooseImage('big16_9');">Choose image</a>
                                                    | 
                                                    <a href="javascript:clearImage('big16_9');">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <label>Slide 3:2</label>

                                        <!-- IMAGES -->   
                                        
                                        <p><a href="javascript:addMoreImg()">+ Add more images</a></p> 
                                        <ul id="images">
                                            @foreach ($dataImage as $i => $item)
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

                            <!-- Comment -->
                            <div class="tab-pane" id="Comment-new2">
                                <table class="table table-hover table-custom spacing5 mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Rating</th>
                                            <th>Comment</th>                                        
                                            <th>Thời Gian</th>                                        
                                            <th>Hiển Thị</th>                                        
                                            <th>Chức Năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="content in dataComment">
                                            <td class="w60">
                                                    <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" ng-if="!content.user.avatar" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                                    <img src="((content.user.avatar))" ng-if="content.user.avatar" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                            </td>
                                            <td>
                                                ((content.user.name))
                                                <p class="mb-0">((content.user.email))</p>
                                            </td>
                                            <td>
                                                <span>((content.rating))</span>
                                            </td>
                                            <td>
                                                <span>((content.comment))</span>
                                                <div class="image-list-aptach" >
                                                    <img class="thumbnail show-image-full" ng-repeat="image in content.images" ng-click="zomeImage(image)" src="((image.images))" />
                                                </div>   
                                            </td>
                                            <td>
                                                <span>((content.created_at))</span>
                                            </td>
                                            <td>
                                                <span>
                                                    <label class="switch">
                                                        <input type="checkbox" ng-change="changeCommentHot(content)" ng-model="content.is_active" ng-true-value="1" ng-false-value="0">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </span>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" type="button" ng-click="deleteComment(content.id)" ><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            </div>

                            <div class="tab-pane" id="FAQ-new2">
                                <table class="table table-hover table-custom spacing5 mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Question</th>
                                            <th>Answer</th>                                        
                                            <th>Status</th>                                        
                                            <th>Thời Gian</th>                                        
                                            <th>Chức Năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="content in dataFaq">
                                            <td class="w60">
                                                    <img src="{{ asset('assets/images/xs/avatar1.jpg') }}" ng-if="!content.user.avatar" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                                    <img src="((content.user.avatar))" ng-if="content.user.avatar" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="rounded-circle w35">
                                            </td>
                                            <td>
                                                ((content.user.name))
                                                <p class="mb-0">((content.user.email))</p>
                                            </td>
                                            <td>
                                                <span>((content.question))</span>
                                            </td>
                                            <td>
                                                <span ng-if="content.edit == 1">((content.answer))</span>
                                                <textarea ng-if="content.edit == 2"  ng-model="content.answer" class="form-control edit-in-table" rows="4" ></textarea>
                                            </td>
                                            <td>
                                                <span>
                                                    <label class="switch">
                                                        <input type="checkbox" ng-change="changeStatusFaq(content)" ng-model="content.status" ng-true-value="1" ng-false-value="0">
                                                        <span class="slider round"></span>
                                                    </label>
                                                
                                                </span>
                                            </td>
                                            <td>
                                                <span>((content.created_at))</span>
                                            </td>
                                            <td>
                                                <button ng-if="content.edit == 2" class="btn btn-info btn-sm a-button-table " type="button" ng-click="updateFaqConfirm(content)" >
                                                    <i class="fa fa-save"></i>
                                                </button>

                                                <button ng-if="content.edit == 2" class="btn btn-danger btn-sm a-button-table " type="button" ng-click="cancleFaq(content)" >
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                                
                                                <button ng-if="content.edit == 1"  class="btn btn-warning btn-sm" type="button" ng-click="updateFaq(content)" ><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm" type="button" ng-click="deleteFaq(content.id)" ><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            </div>

                            <div class="tab-pane" id="Notifies">
                                <table class="table table-hover table-custom spacing5 mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Thời Gian</th>                                    
                                            <th>Tiêu Đề</th>                                    
                                            <th>Nội Dung</th>                                    
                                            <th>Chức Năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="content in dataNotifies">
                                            <td >
                                                <p ng-if="content.edit != 2" >((content.time_push))</p>
                                                <input style="width : 100px" ng-if="content.edit == 2" autofocus type="text" ng-model="content.time_push" class="form-control edit-in-table" placeholder="Mẫu 00:00 ví dụ 07:00">
                                            </td>
                                            <td >
                                                <p ng-if="content.edit != 2" >((content.title))</p>
                                                <input style="width : 100px" ng-if="content.edit == 2" autofocus type="text" ng-model="content.title" class="form-control edit-in-table" placeholder="Tiêu Đề">
                                            </td>
                                            <td >
                                                <p ng-if="content.edit != 2" >((content.description))</p>
                                                <textarea ng-if="content.edit == 2"  ng-model="content.description" class="form-control edit-in-table" rows="4" ></textarea>

                                            </td>
                                            
                                            <td>
                                                <button ng-if="content.edit == 2" class="btn btn-info btn-sm a-button-table " type="button" ng-click="updateNotifiesConfirm(content)" >
                                                    <i class="fa fa-save"></i>
                                                </button>
                                                <button ng-if="content.edit == 2" class="btn btn-danger btn-sm a-button-table " type="button" ng-click="cancleNotifies(content)" >
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                                <button ng-if="content.edit != 2"  class="btn btn-warning btn-sm" type="button" ng-click="updateNotifies(content)" ><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm" type="button" ng-click="deleteNotifies(content.id)" ><i class="fa fa-trash"></i></button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button type="button" class="btn btn-primary theme-bg" ng-click="newNotifies()">Thêm Thuộc Tính Mới</button>
                            
                            </div>


                            <div class="tab-pane" id="Option-new2">
                                <table class="table table-hover table-custom spacing5 mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Size</th>
                                            <th>Màu</th>
                                            <th>Material</th>
                                            <th>Số Lượng</th>                                        
                                            <th>Giá Tiền</th>                                        
                                            <th>Giá Giảm</th>                                        
                                            <th>Chức Năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="content in dataOption">
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
                                            <td>
                                                <button ng-if="content.edit == 2" class="btn btn-info btn-sm a-button-table " type="button" ng-click="updateOptionConfirm(content)" >
                                                    <i class="fa fa-save"></i>
                                                </button>
                                                <button ng-if="content.edit == 2" class="btn btn-danger btn-sm a-button-table " type="button" ng-click="cancleOption(content)" >
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                                <button ng-if="content.edit != 2"  class="btn btn-warning btn-sm" type="button" ng-click="updateOption(content)" ><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm" type="button" ng-click="deleteOption(content.id)" ><i class="fa fa-trash"></i></button>
                                                <button ng-if="content.edit == 1" class="btn btn-warning btn-sm" type="button" ng-click="importOption(content)" >Nhập Hàng</button>
                                                <button ng-if="content.edit == 3" class="btn btn-info btn-sm a-button-table " type="button" ng-click="confirmImport(content)" >
                                                    <i class="fa fa-save"></i>
                                                </button>
                                                <button ng-if="content.edit == 3" class="btn btn-danger btn-sm a-button-table " type="button" ng-click="cancleOption(content)" >
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button type="button" class="btn btn-primary theme-bg" ng-click="newOption()">Thêm Thuộc Tính Mới</button>
                            
                            </div>

                            <div class="modal fade new-option-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thêm Thuộc Tính Mới</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group c_form_group">
                                                <label>Size</label>
                                                <div class="input-group">
                                                    <input type="text" ng-model="size_option" class="form-control" placeholder="Size">
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Màu Sắc</label>
                                                <div class="input-group">
                                                    <input type="text" ng-model="color_option" class="form-control" placeholder="Màu Sắc">
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Material</label>
                                                <div class="input-group">
                                                    <input type="text" ng-model="material_option" class="form-control" placeholder="Material">
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Giá</label>
                                                <div class="input-group">
                                                    <input type="text" ng-model="price_option" class="form-control" placeholder="Giá">
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group">
                                                <label>Giảm Giá</label>
                                                <div class="input-group">
                                                    <input type="text" ng-model="sale_price_option" class="form-control" placeholder="Giảm Giá">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-success" ng-click="addOptionConfirm()">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade new-notifies-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thêm Thông Báo Mới</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group c_form_group">
                                                <label>Thời Gian</label>
                                                <div class="input-group">
                                                    <input type="text" ng-model="time_push" class="form-control" placeholder="Mẫu 00:00 ví dụ 07:00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group c_form_group">
                                                <label>Tiêu Đề</label>
                                                <div class="input-group">
                                                    <input type="text" ng-model="title_push" class="form-control" placeholder="Tiêu Đề">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group c_form_group">
                                                <label>Nội Dung</label>
                                                <div class="input-group">
                                                    <textarea ng-model="description_push" class="form-control edit-in-table" rows="4" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-success" ng-click="addNotifiesConfirm()">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn btn-primary theme-bg">Lưu Lại</button>
                            </div> -->
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</div>
<div id="myModal" class="modal">
            <span class="close" ng-click="closeZomeImage()">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
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
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
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
        $scope.changeCommentHot = function(updateItem){
            if (updateItem.is_active === 1) {
                $.ajax({
                    url: "/admin/products/active-comment/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                    }
                });
            } else {
                $.ajax({
                    url: "/admin/products/deactive-comment/"+updateItem.id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                    }
                });
            }
        }

        $scope.getNotifies = function(){
            $http.get("/admin/products/list-notify/{{$id}}").then(function(data, status) {
                $scope.dataNotifies = [];
                data.data.data.map(itemUpdate => {
                    itemUpdate.edit = 1 ;
                });
                $scope.dataNotifies = data.data.data;
            });
            
        }
        $scope.getNotifies();
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