<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\User;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductRatings;
use App\Models\ProductFaqs;
use App\Models\Categories;
use App\Models\ProductImages;
use App\Models\ProductOptions;
use App\Models\ProductRatingImages;

use App\Models\SalesOrder;
use App\Models\Posts;
use App\Models\Banners;
use App\Models\Advertisements;
use DateTime;
use App\Models\Provinces;

use App\Models\Promotions;
use Session;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;

class ProductsController extends Controller
{
    function index(Request $request, $slug, $id){
        $category = null ;
        $name = $request->name ? $request->name : '';

        $products = Products::orderBy("products.id" , "DESC");
        if ( $id != 0) {
            $category = Categories::find($id);
            $products = $products->where('category_id',$id);
        }
        if(@$request->name != '' ){
            $products = $products->where('name', 'like', '%'.$request->name.'%');
        }

        $products = $products->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $products = $products->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $products =  $products->where('products.is_active','1')->where('products.is_hot','1')->groupBy('products.id')->paginate(12);

        foreach ($products as &$item) {
            $item['created_at'] = date('d-m-Y',strtotime($item['created_at']));
            $item['percent'] =  round($item['sale_price'] * 100 / $item['price']);
            $item['pricenew'] =  $item['price'] - $item['sale_price'];
        }


        unset($item);
        $categorys = Categories::all();

        $productHot = Products::orderBy("products.id" , "DESC")->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $productHot = $productHot->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $productHot =  $productHot->where('products.is_active','1')->where('products.is_hot','1')->groupBy('products.id')->offset(0)->limit(4)->get();

        foreach($productHot as &$item){
            $item['percent'] =  round($item['sale_price'] * 100 / $item['price']);
            $item['pricenew'] =  $item['price'] - $item['sale_price'];
        }
        unset($item);

        return view(
            'fe.product.index',
            compact([
                'products',
                'productHot',
                'category',
                'categorys',
                'name'
            ])
        );
    }
    public function removeCart($id){
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
        return response()->json(['message' => "ok" ]);
    }
    public function getCart(){
        $cart = [];
        $cartProdctReturn = [];
        $errors = 0;
        $totalCart = 0;
        if(Session::get('cartNewInProject')){
            $cart = Session::get('cartNewInProject');
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
        return response()->json(['data' => $cartProdctReturn , 'count' => $count , 'total' => number_format($totalCart,  0, '', ',') . 'đ']);
    }
    function detail(Request $request, $slug){
        $product = Products::with('parent')->with('origins')->with('trademarks')->where('products.slug',$slug);
        $product = $product->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $product = $product->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $product =  $product->where('products.is_active','1')->where('products.is_hot','1')->groupBy('products.id')->first();

            $product['created_at'] = date('d-m-Y',strtotime($product['created_at']));
            $product['percent'] =  round($product['sale_price'] * 100 / $product['price']);
            $product['pricenew'] =  $product['price'] - $product['sale_price'];
        
        $message = '';
        $error = 0 ;
        $messageCart = '';
        $statusCart = 0 ;
        if ($request->isMethod('post')) {
            if($request->type == 2) {
                if(!Auth::guard('web')->user()) {
                    $message = 'Vui Lòng Đăng Nhập Để Bình Luận.';
                    $error = 2 ;
                } else {
                    $ratingNew = new ProductRatings();
                    $ratingNew->rating = $request->rating;
                    $ratingNew->user_id = Auth::guard('web')->user()->id;
                    $ratingNew->product_id = $product->id;
                    $ratingNew->comment = $request->message;
                    $ratingNew->updated_at = date("Y-m-d H:i:s");
                    $ratingNew->created_at = date("Y-m-d H:i:s");
                    $ratingNew->save();

                    
                    if($request->hasFile('files')) {
                        $allowedfileExtension=['jpg','png'];
                        $files = $request->file('files');
                        // flag xem có thực hiện lưu DB không. Mặc định là có
                        $exe_flg = true;
        
                        $target_dir = env('APP_URL_POST_FILE', 'public/uploads/avatar/');
                        $countFile = 0; 
                        // kiểm tra tất cả các files xem có đuôi mở rộng đúng không
                        foreach($files as $file) {
                            if ($countFile < 5) {
                                $countFile++;
                                $extension = $file->getClientOriginalExtension();
                                $target_file = $target_dir . Auth::guard('web')->user()->id . time() . basename($file->getClientOriginalName());
                                
                                $uploadOk = 1;
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                // Check if image file is a actual image or fake image
                                $check = getimagesize($file->getPathName());
                                if($check !== false) {
                                    $uploadOk = 1;
                                } else {
                                    $message = [
                                        "message" => "Comment phải là hình ảnh.",
                                        "status" => 2
                                    ];
                                    $uploadOk = 0;
                                }
                                if ( $uploadOk == 1) {
                                    if (move_uploaded_file($file->getPathName(), $target_file)) {
                                        $newImageRating = new ProductRatingImages();
                                        $newImageRating->images = '/'.$target_file;
                                        $newImageRating->product_rating_id = $ratingNew->id;
                                        $newImageRating->created_at = date("Y-m-d H:i:s");
                                        $newImageRating->save();
                                    } else {
                                        $message = [
                                            "message" => "Xin lỗi, đã xảy ra lỗi khi tải tệp của bạn lên.",
                                            "status" => 2
                                        ];
                                        echo "Sorry, there was an error uploading your file.";
                                    }
                                }
                            }
                            
                        } 
                    }
                    $message = 'Cảm Ơn Bạn Đã Đánh Giá Sản Phẩm. Cảm ơn.';
                    $error = 1 ;
    
                }
            } else if($request->type == 1) {
                
                if($request->code_sale) {
                    $discount_code = Promotions::where('promotion_code', @$request->code_sale)->first();
                    if(!$discount_code) {
                        $messageCart = 'Mã giảm giá không tồn tại';
                        $statusCart = 2 ;
                    } else {
                        $newOrders= new SalesOrder();
                        $newOrders->gift_code = @$request->code_sale;
                        $newOrders->name = @$request->name;
                        $newOrders->phone = @$request->phone;
                        $newOrders->address = @$request->address;
                        $newOrders->province_id =  @$request->province_id;
                        $newOrders->district_id =  @$request->district_id;
                        $newOrders->ward_id =  @$request->ward_id;
                        $newOrders->created_at = date('Y-m-d H:i:s');
                        $newOrders->updated_at = date('Y-m-d H:i:s');
                        $newOrders->product_id =  $product->id;
                        $newOrders->discount =  $discount_code->discount;
        
                        $newOrders->save();
                        $messageCart = 'Đơn hàng đã được gửi đi. Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất. Cảm ơn.';
                        $statusCart = 1 ;
                    }
                } else {
                    $newOrders= new SalesOrder();
                    $newOrders->gift_code = @$request->code_sale;
                    $newOrders->name = @$request->name;
                    $newOrders->phone = @$request->phone;
                    $newOrders->address = @$request->address;
                    $newOrders->province_id =  @$request->province_id;
                    $newOrders->district_id =  @$request->district_id;
                    $newOrders->ward_id =  @$request->ward_id;
                    $newOrders->created_at = date('Y-m-d H:i:s');
                    $newOrders->updated_at = date('Y-m-d H:i:s');
                    $newOrders->product_id =  $product->id;
                    $newOrders->discount =  '';
    
                    $newOrders->save();
                    $messageCart = 'Đơn hàng đã được gửi đi. Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất. Cảm ơn.';
                    $statusCart = 1 ;
                }
                
                
                
            }
            
            
        }
        
        $productImages = ProductImages::orderBy("id" , "DESC")->where("product_id",'=',$product->id)->get();


        $productRelate = Products::orderBy("products.id" , "DESC")->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $productRelate = $productRelate->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $productRelate =  $productRelate->where('products.is_active','1')->where('products.is_hot','1')->groupBy('products.id')->offset(0)->limit(8)->get();
        foreach($productRelate as &$item){
            $item['percent'] =  round($item['sale_price'] * 100 / $item['price']);
            $item['pricenew'] =  $item['price'] - $item['sale_price'];
        }
        unset($item);



        $productRating = ProductRatings::orderBy("id" , "DESC")->with("user")->where("product_id",'=',$product->id)->where('is_active',1)->get();
        foreach ($productRating as $key => &$value) {
            # code...
            $value['images'] = ProductRatingImages::where('product_rating_id',$value->id)->get();
        }
        unset($value);
        $productOption = ProductOptions::orderBy("id" , "DESC")->with("product")->where("product_id",'=',$product->id)->get();

        
        $listProvinces = Provinces::all();
        return view(
            'fe.product.detail',
            compact([
            'product',
            'productImages',
            'productRelate',
            'productRating',
            'error',
            'message',
            'productOption',
            'messageCart',
            'statusCart',
            'listProvinces'
            ])
        );
    }
    function checkCoupon(Request $request){
        $product = Products::with('parent')->with('origins')->with('trademarks')->where('products.id',@$request->id);
        $product = $product->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $product = $product->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $product =  $product->where('products.is_active','1')->where('products.is_hot','1')->groupBy('products.id')->first();
        $product['pricenew'] =  $product['price'] - $product['sale_price'];
        $message = [];
        $discount_code = Promotions::where('promotion_code', @$request->code_sale)->where('end_date', '>', now() )->first();
        $priceOld = Helper::formatCurency($product['pricenew']);
        $priceNew = '';
        if(!$discount_code) {
            $message['code'] = 2;
            $message['message'] = 'Mã giảm giá không tồn tại hoặc đã hết hạn.';
        } else {
            $priceNew =  Helper::formatCurency($product['pricenew'] * (100 - $discount_code->discount )/ 100);
            $message['code'] = 1;
            $message['message'] = '';
        }
        
        return response()->json(['message' => $message , 'priceOld' => $priceOld , 'priceNew' => $priceNew]);
    }
    function addToCartNew(Request $request){
        $message = [];
        if($request->code_sale) {
            $discount_code = Promotions::where('promotion_code', @$request->code_sale)->where('end_date', '>', now() )->first();
            if(!$discount_code) {
                $message['code'] = 2;
                $message['message'] = 'Mã giảm giá không tồn tại hoặc đã hết hạn.';
            } else {
                $newOrders= new SalesOrder();
                $newOrders->gift_code = @$request->code_sale;
                $newOrders->name = @$request->name;
                $newOrders->phone = @$request->phone;
                $newOrders->quantity = @$request->quantity;
                $newOrders->address = @$request->address;
                $newOrders->province_id =  @$request->province_id;
                $newOrders->district_id =  @$request->district_id;
                $newOrders->ward_id =  @$request->ward_id;
                $newOrders->created_at = date('Y-m-d H:i:s');
                $newOrders->updated_at = date('Y-m-d H:i:s');
                $newOrders->product_id =  $request->id;
                $newOrders->discount =  $discount_code->discount;

                $newOrders->save();
                $message['code'] = 1;
                $message['message'] = 'Đơn hàng đã được gửi đi. Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất. Cảm ơn.';
            }
        } else {
            $newOrders= new SalesOrder();
            $newOrders->gift_code = @$request->code_sale;
            $newOrders->name = @$request->name;
            $newOrders->phone = @$request->phone;
            $newOrders->address = @$request->address;
            $newOrders->province_id =  @$request->province_id;
            $newOrders->district_id =  @$request->district_id;
            $newOrders->ward_id =  @$request->ward_id;
            $newOrders->created_at = date('Y-m-d H:i:s');
            $newOrders->updated_at = date('Y-m-d H:i:s');
            $newOrders->product_id =  $request->id;
            $newOrders->discount =  '';
            $newOrders->quantity = @$request->quantity;
            $newOrders->save();
            $message['code'] = 1;
            $message['message'] = 'Đơn hàng đã được gửi đi. Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất. Cảm ơn.';
            $statusCart = 1 ;
        }
        
        return response()->json(['message' => $message]);
    }
    
}
