<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\User;
use App\Models\Products;
use App\Models\Posts;
use App\Models\Banners;
use App\Models\Advertisements;
use DateTime;
use App\Models\Provinces;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    
    function index(Request $request){
        $message = [];
        $error = 0 ;
        if ($request->isMethod('post')) {
            $newOrders= new SalesOrder();

            $newOrders->gift_code = @$request->gift_code;
            $newOrders->name = @$request->name;
            $newOrders->phone = @$request->phone;
            $newOrders->address = @$request->address;
            $newOrders->province_id =  @$request->province_id;
            $newOrders->district_id =  @$request->district_id;
            $newOrders->ward_id =  @$request->ward_id;
            $newOrders->created_at = date('Y-m-d H:i:s');
            $newOrders->updated_at = date('Y-m-d H:i:s');
            $newOrders->save();
            $message = 'Cảm Ơn Bạn Đã Gửi Mã Khuyến Mãi Cho Chúng Tôi. Vui Lòng Đợi Chúng Tôi Kiểm Duyệt Và Liên Hệ Cho Bạn Trong Thời Gian Sớm Nhất.';
            $error = 1 ;
        } 
        $productHot = Products::orderBy("products.id" , "DESC")->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $productHot = $productHot->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $productHot =  $productHot->where('products.is_active','1')->where('products.is_hot','1')->groupBy('products.id')->offset(0)->limit(4)->get();

        foreach($productHot as &$item){
            $item['percent'] =  round($item['sale_price'] * 100 / $item['price']);
            $item['pricenew'] =  $item['price'] - $item['sale_price'];
        }
        unset($item);
        $listProvinces = Provinces::all();

        return view(
            'fe.sale.index',
            compact([ 'error' , 'message' , 'productHot',
            'listProvinces'])
        );
    }

}
