<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\User;
use App\Models\Products;
use App\Models\Posts;
use App\Models\PostCategories;
use App\Models\Provinces;
use App\Models\Partner;
use App\Models\PartnerStyle;
use Illuminate\Support\Facades\Auth;

use DateTime;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    function index(Request $request, $slug, $id){
        $news = Posts::orderBy("id" , "DESC")->where('category_id',$id)->where('is_active','1')->paginate(12);
        foreach ($news as &$item) {
            $item['created_at'] = date('d-m-Y',strtotime($item['created_at']));
        }
        unset($item);
        $category = PostCategories::find($id);
        
        return view(
            'fe.post.index',
            compact([
                'news',
                'category'
            ])
        );
    }
    function detail(Request $request, $slug){
        $news = Posts::orderBy("id" , "DESC");
        $news =  $news->where('is_active','1')->where('category_id','!=',2)->with('parent')->offset(0)->limit(3)->get();
        $message = '';
        $error = 0 ;
        foreach ($news as &$item) {
            $item['created_at'] = date('d-m-Y',strtotime($item['created_at']));
        }
        unset($item);
        $new = Posts::where('slug',$slug)->first();
        $new['created_at'] = date('d-m-Y',strtotime($new['created_at']));
        $categorys = PostCategories::where('id','!=',2)->get();

        $newsRelated = Posts::orderBy("id" , "DESC");
        $newsRelated =  $newsRelated->where('category_id',$new->parent->category_id)->where('id','!=', $new->id)->where('is_active','1')->with('parent')->offset(0)->limit(3)->get();
        foreach ($newsRelated as &$item) {
            $item['created_at'] = date('d-m-Y',strtotime($item['created_at']));
        }
        unset($item);
        if ($request->isMethod('post')) {
           
                $partnerNew = new Partner();
                $partnerNew->province_id = $request->province_id;
                // $partnerNew->user_id = Auth::guard('web')->user()->id;
                $partnerNew->partner_style = $request->partner_style;
                $partnerNew->name = $request->name;
                if ($request->male == 0) {
                    $partnerNew->male = 1;
                }
                if ($request->birthday != '') {
                    $request->birthday = \DateTime::createFromFormat('d/m/Y', $request->birthday);
                    $partnerNew->birthday =  $request->birthday->format('Y-m-d');
                }
                $partnerNew->ccid = $request->ccid;
                $partnerNew->address = $request->address;
                $partnerNew->phone = $request->phone;
                $partnerNew->email = $request->email;
                $partnerNew->note = $request->note;
                $partnerNew->updated_at = date("Y-m-d H:i:s");
                $partnerNew->created_at = date("Y-m-d H:i:s");
                $partnerNew->save();
                $message = 'Cảm Ơn Bạn Đã Gửi Yêu Cầu Đối Tác Cho Chúng Tôi. Vui Lòng Đợi Chúng Tôi Kiểm Duyệt Và Liên Hệ Cho Bạn Trong Thời Gian Sớm Nhất.';
                $error = 1 ;
        }
        $partnerStyle = PartnerStyle::all();
        $listProvinces = Provinces::all();

        $productHot = Products::orderBy("products.id" , "DESC")->leftJoin('product_options', 'products.id', '=', 'product_options.product_id');
        $productHot = $productHot->select('products.*','product_options.sale_price','product_options.price','product_options.size');
        $productHot =  $productHot->where('products.is_active','1')->where('products.is_hot','1')->groupBy('products.id')->offset(0)->limit(4)->get();

        foreach($productHot as &$item){
            $item['percent'] =  round($item['sale_price'] * 100 / $item['price']);
            $item['pricenew'] =  $item['price'] - $item['sale_price'];
        }
        unset($item);

        return view(
            'fe.post.detail',
            compact([
                'new',
                'productHot',
                'partnerStyle',
                'listProvinces',
                'news',
                'categorys',
                'newsRelated',
                'error',
                'message'
            ])
        );
    }
    
}
