@extends('customer.main')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Mật Khẩu')


@section('content')

<ng-controller ng-controller="AppController as demo">
<div class="page-content">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf  
        <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <h3>
                <span class="hidden-320 ng-binding">Thay Đổi Mật Khẩu</span>
            </h3>
            <div class="toolbar">
                <button class="btn btn-success btn-primary" type="submit">
                    <i class="icon-save white"></i>
                    <span class="hidden-480">Chỉnh Sửa</span>
                </button>
            </div>
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
                                        <h5 class="widget-title ng-binding"><i class="icon-barcode"></i> Mật Khẩu</h5>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main row">
                                            <div class="form-group c_form_group col-lg-12 col-md-12 col-xs-12 relative ">
                                                <label>Mật khẩu hiện tại</label>
                                                <div class="input-group">
                                                    <input id="current-pwd" class="form-control" placeholder="Mật khẩu hiện tại" type="password" name="old_password" required>
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative ">
                                                <label>Mật khẩu mới</label>
                                                <div class="input-group">
                                                    <input class="form-control" id="new-pwd" placeholder="Mật khẩu mới" type="password" name="new_password" required>
                                                </div>
                                            </div>
                                            <div class="form-group c_form_group col-lg-6 col-md-12 col-xs-12 relative ">
                                                <label>Nhập lại mật khẩu</label>
                                                <div class="input-group">
                                                    <input class="form-control" id="confirm-pwd" placeholder="Nhập lại mật khẩu mới" type="password" name="renew_password" required>
                                                </div>
                                            </div>
                                            
                                        </div>
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


<script>
    
customInterpolationApp.controller('AppController', function($scope, $http , $q) {

});

</script>
@stop