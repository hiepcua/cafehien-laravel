<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CategorysController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $parent = Categories::all();

        $menu_active = 'categorys';
        //  echo "<pre>";
        //  print_r($totalPage);die;
        return view(
            'admin.categorys.list',
            compact([
                'menu_active',
                'parent'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Categories::orderBy("id" , "DESC")->with('parent');
        if(@$request->category != '' ){
            $data = $data->where('category', 'like', '%'.$request->category.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Categories::find($request->id);
        if ($request->category_id != '') {
            $data->category_id = $request->category_id;
        } else {
            $data->category_id = null;
        }
        $data->category = $request->category;
        $data->icon = $request->icon;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Categories();
        if ($request->category_id != '') {
            $data->category_id = $request->category_id;
        } else {
            $data->category_id = null;
        }
        $data->category = $request->category;
        $data->icon = $request->icon;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Categories::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Danh Mục Thành Công."]);
    }

}
