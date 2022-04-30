<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\PartnerStyle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PartnerStyleController extends Controller
{
    private $limit = 20;
    function list(Request $request) {

        $menu_active = 'partnerstyle';
        $menu_parent_active = 'partner';
        return view(
            'admin.partner.groups',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = PartnerStyle::orderBy("id" , "DESC");
        if(@$request->text != '' ){
            $data = $data->where('name', 'like', '%'.$request->text.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = PartnerStyle::find($request->id);
        $data->name = $request->name;
        $data->updated_at = date('Y-m-d H:i:s');
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new PartnerStyle();
        $data->name = $request->name;
        $data->created_at = date('Y-m-d H:i:s');
        $data->updated_at = date('Y-m-d H:i:s');
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = PartnerStyle::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Loại Đối Tác Thành Công."]);
    }

}
