<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Products;
use App\Models\ProductRatings;
use App\Models\ProductFaqs;
use App\Models\Categories;
use App\Models\ProductImages;
use App\Models\ProductOptions;
use App\Models\Origins;
use App\Models\Trademarks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductRatingImages;
use App\Models\ProductNotifies;

class ProductsController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'products';
        return view(
            'admin.products.list',
            compact([
                'menu_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Products::orderBy("id" , "DESC")->with("parent");
        if(@$request->name != '' ){
            $data = $data->where('name', 'like', '%'.$request->name.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function getListComment(Request $request,$id) {
        $page = $request->page - 1;
        $data = ProductRatings::orderBy("id" , "DESC")->where('product_id','=',$id)->with('user');
        $count = $data->count();
        $data = $data->get();

        foreach ($data as &$item) {
            if ($item->created_at != '') {
                $item->created_at = date("d/m/Y H:i:s", strtotime($item->created_at) );
            }
            $listImage =  ProductRatingImages::where('product_rating_id',$item->id)->get();
            if(count($listImage) > 0) {
                $item->images = $listImage;
            } else {
                $item->images = [];
            }
        }
        unset($item);
        return response()->json(['data'=>$data,'count'=>$count]);
    }
    function deleteComment(Request $request,$id) {
        $data = ProductRatings::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Comment Thành Công."]);
    }

    function activeComment(Request $request,$id) {
        $users = ProductRatings::find($id);
        $users->is_active = 1 ;
        $users->save();
        return response()->json(['message'=>"Active Comment Thành Công."]);
    }

    function deactiveComment(Request $request,$id) {
        $users = ProductRatings::find($id);
        $users->is_active = 0 ;
        $users->save();
        return response()->json(['message'=>"Deactive Comment Thành Công."]);
    }


    function getListFaq(Request $request,$id) {
        $page = $request->page - 1;
        $data = ProductFaqs::orderBy("id" , "DESC")->where('product_id','=',$id)->with('user');
        $count = $data->count();
        $data = $data->get();

        foreach ($data as &$item) {
            if ($item->created_at != '') {
                $item->created_at = date("d/m/Y H:i:s", strtotime($item->created_at) );
            }
        }
        unset($item);
        return response()->json(['data'=>$data,'count'=>$count]);
    }
    function deleteFaq(Request $request,$id) {
        $data = ProductFaqs::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa FAQ Thành Công."]);
    }

    function answerFAQ(Request $request,$id) {
        $users = ProductFaqs::find($id);
        $users->answer = $request->answer ;
        $users->save();
        return response()->json(['message'=>"Active Faq Thành Công."]);
    }

    function activeFAQ(Request $request,$id) {
        $users = ProductFaqs::find($id);
        $users->status = 1 ;
        $users->save();
        return response()->json(['message'=>"Active Faq Thành Công."]);
    }

    function deactiveFAQ(Request $request,$id) {
        $users = ProductFaqs::find($id);
        $users->status = 0 ;
        $users->save();
        return response()->json(['message'=>"Deactive Faq Thành Công."]);
    }


    function getListOption(Request $request,$id) {
        $page = $request->page - 1;
        $data = ProductOptions::orderBy("id" , "DESC")->where('product_id','=',$id);
        $count = $data->count();
        $data = $data->get();
        
        return response()->json(['data'=>$data,'count'=>$count]);
    }
    function deleteOption(Request $request,$id) {
        $data = ProductOptions::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Thuộc Tính Thành Công."]);
    }

    function updateOption(Request $request,$id) {
        $users = ProductOptions::find($id);
        $users->size = $request->size ;
        $users->color = $request->color ;
        $users->material = $request->material ;
        $users->price = $request->price ;
        $users->sale_price = $request->sale_price ;
        $users->save();
        return response()->json(['message'=>"Thay đổi thuộc tính thành công."]);
    }
    function addOption(Request $request) {
        $users = new ProductOptions();
        $users->size = $request->size ;
        $users->product_id = $request->product_id ;
        $users->color = $request->color ;
        $users->material = $request->material ;
        $users->price = $request->price ;
        $users->quantity = 0 ;
        $users->sale_price = $request->sale_price ;
        $users->save();
        return response()->json(['message'=>"Thêm thuộc tính thành công."]);
    }

    
    function getListNotify(Request $request,$id) {
        $page = $request->page - 1;
        $data = ProductNotifies::orderBy("id" , "DESC")->where('product_id','=',$id);
        $count = $data->count();
        $data = $data->get();
        
        return response()->json(['data'=>$data,'count'=>$count]);
    }
    function deleteNotify(Request $request,$id) {
        $data = ProductNotifies::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Thuộc Tính Thành Công."]);
    }

    function updateNotify(Request $request,$id) {
        $users = ProductNotifies::find($id);
        $users->time_push = $request->time_push ;
        $users->title = $request->title ;
        $users->description = $request->description ;
        $users->save();
        return response()->json(['message'=>"Thay đổi thông báo thành công."]);
    }
    function addNotify(Request $request) {
        $users = new ProductNotifies();
        $users->product_id = $request->product_id ;
        $users->time_push = $request->time_push ;
        $users->title = $request->title ;
        $users->description = $request->description ;
        $users->save();
        return response()->json(['message'=>"Thêm thông báo thành công."]);
    }
    function edit(Request $request,$id) {
        $message = [
            "message" => "",
            "status" => 0
        ];

        if ($request->isMethod('post')) {

            $data = Products::find($id);
            $data->is_hot = $request->is_hot ? 1 : 0; 
            $data->name = $request->name ;
            $data->short_description = $request->short_description ;
            $data->description = $request->description ;
            $data->manuals = $request->manuals ;
            $data->origin_id = $request->origin_id ;
            $data->trademark_id = $request->trademark_id ;
            $data->sku = $request->sku ;
            $data->image = $request->image ;
            $data->image_16_9 = $request->image_16_9 ;
            $data->category_id = $request->category_id ;
            $data->updated_at = date("Y-m-d");
            $data->save();

            $dataImage = ProductImages::where('product_id','=',$id)->delete();
            $listImage = $request->data['images'];
            if (is_array($listImage)) {
                foreach ($listImage as $index => $image) {
                    if (null == $image) {
                        unset($listImage[$index]);
                    } else {
                        $newDataIamge = new ProductImages();
                        $newDataIamge->product_id = $id;
                        $newDataIamge->image = $image;
                        $newDataIamge->save();
                    }
                }
            }

            $dataImage = ProductImages::where('product_id','=',$id)->get();
            $dataOption = ProductOptions::where('product_id','=',$id)->get();
    
            if ( (count($dataImage) == 0 || count($dataOption) == 0) && $request->is_active) {
                $message = [
                    "message" => "Vui lòng cập nhật hình ảnh và thuộc tính sản phẩn trước khi hiển thị sản phẩm.",
                    "status" => 2
                ];
            } else {
               
                
                $data->is_active = $request->is_active ? 1 : 0;
                $message = [
                    "message" => "Thay đổi thông tin thành công.",
                    "status" => 1
                ];
                $data->save();
            }   
            

            
            
        }

        $data = Products::find($id);
        $dataImagesFlag = ProductImages::where('product_id','=',$id)->get();
        $dataImage = [];
        foreach ($dataImagesFlag as $item) {
            $dataImage[] = $item['image'];
        }
        if (! is_array($dataImage)) {
            $dataImage = array();
        }
        
        $dataImage = array_pad($dataImage, 50, null);
        $convertCate = [];
        $categorys = Categories::where('category_id','=',null)->get();
        $origins = Origins::all();
        $trademarks = Trademarks::all();

        foreach($categorys as $itemCate) {
            $convertCate[] = $itemCate ;
            $categorysChild = Categories::where('category_id','=',$itemCate->id)->get();
            foreach ($categorysChild as $itemChild) {
                $itemChild->category = '--'.$itemChild->category;
                $convertCate[] = $itemChild ;
            }
        }

        $categorys = $convertCate;
        
        $menu_active = 'products';
        //  echo "<pre>";
        //  print_r($totalPage);die;
        return view(
            'admin.products.edit',
            compact([
                'menu_active',
                'data',
                'dataImage',
                'categorys',
                'message',
                'id',
                'origins',
                'trademarks'
            ])
        );
    }

    function addData(Request $request) {
        try
        {
            $data = new Products();
            $data->name = $request->name;
            $data->slug = $request->slug;
            $data->sku = $request->sku;
            $data->image = $request->image;
            $data->created_at = date("Y-m-d");
            $data->updated_at = date("Y-m-d");
            $data->is_hot = 0;
            $data->is_active = 0;
            $data->save();
            return response()->json(['data'=>$data , 'errors' => 0]);
        }
        catch (\Exception $exception)
        {
            // return $exception->getMessage();
            return response()->json(['data'=>$exception->getMessage() , 'errors' => 1]);
        }
        
    }

    function delete(Request $request,$id) {
        
        
        $pRa = ProductRatings::where('product_id',$id)->get();
        foreach($pRa as $item){
            ProductRatingImages::where('product_rating_id', $item->id)->delete();
            $item->delete();
        }

        
        $data = Products::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Danh Mục Thành Công."]);
    }

    function active(Request $request,$id) {

        $dataImage = ProductImages::where('product_id','=',$id)->get();
        $dataOption = ProductOptions::where('product_id','=',$id)->get();

        if (count($dataImage) == 0 || count($dataOption) == 0) {
            return response()->json(['message'=>"Thiếu dữ liệu.",'error' => 1]);
        }   
        $users = Products::find($id);
        $users->is_active = 1 ;
        $users->save();
        return response()->json(['message'=>"Active Sản Phẩm Thành Công."]);
    }

    function deactive(Request $request,$id) {
        $users = Products::find($id);
        $users->is_active = 0 ;
        $users->save();
        return response()->json(['message'=>"Deactive Sản Phẩm Thành Công."]);
    }

    function activeHot(Request $request,$id) {
        $users = Products::find($id);
        $users->is_hot = 1 ;
        $users->save();
        return response()->json(['message'=>"Active Hot Sản Phẩm Thành Công."]);
    }

    function deactiveHot(Request $request,$id) {
        $users = Products::find($id);
        $users->is_hot = 0 ;
        $users->save();
        return response()->json(['message'=>"Deactive Hot Sản Phẩm Thành Công."]);
    }

}
