<?php
namespace App\Helpers;
use App\Models\PostCategories;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\Advertisements;
use App\Models\Settings;
use App\Models\ProductRatings;
use App\Models\Notifications;
use App\Models\Provinces;
use Illuminate\Support\Facades\Auth;
class Helper
{
    public static function convertSlug($title) {
        $replacement = '-';
        $map = array();
        $quotedReplacement = preg_quote($replacement, '/');
        $default = array(
            '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
            '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
            '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
            '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
            '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
            '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
            '/đ|Đ/' => 'd',
            '/ç/' => 'c',
            '/ñ/' => 'n',
            '/ä|æ/' => 'ae',
            '/ö/' => 'oe',
            '/ü/' => 'ue',
            '/Ä/' => 'Ae',
            '/Ü/' => 'Ue',
            '/Ö/' => 'Oe',
            '/ß/' => 'ss',
            '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
            '/\\s+/' => $replacement,
            sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
        );
        //Some URL was encode, decode first
        $title = urldecode($title);
        $map = array_merge($map, $default);
        return strtolower(preg_replace(array_keys($map), array_values($map), $title));
    }
    public static function getdistrict() {
        $listProvinces = Provinces::all();
        return $listProvinces;
    }
    public static function first_function()
    {
        $listMenu = [];
        $listCategoryPost = PostCategories::orderBy("id" , "DESC")->where('id','!=',2)->get();
        $listCategoryProduct = Categories::orderBy("id" , "DESC")->get();

        // $listMenu['home'] = ["url" => "/", "name" => "Trang Chủ", 'active' => 'home', 'childrent' => null ];
        $listMenu['product'] = ["url" => "/san-pham/tat-ca.0", "name" => "Sản Phẩm", 'active' => 'product', 'childrent' => null ];
        $listMenu['aboutus'] = ["url" => "/bai-viet/gioi-thieu.html", "name" => "Giới Thiệu", 'active' => 'home', 'childrent' => null ];
        
        foreach ($listCategoryProduct as $item) {
            $listMenu['product']['childrent'][] = ["url" => "/san-pham/". Helper::convertSlug($item->category).'.'.$item->id, "name" => $item->category, 'active' => 'product', 'childrent' => null ];
        }
        $listMenu['partner'] = ["url" => "/bai-viet/doi-tac.html", "name" => "Đối Tác", 'active' => 'home', 'childrent' => null ];
        foreach ($listCategoryPost as $item) {
            $slug = Helper::convertSlug($item->category);
            $listMenu[$slug] = ["url" => "/bai-viet/". $slug.'.'.$item->id, "name" => $item->category, 'active' => $slug, 'childrent' => null ];
        }
        // $listMenu['sales'] = ["url" => "/ma-khuyen-mai.html", "name" => "Mã Khuyến Mãi", 'active' => 'sales', 'childrent' => null];
        $listMenu['contact'] = ["url" => "/lien-he", "name" => "Liên Hệ", 'active' => 'contact', 'childrent' => null];
        

        return $listMenu;
    }

    public static function getSocialLink($id)
    {
        $item = Settings::find($id);
        return $item;
    }
    public static function getNewsPopup()
    {
        $item = Posts::where('is_popup',1)->first();
        return $item;
    }

    public static function getListCatePost()
    {
        $listCategoryPost = PostCategories::orderBy("id" , "DESC")->where('id','!=',2)->get();
        $listMenu = [];
        foreach ($listCategoryPost as $item) {
            $slug = Helper::convertSlug($item->category);
            $listMenu[] = ["url" => "/bai-viet/". $slug.'.'.$item->id, "name" => $item->category, 'active' => $slug, 'childrent' => null ];
        }
        return $listMenu;
    }

    public static function getListCateProduct()
    {
        $listCategoryProduct = Categories::orderBy("id" , "DESC")->get();
        $listMenu = [];
        foreach ($listCategoryProduct as $item) {
            $listMenu[] = ["url" => "/san-pham/". Helper::convertSlug($item->category).'.'.$item->id, "name" => $item->category, 'active' => 'product', 'childrent' => null ];
        }
        return $listMenu;
    }
    public static function formatCurency($price)
    {
        return number_format($price, 0, '', ',') . 'đ';
    }
    public static function getRatingProduct($id)
    {
        $ratings = ProductRatings::where('product_id',$id)->where('is_active',1)->get();
        $count = 0;
        foreach($ratings as $rating) {
            $count += $rating->rating;
        }
        if($count != 0) {
            $count = round($count/count($ratings));
        }else{
            $count = 1;
        }
        
        return $count;
    }

    public static function getNotifyCount()
    {

        $id = 0 ;
        if(Auth::guard('web')->user()) {
            $id = Auth::guard('web')->user()->id ;
        }
        $notify = Notifications::where('user_id',$id)->where('is_read',0)->get();
        $count = count($notify);
        
        return $count;
    }
    
    public static function getADSRight(){
        $ads = Advertisements::where('position','=','right-menu')->get();
        return $ads;
    }

    
    

}