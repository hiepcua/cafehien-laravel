<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Banners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BannersController extends Controller
{
    private $limit = 20;
    function list(Request $request) {

        $menu_active = 'banners';
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.banners.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Banners::orderBy("id" , "DESC");
        if(@$request->text != '' ){
            $data = $data->where('text', 'like', '%'.$request->text.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        foreach($data as &$item){
            $item->type = $item->type."";
        }
        unset($item);
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Banners::find($request->id);
        $data->banner = $request->banner;
        $data->text = $request->text;
        $data->type = $request->type;
        $data->description = $request->description;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Banners();
        $data->banner = $request->banner;
        $data->text = $request->text;
        $data->type = $request->type;
        $data->description = $request->description;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Banners::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Banner Thành Công."]);
    }

}
