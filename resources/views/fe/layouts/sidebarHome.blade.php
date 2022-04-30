<header class="header header-transparent header-sticky">
    <div class="header-top bg-custom">
        <div class="container-fluid pl-75 pr-75 pl-lg-15 pr-lg-15 pl-md-15 pr-md-15 pl-sm-15 pr-sm-15 pl-xs-15 pr-xs-15">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 col-12 d-flex flex-wrap justify-content-center align-items-center logo_top">
                    <a href="/"><img class="logo_custome" src="{{ asset('fe/assets/images/cafenhien.png') }}" alt=""></a>
                </div>
                <div class="d-flex justify-content-end button-search">
                    <div class="header-search">
                        <button class="header-search-toggle color-white"><i class="fa fa-search"></i></button>
                        <div class="header-search-form">
                            <form action="/san-pham/tat-ca.0" method="get">
                                <input type="text" name="name" placeholder="Tên sản phẩm">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="header-cart color-white">
                        <div class="header-cart-dropdown">
                            <ul class="cart-items" id="cartTop">


                            </ul>
                            <div class="cart-total">
                                <h5>Tổng Cộng : <span class="float-right" id="total-cart-top">0</span></h5>
                                <h5>Subtotal :<span class="float-right">$39.79</span></h5>
                                <h5>Eco Tax (-2.00) :<span class="float-right">$7.00</span></h5>
                                <h5>VAT (20%) : <span class="float-right">$0.00</span></h5>
                                <h5>Total : <span class="float-right">$46.79</span></h5>
                            </div>
                            <div class="cart-btn">
                                <a href="/cart">Xem Giỏ Hàng</a>
                                <a href="/check-out">Thanh Toán</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="col-xl-6 col-lg-8 d-flex flex-wrap justify-content-lg-start justify-content-center align-items-center">
                    <div class="header-top-links color-white">
                        <ul>
                            <li><a href="#"><i class="fa fa-phone"></i>{{@Helper::getSocialLink(1)->value}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope-open-o"></i>{{@Helper::getSocialLink(2)->value}}</a></li>
                        </ul>
                    </div>
                    <div class="header-top-social color-white">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="{{@Helper::getSocialLink(3)->value}}"><i class="fa fa-facebook"></i></a>
                        <a href="{{@Helper::getSocialLink(4)->value}}"><i class="fa fa-google-plus"></i></a>
                        <a href="{{@Helper::getSocialLink(6)->value}}"><i class="fa fa-youtube"></i></a>
                        <a href="{{@Helper::getSocialLink(7)->value}}"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-vimeo"></i></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="ht-right d-flex justify-content-lg-end justify-content-center">
                        <ul class="ht-us-menu color-white d-flex">
                            <li>
                                @if(Auth::guard('web')->user())
                                    <a href="#"><i class="fa fa-user-circle-o"></i>{{Auth::guard('web')->user()->name}}</a>
                                    <ul class="ht-dropdown right">
                                        <li><a href="/thanh-vien/profile">Thông Tin</a></li>
                                        <li><a href="/thanh-vien/password">Mật Khẩu</a></li>
                                        <li><a href="/thanh-vien/cart">Đơn Hàng</a></li>
                                        <li><a href="/thanh-vien/address">Quản Lý Địa Chỉ</a></li>
                                        <li><a href="/thanh-vien/notify">Thông Báo<span>{{@Helper::getNotifyCount()}}</span></a></li>
                                        <li><a href="/logout">Đăng Xuất</a></li>
                                    </ul>
                                @else
                                    <a href="/dang-nhap?callback=/{{Request::path()}}"><i class="fa fa-user-circle-o"></i>Đăng Ký / Đăng Nhập</a>
                                @endif
                            </li>
                        </ul>
                        <ul class="ht-cr-menu color-white d-flex">
                            <li><a href="#">EUR</a>
                                <ul class="ht-dropdown width-20">
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><img src="assets/images/language/english.png" alt="">English2</a>
                                <ul class="ht-dropdown width-50">
                                    <li><a href="#"><img src="assets/images/language/english.png"
                                                alt="">English1</a></li>
                                    <li><a href="#"><img src="assets/images/language/english.png"
                                                alt="">English3</a></li>
                                    <li><a href="#"><img src="assets/images/language/english.png"
                                                alt="">English4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>

        </div>
    </div>
    <div class="menu-right  bg-custom">
        <div class="container">
            <div class="row align-items-center">

                <!--Logo start-->

                <!--Logo end-->
                <div class="col-lg-2 col-md-2 col-12 order-1 logo_scrool p-0">
                    <a href="/"><img class="logo_custome_scrool" src="{{ asset('fe/assets/images/cafenhien.png') }}" alt=""></a>
                </div>

                <!--Menu start-->
                <div class="col-lg-8 col-md-8 col-12 order-lg-2 order-md-2 order-2 d-flex menu_custome_pc justify-content-center menu-off">
                    <nav class="main-menu color-white">
                        <ul>
                            @foreach(Helper::first_function() as $category)
                                <li class="">
                                    <a href="{{@$category['url']}}">{{ @$category['name'] }}</a>
                                    @if ($category['childrent'] != null)
                                        <ul class="sub-menu">
                                            @foreach($category['childrent'] as $child)
                                                <li class="">
                                                    <a href="{{@$child['url']}}">{{ @$child['name'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>

                <div class="col-lg-2 col-md-2 col-12 order-3 logo_scrool p-0 btn_search_mobile j-end">
                    <button class="header-search-toggle color-white"><i class="fa fa-search"></i></button>
                    <div class="header-search-form">
                        <form action="/san-pham/tat-ca.0" method="get">
                            <input type="text" name="name" placeholder="Tên sản phẩm">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <!--Mobile Menu start-->
            <div class="row">
                <div class="col-12 d-flex d-lg-none d-block">
                    <div class="mobile-menu mean-container">
                        <div class="mean-bar">
                                <a href="#nav" class="meanmenu-reveal" style="background:;color:;right:0;left:auto;">
                                    <span class="menu-bar"></span>
                                </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--Mobile Menu end-->

        </div>
    </div>
</header>
<nav class="mean-nav">
    <ul>
        @foreach(Helper::first_function() as $category)
            <li class="">

                @if ($category['childrent'] != null)
                    <a class="mean-expand">{{ @$category['name'] }}</a>
                    <ul class="sub-menu-custom">
                        @foreach($category['childrent'] as $child)
                            <li class="">
                                <a href="{{@$child['url']}}">{{ @$child['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <a href="{{@$category['url']}}">{{ @$category['name'] }}</a>
                @endif
            </li>
        @endforeach
</nav>
