@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Liên Hệ')


@section('content')
<!-- Page Banner Section Start -->

        

        <!--Login Register section start-->
        <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                @if ( Session::has('success-logout') )
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <strong>{{ Session::get('success-logout') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                @endif
                @if ( Session::has('success') )
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                @endif
                @if ( Session::has('error') )
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>{{ Session::get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                        
                        <!--Login Form Start-->
                        <div class="col-md-12 col-sm-12">
                            <div class="customer-login-register">
                                <div class="form-login-title">
                                    <h2>Đăng Nhập</h2>
                                </div>
                                <div class="login-form">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="form-fild">
                                            <p><label>Email <span class="required">*</span></label></p>
                                            <input name="email" value="" type="email" required>
                                            <input name="type" value="1" type="hidden">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Mật Khẩu <span class="required">*</span></label></p>
                                            <input name="password" value="" type="password" required>
                                        </div>
                                        <div class="login-submit">
                                            <button type="submit" class="btn">Đăng Nhập</button>
                                            <!-- <label>
                                                <input class="checkbox" name="rememberme" value="" type="checkbox">
                                                <span>Remember me</span>
                                            </label> -->
                                        </div>
                                        <!-- <div class="lost-password">
                                            <a href="#">Lost your password?</a>
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Login Form End-->
                        <!--Register Form Start-->
                        <!-- <div class="col-md-6 col-sm-6">
                            <div class="customer-login-register register-pt-0">
                                <div class="form-register-title">
                                    <h2>Đăng Ký</h2>
                                </div>
                                <div class="register-form">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="form-fild">
                                            <p><label>Email <span class="required">*</span></label></p>
                                            <input name="email" value="{{@old('email')}}" type="email" required>
                                            <input name="type" value="2" type="hidden">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Password <span class="required">*</span></label></p>
                                            <input name="password" value="" type="password" required>
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Số Điện Thoại <span class="required">*</span></label></p>
                                            <input name="phone" value="{{@old('phone')}}" type="text" required>
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Họ Và Tên <span class="required">*</span></label></p>
                                            <input name="name" value="{{@old('name')}}" type="text" required>
                                        </div>
                                        <div class="register-submit">
                                            <button type="submit" class="btn">Đăng Ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <!--Register Form End-->
                    </div>            
            </div>
        </div>
        <!--Login Register section end-->
@stop

@section('script')

@stop