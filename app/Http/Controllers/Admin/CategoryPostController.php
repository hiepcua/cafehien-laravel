<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\PostCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CategoryPostController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'categorys-post';
        return view(
            'admin.categorys-post.list',
            compact([
                'menu_active',
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = PostCategories::orderBy("id" , "DESC");
        if(@$request->category != '' ){
            $data = $data->where('category', 'like', '%'.$request->category.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = PostCategories::find($request->id);
        $data->category = $request->category;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new PostCategories();
        $data->category = $request->category;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = PostCategories::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Danh Mục Thành Công."]);
    }

}
