<div id="preloader">
    <div class="loadingio-spinner-ripple-n04314c8ef9">
        <div class="ldio-r67ztvwtjg">
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<div id="back-to-top" class="d-flex align-items-center justify-content-center display-6">
    <img src="{{ asset('style_electronic/img/scroll.png') }} " />
</div>
<div class="content-custom while p-0 position-ab-0">
    <div class="wow animate__fadeInUp">
        <img src="{{ asset('style_electronic/img/icon-web-02.png') }}" class="image-touch" />
    </div>
</div>
<div class="bg-gradient-to-top ">
    <!-- ::::::::::: NAVBAR :::::::::::::::-->
    <div class="fixed-top  con-title">
        <div class="container menu-nav">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid p-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <a class="navbar-brand" href="/"><img src="{{ asset('style_electronic/img/logo_w.jpg') }}" alt="Landing Page" width="180"></a>
                    <div class="header-search navbar-text search-mobile">
                        <button class="header-search-toggle color-white"><i class="fa fa-search"></i></button>
                        <div class="header-search-form">
                            <form action="/san-pham/tat-ca.0" method="get" class="ng-pristine ng-valid">
                                <input type="text" name="name" placeholder="Tên sản phẩm">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        
                        <ul class="navbar-nav me-auto mx-auto list-group list-group-flush">
                            @foreach(Helper::first_function() as $category)
                                <li class="nav-item list-group-item list-menu-item">
                                    <a class="nav-link" href="{{@$category['url']}}">{{ @$category['name'] }}</a>
                                    @if ($category['childrent'] != null)
                                        <ul class="sub-menu-custom">
                                            @foreach($category['childrent'] as $child)
                                                <li class="child-menu-li">
                                                    <a class="nav-link color-black" href="{{@$child['url']}}">{{ @$child['name'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <div class="header-search navbar-text d-none d-lg-inline">
                            <button class="header-search-toggle color-white"><i class="fa fa-search"></i></button>
                            <div class="header-search-form">
                                <form action="/san-pham/tat-ca.0" method="get" class="ng-pristine ng-valid">
                                    <input type="text" name="name" placeholder="Tên sản phẩm">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        @if(@$product && @$product->name)
        <div class="container menu-nav-title">
            <nav class="navbar navbar-expand-lg navbar-light nav-title">
                <div class="container-fluid p-0">
                    <a class="navbar-brand logo-title-header" href="#">{{@$product->name}}</a>
                </div>
            </nav>
        </div>
        @endif

    </div>

    <!-- ::::::::::: /END INTRODUCTION ::::::::::-->
</div>