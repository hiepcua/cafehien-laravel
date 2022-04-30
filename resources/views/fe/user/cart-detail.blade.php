@extends('customer.main')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Chi Tiết Đơn Hàng')


@section('content')

<ng-controller ng-controller="AppController as demo">
<div class="page-content">
    <form action="" method="post" enctype="multipart/form-data">
    @csrf  
        <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <h3>
                <span class="hidden-320 ng-binding">Chi Tiết Đơn Đặt Hàng</span>
            </h3>
        </div>
        <div class="page-content">
            <div class="row ">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row clearfix">
                        @if ( $message['status'] == 1 )
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{  $message['message'] }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        @if ( $message['status'] === 2 )
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{  $message['message'] }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif



                        <div class="tabbable">
                            

                           
                            <div class="col-lg-12 col-md-12 relative p-0">
                                    
                                <div class="body">
                                    @if ($dataStatus->status != 3 && $dataStatus->status != 4)

                                        @if ($dataStatus->status != 1)
                                        <button type="button" ng-click='updateStatus(1)' class="btn btn-info">Đang Giao Hàng</button>
                                        @endif

                                        @if ($dataStatus->status != 2)
                                        <button type="button" ng-click='updateStatus(2)' class="btn btn-secondary">Đã Giao Hàng</button>
                                        @endif
                                        @if ($dataStatus->status != 3)
                                        <button type="button" ng-click='updateStatus(3)' class="btn btn-success">Hoàn Thành</button>
                                        @endif
                                        @if ($dataStatus->status != 4)
                                        <button type="button" ng-click='updateStatus(4)' class="btn btn-danger">Hủy</button>
                                        @endif

                                    @endif
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6 ">
                                            <div class="widget-box bd-orange">
                                                <div class="widget-header widget-header-flat infobox-orange infobox-dark">
                                                    <h4 class="widget-title  ">
                                                        <i class="fa fa-gift"></i>
                                                        Thông Tin Người Mua Hàng
                                                    </h4>
                                                </div>

                                                <div class="widget-body" style="border: none; min-height: 144px;">
                                                    <div class="widget-main">
                                                        <div class="row">
                                                            <div class="col-xs-7 info  ">
                                                                Họ Tên
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b>{{@$data->name}}</b>
                                                            </div>
                                                            <div class="col-xs-7 info  ">
                                                            Tài Khoản
                                                            </div>
                                                            <div class="col-xs-5 data text-right  ">
                                                            <b>{{@$data->user->email}}</b>
                                                            </div>
                                                            <div class="col-xs-7 info  ">
                                                            Số Điện Thoại
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                            <b>{{@$data->phone}}</b>
                                                            </div>
                                                            <div class="col-xs-3 info  ">
                                                            Địa Chỉ
                                                            </div>
                                                            <div class="col-xs-9 data text-right">
                                                            <b>{{@$data->address}} {{@$data->ward->ward}}
                                                                {{@$data->district->district}} {{@$data->province->province}}</b>
                                                            </div>
                                                            <div class="col-xs-7 info  ">
                                                            Ngày Mua
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                            <b>{{@$data->created_at}}</b>
                                                            </div>

                                                            <div class="col-xs-7 info  ">
                                                            Tình Trạng Đơn Hàng
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b  class="{{$dataStatus->status == 4 ? 'red' : 'black'}} {{$dataStatus->status == 3 ? 'success' : ''}}" >{{@$dataStatus->status_convert}}</b>
                                                                @if($dataStatus->status == 4)
                                                                    <label>Lý do hủy : <b>{{@$dataStatus->reason}}</b></label>
                                                                @endif
                                                            </div>

                                                            <div class="col-xs-7 info  ">
                                                                Mã Vạch
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b>{{@$data->qr_code}}</b>
                                                            </div>

                                                            <div class="col-xs-7 info  ">
                                                            Tin Nhắn 
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b>{{@$data->note}}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.widget-main -->
                                                </div>
                                            

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-md-6 ">
                                            <div class="widget-box bd-orange">
                                                <div class="widget-header widget-header-flat infobox-orange infobox-dark">
                                                    <h4 class="widget-title  ">
                                                        <i class="fa fa-gift"></i>
                                                        Thông Tin Đơn Hàng
                                                    </h4>
                                                </div>


                                                <div class="widget-body" style="border: none; min-height: 144px;">
                                                    <div class="widget-main">
                                                        <div class="row">
                                                            <div class="col-xs-7 info  ">
                                                                Giảm Giá (Cấp Bậc Thành Viên) %
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b>{{@$data->discount}}%</b>
                                                            </div>
                                                            <div class="col-xs-7 info  ">
                                                                Số Tiền Giảm Giá (Cấp Bậc Thành Viên)
                                                            </div>
                                                            <div class="col-xs-5 data text-right  ">
                                                                <b>- {{Helper::formatCurency(@$data->discount_money)}}</b>
                                                            </div>
                                                            <div class="col-xs-7 info  ">
                                                                Số Tiền Giảm Giá (Code Khuyến Mãi)
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b>{{@$data->promotion_code}} - {{Helper::formatCurency(@$data->promotion_money != 0 ? $data->promotion_money : 0)}}</b>
                                                            </div>
                                                            <div class="col-xs-7 info  ">
                                                                Tổng Tiền Hàng
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b>{{Helper::formatCurency(@$data->sub_total)}}</b>
                                                            </div>
                                                            <div class="col-xs-7 info  ">
                                                                Tiền Vận Chuyển
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b>+ {{Helper::formatCurency(@$data->delivery->price != 0 ? $data->delivery->price : 0)}}</b>
                                                            </div>

                                                            <div class="col-xs-7 info  ">
                                                                <b>Tổng Cộng : </b>
                                                            </div>
                                                            <div class="col-xs-5 data text-right">
                                                                <b>{{Helper::formatCurency(@$data->total)}}</b>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- /.widget-main -->
                                                </div>
                                            

                                            </div>
                                        </div>

                                    </div>
                                    

                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 relative p-0">
                                <div class="widget-box widget-color-blue">
                                    <div class="widget-header">
                                        <h5 class="widget-title ng-binding"><i class="icon-barcode"></i> Dánh Sách Món Hàng</h5>
                                    </div>
                                    <div class="widget-body">
                                        <table class="table table-hover table-custom spacing5 mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Sản Phẩm</th>
                                                    <th></th>
                                                    <th>Thuộc Tính</th>
                                                    <th>Số Lượng</th>
                                                    <th>Đơn Giá</th>
                                                    <th>Thành Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataDetail as $item)
                                                <tr>
                                                    <td>
                                                        <a href="/san-pham/{{$item->product->slug}}.html" target="_blank">
                                                            <img width="100" src="{{$item->product->image}}" data-toggle="tooltip"
                                                                data-placement="top" title="Avatar Name" alt="Avatar"
                                                                class="">
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
                                                        <span>{{Helper::formatCurency(@$item->price)}}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{Helper::formatCurency(@$item->price * $item->quantity)}}</span>
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


                </div><!-- /.col -->

            </div>
        </div><!-- /.row -->
    </form>
</div>
   
</ng-controller>




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
                $http.post("/thanh-vien/update-status/{{$id}}", body).then(function(data) {
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
                    $http.post("/thanh-vien/update-status/{{$id}}", body).then(function(data,
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
@stop