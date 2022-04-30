<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\User;
use App\Models\Products;
use App\Models\Posts;
use App\Models\Banners;
use App\Models\Advertisements;
use DateTime;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    function index(Request $request){
        $baners = Banners::all();
        $productNewFeed = Products::orderBy("products.id" , "DESC")->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $productNewFeed = $productNewFeed->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $productNewFeed =  $productNewFeed->where('products.is_active','1')->where('products.is_active','1')->groupBy('products.id')->offset(0)->limit(4)->get();


        $productHotFeed =  Products::orderBy("id" , "DESC")->with("parent")->where('is_active','1')->where('is_hot','1')->offset(0)->limit(3)->get();

        $productNew = Products::orderBy("products.id" , "DESC")->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $productNew = $productNew->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $productNew =  $productNew->where('products.is_active','1')->groupBy('products.id')->offset(0)->limit(4)->get();

        $productHot = Products::orderBy("products.id" , "DESC")->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $productHot = $productHot->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $productHot =  $productHot->where('products.is_active','1')->where('products.is_hot','1')->groupBy('products.id')->offset(0)->limit(4)->get();

        $productSales = Products::orderBy("products.id" , "DESC")->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $productSales = $productSales->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $productSales =  $productSales->where('products.is_active','1')->where('product_options.sale_price', '!=','')->groupBy('products.id')->offset(0)->limit(4)->get();

        foreach($productNew as &$item){
            $item['percent'] =  round($item['sale_price'] * 100 / $item['price']);
            $item['pricenew'] =  $item['price'] - $item['sale_price'];
        }
        unset($item);

        foreach($productHot as &$item){
            $item['percent'] =  round($item['sale_price'] * 100 / $item['price']);
            $item['pricenew'] =  $item['price'] - $item['sale_price'];
        }
        unset($item);


        foreach($productSales as &$item){
            $item['percent'] =  round($item['sale_price'] * 100 / $item['price']);
            $item['pricenew'] =  $item['price'] - $item['sale_price'];
        }
        unset($item);
        $newsTop = Posts::orderBy("id" , "DESC")->where('is_active','1')->where('video_url',null)->where('category_id', '!=','2')->first();
        @$newsTop['created_at'] = date('d-m-Y',strtotime(@$newsTop['created_at']));

        $news = Posts::orderBy("id" , "DESC")->where('id','!=',@$newsTop['id'])->where('is_active','1')->where('category_id', '!=','2')->paginate(2);
        foreach ($news as &$item) {
            $item['created_at'] = date('d-m-Y',strtotime($item['created_at']));
        }
        unset($item);

        $popup = Posts::where('is_popup',1)->first();

        $adsHome1 = Advertisements::where('position','=','home-ads-1')->first();
        $adsHome2 = Advertisements::where('position','=','home-ads-2')->first();

        return view(
            'fe.home.index',
            compact([
                'newsTop',
                'baners',
                'popup',
                'productNewFeed',
                'productHotFeed',
                'productHot',
                'productSales',
                'productNew',
                'news',
                'adsHome1',
                'adsHome2'

            ])
        );
    }

}
