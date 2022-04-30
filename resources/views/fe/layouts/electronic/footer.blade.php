<div id="footer" class="pt-lg-5 p-5 text-center text-lg-start">
        <div class="container">
            <div class="row gy-4">
                <div class="col-sm-3">
                    <a href="#"><img src="{{ asset('fe/assets/images/cafenhien.png') }}" alt="Landing Page" width="160"></a>
                    <p class="accent-text-color font-size-14 pt-3">
                        {{@Helper::getSocialLink(9)->value}}
                    </p>
                </div>
                <div class="col-sm-3">
                    <h6 class="font-weight-semibold">SẢN PHẨM</h6>
                    <ul class="accent-text-color font-size-14 pt-3 list-unstyled">
                        @foreach(Helper::getListCateProduct() as $category)
                            <li><a href="{{@$category['url']}}" class="accent-text-color text-decoration-none">{{ @$category['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h6 class="font-weight-semibold">BÀI VIẾT</h6>
                    <ul class="accent-text-color font-size-14 pt-3 list-unstyled">
                        @foreach(Helper::getListCatePost() as $category)
                            <li><a href="{{@$category['url']}}" class="accent-text-color text-decoration-none">{{ @$category['name'] }}</a></li>

                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h6 class="font-weight-semibold">LIÊN HỆ</h6>
                    <ul class="accent-text-color font-size-14 pt-3 list-unstyled">
                        <li><a class="accent-text-color text-decoration-none">{{@Helper::getSocialLink(5)->value}}</a></li>
                        <li><a href="#" class="accent-text-color text-decoration-none">{{@Helper::getSocialLink(1)->value}}</a></li>
                        <li><a href="#" class="accent-text-color text-decoration-none">{{@Helper::getSocialLink(2)->value}}</a></li>
                    </ul>
                </div>
            </div>
            <hr class="hr">
            <div class="row gy-4 gy-lg-0 pb-5 pb-lg-4">
                <div class="col-sm-6 font-size-14 accent-text-color text-center text-lg-start">{{@Helper::getSocialLink(10)->value}}</div>

                <div class="col-sm-6 text-lg-end text-center">
                    <ul class="list-unstyled font-size-14 list-inline mb-0">
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="{{@Helper::getSocialLink(3)->value}}"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="{{@Helper::getSocialLink(4)->value}}"><i class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="{{@Helper::getSocialLink(6)->value}}"><i class="fa fa-youtube"></i></a></li>
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="{{@Helper::getSocialLink(7)->value}}"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="#"><i class="fa fa-vimeo"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
