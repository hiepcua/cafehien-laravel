<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderStatuses;
use App\Models\OrderDetails;

use App\User;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductRatings;
use App\Models\ProductFaqs;
use App\Models\Categories;
use App\Models\ProductImages;
use App\Models\ProductOptions;
use App\Models\Addresses;
use Session;
use App\Models\Deliveries;
use App\Models\Provinces;
use App\Models\Promotions;
use DateTime;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{
    
    
    public function checkOut(Request $request){
        
        if(!Auth::guard('web')->user()) {
            return redirect('/dang-nhap?callback=/check-out');
        }
        $message = [
            "message" => "",
            "status" => 0
        ];
        $listProvinces = Provinces::all();
        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        if ($request->isMethod('post')) {
            $erorrs_address = 0 ;
            $newOrders= new Orders();
            $newOrders->user_id = Auth::guard('web')->user()->id;
            if(@$request->create_address && @$request->create_address == 1) {
                if (@$request->name == '') {
                    $message['status'] == 2;
                    $message['message'] == "Tên không được để rỗng.";
                }
                if (@$request->phone == '') {
                    $message['status'] == 2;
                    $message['message'] == "Số điện thoại không được để rỗng.";
                }
                if (@$request->address == '') {
                    $message['status'] == 2;
                    $message['message'] == "Địa chỉ không được để rỗng.";
                }
                $address = Addresses::where('user_id',Auth::guard('web')->user()->id)->with('ward')->with('district')->with('province')->get();

                $newAddress = new Addresses();
                $newAddress->user_id = Auth::guard('web')->user()->id;
                $newAddress->province_id =  @$request->province_id;
                $newAddress->district_id =  @$request->district_id;
                $newAddress->ward_id =  @$request->ward_id;
                $newAddress->name =  @$request->name;
                $newAddress->phone =  @$request->phone;
                $newAddress->address =  @$request->address;
                if( count($address) > 0) {
                    $newAddress->is_default =  0;
                } else {
                    $newAddress->is_default =  1;
                }
                $newAddress->created_at = date('Y-m-d H:i:s');
                $newAddress->updated_at = date('Y-m-d H:i:s');
                $newAddress->save();

                $newOrders->name = @$request->name;
                $newOrders->phone = @$request->phone;
                $newOrders->address = @$request->address;
                $newOrders->province_id =  @$request->province_id;
                $newOrders->district_id =  @$request->district_id;
                $newOrders->ward_id =  @$request->ward_id;
            } else {
                if(!$request->address_old) {
                    $message['status'] == 2;
                    $message['message'] == "Chọn địa chỉ mặc định.";
                } else {
                    $addressDefault = Addresses::where('id',$request->address_old)->where('user_id',Auth::guard('web')->user()->id)->with('ward')->with('district')->with('province')->first();
                    $newOrders->name = @$addressDefault->name;
                    $newOrders->phone = @$addressDefault->phone;
                    $newOrders->address = @$addressDefault->address;
                    $newOrders->province_id =  @$addressDefault->province_id;
                    $newOrders->district_id =  @$addressDefault->district_id;
                    $newOrders->ward_id =  @$addressDefault->ward_id;
                }
            }
            if ($message['status'] != 2) {
                $newOrders->delivery_id = @$request->delivery_id;
                $newOrders->note = @$request->note;
                $newOrders->created_at = date('Y-m-d H:i:s');
                $newOrders->updated_at = date('Y-m-d H:i:s');

                $cart = [];
                $totalCart = 0;
                $couponPrice = 0;
                $userPrice = 0;
                $couponCode = '';
                if(Session::get('cartNewInProject')){
                    $cart = Session::get('cartNewInProject');
                }

                if(Session::get('couponCode')){
                    $couponCode = Session::get('couponCode');
                }
                $count = count($cart);
                foreach ($cart as $key => $value) {
                    $optionProperties = ProductOptions::with("product")->find($value['id']);
                    if($optionProperties){
                        $productProperties = ProductOptions::with("product")->find($optionProperties->id);
                        $dataPush = [
                            "id" => $value['id'],
                            "price" => number_format($optionProperties->price - $optionProperties->sale_price, 0, '', ',') . 'đ' ,
                            "total" =>  number_format(($optionProperties->price - $optionProperties->sale_price) * $value['quality'], 0, '', ',') . 'đ' , 
                            "quality" => $value['quality'] ,
                            "data" => $productProperties
                        ];
                        $totalCart += (($optionProperties->price - $optionProperties->sale_price) * $value['quality']);
                    }
                }
                $total = $totalCart;

                if($couponCode != '') {
                    $couponPrice = $total*$couponCode['parcent']/100;
                }
                $userPrice = $total*$user->level->discount/100;
                if($couponCode != ''){
                    $newOrders->promotion_code = @$couponCode['code'];
                    $newOrders->promotion_money = @$couponPrice;
                }
                $newOrders->sub_total = @$total;
                $newOrders->discount_money = @$userPrice;
                $newOrders->discount = @$user->level->discount;
                $deliveriesUsed = Deliveries::where('id', $request->delivery_id)->first();
                
                $newOrders->total = $total - $couponPrice - $userPrice + @$deliveriesUsed->price;
                $newOrders->save();
                $newOrders->qr_code = 'OD00'.$newOrders->id;
                $newOrders->save();

                $newOrstt = new OrderStatuses();
                $newOrstt->order_id = $newOrders->id;
                $newOrstt->created_at = date('Y-m-d H:i:s');
                $newOrstt->updated_at = date('Y-m-d H:i:s');
                $newOrstt->save();
                foreach ($cart as $key => $value) {
                    $optionProperties = ProductOptions::with("product")->find($value['id']);
                    if($optionProperties){
                        $dataPush = [
                            "id" => $value['id'],
                            "price" => number_format($optionProperties->price - $optionProperties->sale_price, 0, '', ',') . 'đ' ,
                            "total" =>  number_format(($optionProperties->price - $optionProperties->sale_price) * $value['quality'], 0, '', ',') . 'đ' , 
                            "quality" => $value['quality'] ,
                            "data" => $optionProperties
                        ];
                        $totalCart += (($optionProperties->price - $optionProperties->sale_price) * $value['quality']);
                        $orderDetailNew = new OrderDetails();
                        $orderDetailNew->order_id = $newOrders->id;
                        $orderDetailNew->product_id = $optionProperties->product_id;
                        $orderDetailNew->product_option_id = $optionProperties->id;
                        $orderDetailNew->price = $optionProperties->price - $optionProperties->sale_price;
                        $orderDetailNew->quantity = $value['quality'];
                        $orderDetailNew->discount_money = $optionProperties->sale_price;
                        $orderDetailNew->created_at = date('Y-m-d H:i:s');
                        $orderDetailNew->updated_at = date('Y-m-d H:i:s');
                        $orderDetailNew->save();
                    }
                }
                Session::put('couponCode', '');
                Session::put('cartNewInProject', '');
                return redirect('/thanh-vien/cart/'. $newOrders->id)->with('message-add','Giỏ hàng đã được gửi đến Shop. Vui lòng theo dõi tình trạng đơn hàng. Chúng tôi sẽ liên hệ với Quý khách thông qua số điện thoại. Cảm ơn!');
            }

            
        }
        $deliveries = Deliveries::all();
        $address = Addresses::where('user_id',Auth::guard('web')->user()->id)->with('ward')->with('district')->with('province')->get();
        
        
        $cart = [];
        $cartProdctReturn = [];
        $totalCart = 0;
        $couponPrice = 0;
        $userPrice = 0;
        $couponCode = '';
        if(Session::get('cartNewInProject')){
            $cart = Session::get('cartNewInProject');
        }

        if(Session::get('couponCode')){
            $couponCode = Session::get('couponCode');
        }
        $count = count($cart);
        if($count == 0){
            return redirect('/cart');
        }
        foreach ($cart as $key => $value) {
            $optionProperties = ProductOptions::with("product")->find($value['id']);
            if($optionProperties){
                $dataPush = [
                    "id" => $value['id'],
                    "price" => number_format($optionProperties->price - $optionProperties->sale_price, 0, '', ',') . 'đ' ,
                    "total" =>  number_format(($optionProperties->price - $optionProperties->sale_price) * $value['quality'], 0, '', ',') . 'đ' , 
                    "quality" => $value['quality'] ,
                    "data" => $optionProperties
                ];
                array_push($cartProdctReturn, $dataPush);
                $totalCart += (($optionProperties->price - $optionProperties->sale_price) * $value['quality']);
            }
        }
        $total = $totalCart;

        if($couponCode != '') {
            $couponPrice = $total*$couponCode['parcent']/100;
        }

        $userPrice = $total*$user->level->discount/100;

        return view(
            'fe.cart.check-out',
            compact([
                'cartProdctReturn',
                'count',
                'total',
                'couponPrice',
                'userPrice',
                'listProvinces',
                'deliveries',
                'address',
                'message'
            ])
        );

    }
    public function removeCart(Request $request,$id){
        $cart = [];
        $cartNew = [];
        if(Session::get('cartNewInProject')){
            $cart = Session::get('cartNewInProject');
        }
        $message = "";
        foreach ($cart as $key => $value) {
            if( $value['id'] != $id ){
                $prodctAdd = ["id" =>  $value['id'] , "quality" => $value['quality']];
                array_push($cartNew, $prodctAdd);
            }
        }
        Session::put('cartNewInProject', $cartNew);
        
        return redirect('/cart');
    }
    public function getCart(Request $request){
        $message = '';
        $error = 0 ;
        $messageCoupon = '';
        $errorCoupon = 0 ;
        if ($request->isMethod('post')) {
            $cartNew = [];
            foreach ($request->cart as $key => $value) {
                $prodctAdd = ["id" =>  $key , "quality" => $value];
                array_push($cartNew, $prodctAdd);
            }
            Session::put('cartNewInProject', $cartNew);
            $error = 1;
            $message = 'Cập nhật giỏ hàng thành công.';

            if(@$request->coupon && @$request->coupon != '') {
                    $coupon = Promotions::where('promotion_code','=',$request->coupon)->first();
                    if($coupon) {
                        $couponAdd = ["code" =>  $request->coupon , "parcent" => $coupon->discount];
                        Session::put('couponCode', $couponAdd);
                        $messageCoupon = 'Sử Dụng Mã Coupon Thành Công.';
                        $errorCoupon = 1 ;
                    } else {
                        $messageCoupon = 'Mã Coupon Không Tồn Tại.';
                        $errorCoupon = 2 ;
                    }   
                    $error = 0;
                    $message = '';
            }
        }
        $cart = [];
        $cartProdctReturn = [];
        $errors = 0;
        $totalCart = 0;
        $couponPrice = 0;
        $couponCode = '';
        if(Session::get('cartNewInProject')){
            $cart = Session::get('cartNewInProject');
        }

        if(Session::get('couponCode')){
            $couponCode = Session::get('couponCode');
        }
        $count = count($cart);
        foreach ($cart as $key => $value) {
            $optionProperties = ProductOptions::with("product")->find($value['id']);
            if($optionProperties){
                $productProperties = ProductOptions::with("product")->find($optionProperties->id);
                $dataPush = [
                    "id" => $value['id'],
                    "price" => number_format($optionProperties->price - $optionProperties->sale_price, 0, '', ',') . 'đ' ,
                    "total" =>  number_format(($optionProperties->price - $optionProperties->sale_price) * $value['quality'], 0, '', ',') . 'đ' , 
                    "quality" => $value['quality'] ,
                    "data" => $productProperties
                ];
                array_push($cartProdctReturn, $dataPush);
                $totalCart += (($optionProperties->price - $optionProperties->sale_price) * $value['quality']);
            }
        }
        $total = $totalCart;

        if($couponCode != '') {
            $couponPrice = $total*$couponCode['parcent']/100;
        }
        return view(
            'fe.cart.index',
            compact([
                'cartProdctReturn',
                'count',
                'total',
                'couponPrice',
                'message',
                'error',
                'messageCoupon',
                'errorCoupon'
            ])
        );
    }
    
}
