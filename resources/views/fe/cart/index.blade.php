@extends('fe.layouts.master')

@section('parentPageTitle', 'Trang Chủ')
@section('title', 'Giỏ Hàng')


@section('content')

        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h1>Giỏ Hàng</h1>
                            <ul class="page-breadcrumb">
                                <li><a href="/">Trang Chủ</a></li>
                                <li>Giỏ Hàng</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!--Cart section start-->
        <div class="cart-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                    @csrf
                        <div class="col-12">            
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb-30">
                                @if ( @$error == 1 )
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>{{  $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                @endif
                                @if ( @$error === 2 )
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>{{  $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Hình Ảnh</th>
                                            <th class="pro-title">Tên Sản Phẩm</th>
                                            <th class="pro-title">Thuộc Tính</th>
                                            <th class="pro-price">Giá Tiền</th>
                                            <th class="pro-quantity">Số Lượng</th>
                                            <th class="pro-subtotal">Tổng Cộng</th>
                                            <th class="pro-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartProdctReturn as $key => $item )
                                            <tr>
                                                <td class="pro-thumbnail">
                                                    <a target="_blank" href="/san-pham/{{$item['data']->product->slug}}.html">
                                                        <img src="{{$item['data']->product->image}}" alt="{{$item['data']->product->name}}">
                                                    </a>
                                                </td>
                                                <td class="pro-title">
                                                    <a href="/san-pham/{{$item['data']->product->slug}}.html" target="_blank">{{$item['data']->product->name}}</a>
                                                </td>
                                                <td class="pro-price"><span>
                                                    {!! $item['data']->size ? 'Size : '.$item['data']->size .'<br/>' : '' !!}
                                                    {!! $item['data']->color ? 'Màu : '.$item['data']->color .'<br/>': '' !!} 
                                                    {!! $item['data']->material ? 'Thành Phần : '.$item['data']->material .'<br/>' : '' !!}
                                                </span></td>
                                                <td class="pro-title">
                                                    <span>
                                                        <span>{{Helper::formatCurency($item['data']->price - $item['data']->sale_price )}}</span> 
                                                        @if ($item['data']->sale_price != '' || $item['data']->sale_price != 0)
                                                        <del>{{Helper::formatCurency($item['data']->price )}}</del>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="pro-quantity"><div class="pro-qty"><input type="number" name="cart[{{$item['id']}}]" value="{{$item['quality']}}"></div></td>
                                                <td class="pro-subtotal"><span>{{Helper::formatCurency(($item['data']->price - $item['data']->sale_price ) * $item['quality'])}}</span></td>
                                                <td class="pro-remove"><a href="#" onclick="removeProductPage({{$item['id']}});"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        @endforeach
                                        @if(count($cartProdctReturn) == 0)
                                        <tr>
                                            <td colspan="7">Không có sản phẩm trong giỏ hàng.</td>
                                        </tr>   
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if(count($cartProdctReturn) > 0)
                            <div class="row">

                                <div class="col-lg-6 col-12 mb-5">
                                    <!-- Discount Coupon -->
                                    <div class="discount-coupon">
                                        <h4>Mã Giảm Giá</h4>
                                        @if ( @$errorCoupon == 1 )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <strong>{{  $messageCoupon }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if ( @$errorCoupon === 2 )
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <strong>{{  $messageCoupon }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                        @endif
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6 col-12 mb-25">
                                                    <input type="text" name="coupon" placeholder="Coupon Code">
                                                </div>
                                                <div class="col-md-6 col-12 mb-25">
                                                    <button class="btn" type="submit">Sử Dụng Mã Giảm Giá</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Cart Summary -->
                                <div class="col-lg-6 col-12 mb-30 d-flex">
                                    <div class="cart-summary">
                                        <div class="cart-summary-wrap">
                                            <h4>Đơn Hàng</h4>
                                            <p>Tiền Hàng<span>{{Helper::formatCurency($total)}}</span></p>
                                            <p>Giảm Giá <span>- {{Helper::formatCurency($couponPrice)}}</span></p>
                                            <h2>Tổng Cộng <span>{{Helper::formatCurency($total-$couponPrice)}}</span></h2>
                                        </div>
                                        <div class="cart-summary-button">
                                            <a class="btn" href="/check-out">Thanh Toán</a>
                                            <button class="btn" type="submit" style="margin-top: 0px;">Cập Nhật</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @else
                                <div class="cart-summary-button">
                                    <a class="btn" href="/san-pham/tat-ca.0">Tiếp tục mua hàng</a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>            
            </div>
        </div>
        <!--Cart section end-->



@stop

@section('script')

<script>
    function removeProductPage(idCart) {
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
                            window.location.replace("/cart");
                        }
                    });

                })
                
            }
</script>

@stop