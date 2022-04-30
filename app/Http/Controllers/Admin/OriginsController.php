<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Origins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OriginsController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'origins';
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.origins.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Origins::orderBy("id" , "DESC");
        if(@$request->name != '' ){
            $data = $data->where('origin', 'like', '%'.$request->name.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Origins::find($request->id);
        $data->origin = $request->name;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Origins();
        $data->origin = $request->name;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Origins::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Quốc Gia Thành Công."]);
    }

}
