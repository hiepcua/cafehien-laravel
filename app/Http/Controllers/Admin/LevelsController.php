<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Levels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LevelsController extends Controller
{
    private $limit = 20;
    function list(Request $request) {

        $menu_active = 'levels';
        return view(
            'admin.levels.list',
            compact([
                'menu_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Levels::orderBy("id" , "DESC");
        if(@$request->level != '' ){
            $data = $data->where('level', 'like', '%'.$request->level.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Levels::find($request->id);
        $data->level = $request->level;
        $data->discount = $request->discount;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Levels();
        
        $data->level = $request->level;
        $data->discount = $request->discount;
        
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Levels::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Cấp Bậc Thành Công."]);
    }

}
