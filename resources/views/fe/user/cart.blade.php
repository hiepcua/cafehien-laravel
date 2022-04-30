@extends('customer.main')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Đơn Hàng')


@section('content')

        <!-- Page Banner Section Start -->
<ng-controller ng-controller="AppController as demo">
<div class="page-content">
    <form action="" method="post" enctype="multipart/form-data">
    @csrf  
        <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <h3>
                <span class="hidden-320 ng-binding">Đơn Đặt Hàng</span>
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
                                <div class="widget-box widget-color-blue">
                                    <div class="widget-header">
                                        <h5 class="widget-title ng-binding"><i class="icon-barcode"></i> Danh Sách Đơn Hàng</h5>
                                    </div>
                                    <div class="widget-body">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Mã Đơn Hàng</th> 
                                                    <th>Người Nhận</th>                                       
                                                    <th>Địa Chỉ</th>                                       
                                                    <th>Tổng Tiền</th>
                                                    <th>Ngày Mua</th>
                                                    <th>Tình Trạng</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>
                                                                <span >#{{$order->qr_code}}</span>
                                                            </td>
                                                            <td>
                                                                {{$order->name}}
                                                                <p class="mb-0">{{$order->phone}}</p>
                                                            </td>
                                                            <td>
                                                                <span >{{$order->address}} - {{$order->ward->ward}} - {{$order->district->district}} - {{$order->province->province}}</span>
                                                            </td>
                                                            <td>
                                                                <span >{{Helper::formatCurency($order->total)}}</span>
                                                            </td>
                                                            <td>
                                                                <span >{{$order->created_at}}</span>
                                                            </td>
                                                            <td>
                                                                <span class="{{$order->OrderStatuses->status == 4 ? 'red' : 'black'}} {{$order->OrderStatuses->status == 3 ? 'success' : ''}}">{{$order->OrderStatuses->statusName}}</span>
                                                            </td>
                                                            <td>
                                                                <a href="/thanh-vien/cart/{{$order->id}}" class="btn theme-bg btn-sm a-button-table ">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                               
                                            </tbody>
                                        </table>
                                        {{ $orders->links() }}

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
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">

<script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script>
<link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript">
   $('.birthday').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       format: 'dd/mm/yyyy' 
   });


</script>
<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>

<!-- Sweet Alerts js -->
<script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>



<script>
    
customInterpolationApp.controller('AppController', function($scope, $http , $q) {

});

</script>
@stop