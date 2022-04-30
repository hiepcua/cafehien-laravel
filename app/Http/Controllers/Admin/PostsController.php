<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Posts;
use App\Models\PostImages;
use App\Models\PostCategories;
use App\Models\Categories;
use App\Models\ProductImages;
use App\Models\ProductOptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'posts';
        return view(
            'admin.posts.list',
            compact([
                'menu_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Posts::orderBy("id" , "DESC")->with('parent');
        if(@$request->title != '' ){
            $data = $data->where('title', 'like', '%'.$request->title.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        $message = [
            "message" => "",
            "status" => 0
        ];

        if ($request->isMethod('post')) {

            $flagKey = 0 ;

            if ($request->short_description == '') {
                $flagKey = 1 ;
                $message = [
                    "message" => "Vui lòng nhập nội dung ngắn.",
                    "status" => 2
                ];
            }

            if ($request->description == '') {
                $flagKey = 1 ;
                $message = [
                    "message" => "Vui lòng nhập nội dung.",
                    "status" => 2
                ];
            }

            if ($flagKey == 0) {
                $data = Posts::find($id);
                $data->is_active = $request->is_active ? 1 : 0;
                $data->title = $request->title ;
                $data->short_description = $request->short_description ;
                $data->description = $request->description ;
                $data->video_url = $request->video_url ;
                $data->image = $request->image ;
                $data->category_id = $request->category_id ;
                $data->updated_at = date("Y-m-d");
                $data->save();

                $dataImage = PostImages::where('post_id','=',$id)->delete();

                $listImage = $request->data['images'];
                if (is_array($listImage)) {
                    foreach ($listImage as $index => $image) {
                        if (null == $image) {
                            unset($listImage[$index]);
                        } else {
                            $newDataIamge = new PostImages();
                            $newDataIamge->post_id = $id;
                            $newDataIamge->image = $image;
                            $newDataIamge->save();
                        }
                    }
                }

                $message = [
                    "message" => "Thay đổi thông tin thành công.",
                    "status" => 1
                ];
            }
            
        }

        $data = Posts::find($id);
        $dataImagesFlag = PostImages::where('post_id','=',$id)->get();
        $dataImage = [];
        foreach ($dataImagesFlag as $item) {
            $dataImage[] = $item['image'];
        }
        if (! is_array($dataImage)) {
            $dataImage = array();
        }
        
        $dataImage = array_pad($dataImage, 50, null);
        $convertCate = [];
        $categorys = PostCategories::all();
        
        $menu_active = 'posts';
        return view(
            'admin.posts.edit',
            compact([
                'menu_active',
                'data',
                'dataImage',
                'categorys',
                'message',
                'id'
            ])
        );
    }

    function addData(Request $request) {
        try
        {
            $data = new Posts();
            $data->title = $request->title;
            $data->category_id = 1;
            $data->short_description = '&nbsp;';
            $data->description = '&nbsp;';
            $data->slug = $request->slug;
            $data->image = $request->image;
            $data->created_at = date("Y-m-d");
            $data->updated_at = date("Y-m-d");
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
        $data = Posts::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Danh Mục Thành Công."]);
    }

    function active(Request $request,$id) {
        $users = Posts::find($id);
        $users->is_active = 1 ;
        $users->save();
        return response()->json(['message'=>"Active Bài Viết Thành Công."]);
    }

    function deactive(Request $request,$id) {
        $users = Posts::find($id);
        $users->is_active = 0 ;
        $users->save();
        return response()->json(['message'=>"Deactive Bài Viết Thành Công."]);
    }

    function popup(Request $request,$id) {

        $data = Posts::where('is_popup',1)->get();
        foreach ($data as $key => $value) {
            $value->is_popup = 0;
            $value->save();
        }


        $users = Posts::find($id);
        $users->is_popup = 1 ;
        $users->save();
        return response()->json(['message'=>"Popup Bài Viết Thành Công."]);
    }

    function depopup(Request $request,$id) {
        $users = Posts::find($id);
        $users->is_popup = 0 ;
        $users->save();
        return response()->json(['message'=>"Depopup Bài Viết Thành Công."]);
    }

}
