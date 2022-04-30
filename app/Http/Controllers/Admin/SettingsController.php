<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'settings';
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.settings.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Settings::orderBy("id" , "DESC");
        if(@$request->name != '' ){
            $data = $data->where('name', 'like', '%'.$request->name.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Settings::find($request->id);
        $data->key = $request->key;
        $data->name = $request->name;
        $data->value = $request->value;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Settings();
        $data->key = $request->key;
        $data->name = $request->name;
        $data->value = $request->value;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Settings::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Cài Đặt Thành Công."]);
    }

}
