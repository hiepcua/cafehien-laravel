@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Liên Hệ')


@section('content')
<!-- Page Banner Section Start -->
<div class="page-banner-section section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h1>Liên Hệ</h1>
                            <ul class="page-breadcrumb">
                                <li><a href="/">Trang Chủ</a></li>
                                <li>Liên Hệ</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Contact Map section start-->
        <div class="contact-map-section section">
            <div id="contact-map" class="contact-map"></div>
        </div>
        <!--Contact Map section End-->
        
        <!--Contact section start-->
        <div class="conact-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
               
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="contact-information">
                            <h3>Về Chúng Tôi</h3>
                            <ul>
                                <li>
                                    <span class="icon"><i class="pe-7s-map"></i></span>
                                    <span class="text"><span>{{@Helper::getSocialLink(5)->value}}</span></span>
                                </li>
                                <li>
                                    <span class="icon"><i class="pe-7s-call"></i></span>
                                    <span class="text"><a href="#">{{@Helper::getSocialLink(1)->value}}</a></span>
                                </li>
                                <li>
                                    <span class="icon"><i class="pe-7s-mail-open"></i></span>
                                    <span class="text"><a href="#">{{@Helper::getSocialLink(2)->value}}</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="contact-form-wrap">
                            <h3 class="contact-title">Liên Hệ Với Chúng Tôi</h3>
                            <form id="contact-form" action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="con_name" placeholder="Họ*" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="lastname" placeholder="Tên*" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="con_email" placeholder="Email*" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="subject" placeholder="Tiêu Đề*" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-form-style">
                                            <textarea name="con_message" placeholder="Nhập nội dung.."></textarea>
                                            <button class="btn" type="submit"><span>Gửi</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--Contact section end-->

@stop

@section('script')
<script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
<script>
if($('.contact-map').length){
    function initialize() {
        var mapOptions = {
            zoom: 14,
            scrollwheel: false,
            center: new google.maps.LatLng({{@Helper::getSocialLink(12)->value}},{{@Helper::getSocialLink(11)->value}})
        };
        var map = new google.maps.Map(document.getElementById('contact-map'), mapOptions);
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            animation: google.maps.Animation.BOUNCE
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);
}
</script>
@stop