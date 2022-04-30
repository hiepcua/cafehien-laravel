<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Advertisements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    private $limit = 20;
    function list(Request $request) {

        $menu_active = 'ads';
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.ads.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Advertisements::orderBy("id" , "DESC");
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Advertisements::find($request->id);
        $data->image = $request->image;
        $data->position = $request->position;
        $data->description = $request->description;
        $data->video = $request->video;
        $data->link = $request->link;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Advertisements();
        $data->image = $request->image;
        $data->position = $request->position;
        $data->description = $request->description;
        $data->video = $request->video;
        $data->link = $request->link;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Advertisements::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Quảng Cáo Thành Công."]);
    }

}
