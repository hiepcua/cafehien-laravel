@extends('layout.authentication')
@section('title', 'Login')


@section('content')

    <div class="auth_brand">
        <a class="navbar-brand" href="/admin"><img src="{{ asset('assets/images/logo.svg') }}" width="300" class="d-inline-block align-top mr-2" alt=""></a>                                                
    </div>
    <div class="card">
        <div class="body">
        
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
            <form class="form-auth-small" action="{{route('post-login')}}" method="POST">
                @csrf
                <div class="form-group c_form_group">
                    <label>Tên Đăng Nhập</label>
                    <input type="text" class="form-control" name="email" placeholder="Tên Đăng Nhập" required>
                </div>
                <div class="form-group c_form_group">
                    <label>Mật Khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Mật Khẩu" required>
                </div>
                <!-- <div class="form-group clearfix">
                    <label class="fancy-checkbox element-left">
                        <input type="checkbox">
                        <span>Remember me</span>
                    </label>								
                </div> -->
                <button type="submit" class="btn btn-dark btn-lg btn-block" >LOGIN</button>
                <!-- <div class="bottom">
                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{route('authentication.forgotpassword')}}">Forgot password?</a></span>
                    <span>Don't have an account? <a href="{{route('authentication.register')}}">Register</a></span>
                </div> -->
            </form>
        </div>
    </div>

@stop
