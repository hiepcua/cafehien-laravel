@extends('layout.master')
@section('parentPageTitle', 'Chi Tiết Đơn Hàng')
@section('title', 'Chi Tiết Đơn Hàng')


@section('content')
<ng-controller ng-controller="AppController as demo">
    <!-- Page header section  -->
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-xl-5 col-md-5 col-sm-12">
                <h1>Hi, Welcomeback!</h1>
                <span>Chi Tiết Đơn Hàng,</span>
            </div>
            <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">

            </div>
        </div>
    </div>


    <!-- datepicker -->
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Chi Tiết Đơn Hàng</h2>
                    @if ($dataStatus->status != 3 && $dataStatus->status != 4)
                    
                    @if ($dataStatus->status != 1)
                    <button type="button" ng-click='updateStatus(1)' class="btn btn-warning">Đang Giao Hàng</button>
                    @endif

                    @if ($dataStatus->status != 2)
                    <button type="button" ng-click='updateStatus(2)' class="btn btn-dark">Đã Giao Hàng</button>
                    @endif
                    @if ($dataStatus->status != 3)
                    <button type="button" ng-click='updateStatus(3)' class="btn btn-success">Hoàn Thành</button>
                    @endif
                    @if ($dataStatus->status != 4)
                    <button type="button" ng-click='updateStatus(4)' class="btn btn-danger">Hủy</button>
                    @endif

                    @endif
                </div>
                <div class="body">

                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group c_form_group ">
                                <label>Họ Tên : <b>{{@$data->name}}</b></label>
                                <label>Tài Khoản : <b>{{@$data->user->email}}</b></label>
                                <label>Số Điện Thoại : <b>{{@$data->phone}}</b></label>
                                <label>Địa Chỉ : <b>{{@$data->address}} {{@$data->ward->ward}}
                                        {{@$data->district->district}} {{@$data->province->province}}</b></label>
                                <label>Ngày Mua : <b>{{@$data->created_at}}</b></label>
                                <label>Tình Trạng Đơn Hàng : <b>{{@$dataStatus->status_convert}}</b></label>
                                <label>Mã Vạch : <b>{{@$data->qr_code}}</b></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <form action="" method="POST" >
                                @csrf
                                <div class="form-group c_form_group ">
                                    <label>Người Bán</label>
                                    <div class="input-group">
                                        <select class="custom-select" name="user_code" onchange="this.form.submit()">
                                            <option value="">Chưa có người bán</option>
                                            @foreach($users as $item)
                                                <option value="{{$item->code}}" @if($item->code == @$data->user_code) selected @endif>{{$item->name}} - {{$item->phone}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group c_form_group ">
                                <label>Giảm Giá (Cấp Bậc Thành Viên) %: <b>{{@$data->discount}}%</b></label>
                                <label>Số Tiền Giảm Giá (Cấp Bậc Thành Viên): <b>- (( parseCurency({{@$data->discount_money}}) ))</b></label>
                                <label>Số Tiền Giảm Giá (Code Khuyến Mãi): <b>{{@$data->promotion_code}} - (( parseCurency({{@$data->promotion_money != 0 ? $data->promotion_money : 0}}) ))</b></label>
                                <label>Tổng Tiền Hàng : <b>(( parseCurency({{@$data->sub_total}}) ))</b></label>
                                <label>Tiền Vận Chuyển: <b>(( parseCurency({{@$data->delivery->price != 0 ? $data->delivery->price : 0}}) ))</b></label>
                                <label><b>Tổng Cộng : </b><b>(( parseCurency({{@$data->total}}) ))</b></label>
                            </div>
                            <div class="form-group c_form_group ">
                                <label>Tin Nhắn : <b>{{@$data->note}}</b></label>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2>Dánh Sách Món Hàng</h2>
                </div>
                <div class="body">

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <table class="table table-hover table-custom spacing5 mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th></th>
                                        <th>Thuộc Tính</th>
                                        <th>Số Lượng Mua</th>
                                        <th>Đơn Giá</th>
                                        <th>Thành Tiền</th>
                                        <th>Số Lượng Trong Kho</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataDetail as $item)
                                    <tr>
                                        <td>
                                            <a href="/admin/products/edit/{{$item->product_id}}" target="_blank">
                                                <img src="{{$item->product->image}}" data-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="Avatar"
                                                    class="rounded-circle w35">
                                            </a>
                                        </td>
                                        <td>
                                            {{$item->product->name}}
                                            <p class="mb-0">{{$item->product->sku}}</p>
                                        </td>
                                        <td>
                                            <span>{{@$item->productOption->size}}
                                                {{@$item->productOption->color}}</span>
                                        </td>
                                        <td>
                                            <span>{{@$item->quantity}}</span>
                                        </td>
                                        <td>
                                            <span>(( parseCurency({{@$item->price}}) ))</span>
                                        </td>
                                        <td>
                                            <span>(( parseCurency({{@$item->price * $item->quantity}}) ))</span>
                                        </td>
                                        <td>
                                            <span> {{@$item->productOption->quantity}}</span>

                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
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
.demo-card label {
    display: block;
    position: relative;
}

.demo-card .col-lg-4 {
    margin-bottom: 30px;
}
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
<link href="{{ asset('lib_upload/jquery-ui/css/ui-lightness/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('lib_upload/jquery-ui/js/jquery-ui.js') }}"></script>
<script src="{{ asset('lib_upload/jquery.slug.js') }}"></script>


<script type="text/javascript">
//<![CDATA[

jQuery(document).ready(function() {
    CKFinder.setupCKEditor(null, '/lib_upload/ckfinder/');
    // jQuery( "#images" ).sortable();
    // jQuery( "#images" ).disableSelection();
    //Display images
    jQuery(".input_image[value!='']").parent().find('div').each(function(index, element) {
        jQuery(this).toggle();
    });


});
var imgId;

function chooseImage(id) {
    imgId = id;
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '/lib_upload/ckfinder/'; // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = setFileField;
    finder.popup();
}
// This is a sample function which is called when a file is selected in CKFinder.
function setFileField(fileUrl) {
    document.getElementById('chooseImage_img' + imgId).src = fileUrl;
    document.getElementById('chooseImage_input' + imgId).value = fileUrl;
    document.getElementById('chooseImage_div' + imgId).style.display = '';
    document.getElementById('chooseImage_noImage_div' + imgId).style.display = 'none';
}

function clearImage(imgId) {
    document.getElementById('chooseImage_img' + imgId).src = '';
    document.getElementById('chooseImage_input' + imgId).value = '';
    document.getElementById('chooseImage_div' + imgId).style.display = 'none';
    document.getElementById('chooseImage_noImage_div' + imgId).style.display = '';
}

function addMoreImg() {
    jQuery("ul#images > li.hidden").filter(":first").removeClass('hidden');
}

//]]>
</script>
<style type="text/css">
#images {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

#images li {
    margin: 10px;
    float: left;
    text-align: center;
    height: 190px;
}
</style>



<script>
customInterpolationApp.controller('AppController', function($scope, $http, $q) {
    // Funds Variable
    $scope.showPassword = 0;
   
    var canceler = $q.defer();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $scope.parseCurency = function(money) {
        if (money != null) {
            return money.toLocaleString('en-US', {
                style: 'currency',
                currency: 'VND'
            });
        } else {
            return '';
        }

    }
    $scope.updateStatus = function(status) {
        if (status != 4) {
            Swal.fire({
                title: "Xác Nhận?",
                text: "Bạn Có Muốn Thay Đổi Trạng Thái Đơn Hàng?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có!",
                cancelButtonText: "Không!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function(t) {
                if (t.dismiss == "cancel") {
                    return;
                }

                var body = {
                    _token: CSRF_TOKEN,
                    status: status,
                    reason : ''
                };
                $http.post("/admin/orders/update-status/{{$id}}", body).then(function(data) {
                    var bodyFB = {
                        id: '{{$id}}',
                        status : status
                    };
                    $http.post("https://api.dayshee.com/api/v1/order/status", bodyFB).then(function(data) {
                        location.reload();
                    }).catch(function(data) {
                        Swal.fire({
                            title: "Có lỗi dữ liệu nhập vào!",
                            type: "warning",

                        });
                    });
                }).catch(function(data) {
                    // Handle error here
                    Swal.fire({
                        title: "Có lỗi dữ liệu nhập vào!",
                        type: "warning",

                    });
                });

            })
        } else {
            Swal.fire({
                title: "Lý do!",
                text: "nhập lý do",
                input: 'text',
                showCancelButton: true        
            }).then((result) => {
                if (result.value) {
                    var body = {
                        _token: CSRF_TOKEN,
                        status: status,
                        reason : result.value
                    };
                    $http.post("/admin/orders/update-status/{{$id}}", body).then(function(data,
                    status) {
                        location.reload();
                    }).catch(function(data) {
                        // Handle error here
                        Swal.fire({
                            title: "Có lỗi dữ liệu nhập vào!",
                            type: "warning",

                        });
                    });
                } else {
                    Swal.fire({
                        title: "Nhập lý do hủy đơn hàng!",
                        type: "warning",

                    });
                }
            });
        }

    }



});
</script>
@endsection