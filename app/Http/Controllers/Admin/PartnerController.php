<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    private $limit = 20;
    function list(Request $request) {

        $menu_active = 'partner';
        $menu_parent_active = 'partner';
        return view(
            'admin.partner.partner',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Partner::orderBy("id" , "DESC")->with('parent')->with('province');
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        foreach ($data as &$item) {
            $item->created_at = date("d/m/Y H:i:s", strtotime($item->created_at) );
            $item->birthday = date("d/m/Y", strtotime($item->birthday) );
        }
        unset($item);
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Banners::find($request->id);
        $data->banner = $request->banner;
        $data->text = $request->text;
        $data->description = $request->description;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Banners();
        $data->banner = $request->banner;
        $data->text = $request->text;
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
