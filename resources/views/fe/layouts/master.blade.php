<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">

    <link href="{{ asset('fe/assets/images/fvc.png') }}" type="img/x-icon" rel="shortcut icon">

    @yield('meta')
    @stack('before-styles')
    <link rel="stylesheet" href="{{ asset('fe/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/assets/css/iconfont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/assets/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/assets/css/style.css') }}">

    <script src="{{ asset('fe/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/angular.js') }}"></script>
    @stack('after-styles')
    @if (trim($__env->yieldContent('page-styles')))    
    @yield('page-styles')
    @endif    

<!-- Custom Css -->
</head>


<body ng-app="app-manager">

<div id="main-wrapper">
    @include('fe.layouts.sidebar')
    @yield('content')
    @include('fe.layouts.footer')

</div>
    
    
    <script src="{{ asset('fe/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('fe/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('fe/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fe/assets/js/plugins.js') }}"></script>
    
    <link href="{{ asset('js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alerts js -->
    <script src="{{ asset('js/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('js/pages/sweet-alerts.init.js') }}"></script>

    <script>
            var customInterpolationApp = angular.module('app-manager', []);

            customInterpolationApp.config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('((');
            $interpolateProvider.endSymbol('))');
            });
            
    </script>
    
    <!-- main jquery and bootstrap Scripts -->
    @stack('before-scripts')

    @stack('after-scripts')

    <!-- vendor js file -->
    @yield('vendor-script')

    <!-- project main Scripts js-->

    <!-- page Scripts ja -->
    @yield('page-script')
    @yield('script')
    
    @yield('scriptFooter')
    <script src="{{ asset('fe/assets/js/main.js') }}"></script>

    <script>
        $( document ).ready(function() {
            $('.parent-list').on('click',function () {
                $(this).toggleClass('active');
            });
        });
        
    </script>

    <script type="text/javascript">
            function getCart(){
                $.get( "/get-cart", function( data ) {
                    var htmlInner = '';
                    $("#countHeaderCart").html(data.count);
                    data.data.forEach(function(item){
                        var itemHtml = '<li class="single-cart-item">'
                        +'<div class="cart-img">'
                        +'<a href="/san-pham/'+item.data.product.slug+'.html" target="_blank"><img src="'+item.data.product.image+'" alt=""></a>'
                        +'</div>'
                        +'<div class="cart-content">'
                        +'<h5 class="product-name"><a href="single-product.html">'+item.data.product.name+ ' - Size : ' + item.data.size +'</a></h5>'
                        +'<span class="product-quantity">'+item.quality+' ×</span>'
                        +'<span class="product-price">'+item.price+'</span>'
                        +'</div>'
                        +'<div class="cart-item-remove">'
                        +'<a title="Remove" href="#" onclick="removeCart('+item.id+')"><i class="fa fa-trash"></i></a>'
                        +'</div>'
                        +'</li>';
                        htmlInner += itemHtml;
                    });
                    
                    $("#total-cart-top").html(data.total);
                    $("#cartTop").html(htmlInner);
                });

            }
            function removeCart(idCart) {
                Swal.fire({
                    title: "Xác Nhận",
                    text: "Bạn có muốn xóa sản phẩm này không?",
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
                        url: "/delete-cart/"+idCart,
                        type: 'GET',
                        dataType: 'json',
                        success: function(res) {
                            Swal.fire({
                                title: "Xóa sản phẩm thành cônng!"
                            });
                            getCart();
                        }
                    });

                })
                
            }
            $( document ).ready(function() {
                // getCart();
            });
        </script>
        <div class="zalo-chat-widget" data-oaid="1440710188472779045" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>

        <script src="https://sp.zalo.me/plugins/sdk.js"></script>

        <script>
            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="fb-customerchat"
            page_id="111673934066627"
            logged_in_greeting="How can we help you shop today?"
            logged_out_greeting="How can we help you shop today?"
            theme_color="#A3732C"
            size="standard ">
        </div>
            <style>
            .fb_dialog iframe, .fb-customerchat iframe{
                left: 0px !important;
                bottom: 75px !important;
            }
            .zalo-chat-widget {
                left: 7px !important;
                bottom: 10px !important;
            }
            </style>
    

    <!--End of Tawk.to Script-->

    </body>
</html>