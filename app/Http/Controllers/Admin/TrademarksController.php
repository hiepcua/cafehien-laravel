<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Trademarks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TrademarksController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'trademarks';
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.trademarks.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Trademarks::orderBy("id" , "DESC");
        if(@$request->name != '' ){
            $data = $data->where('trademark', 'like', '%'.$request->name.'%');
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

            $data = Trademarks::find($id);
            $data->icon = $request->icon ;
            $data->trademark = $request->trademark ;
            $listImage = $request->data['images'];
            $listString = '';
            if (is_array($listImage)) {
                foreach ($listImage as $index => $image) {
                    if (null == $image) {
                        unset($listImage[$index]);
                    } else {
                        $listString .= ','.$image;
                    }
                }
            }
            $data->list_slide = trim($listString , ',');
            $data->save();
            $message = [
                "message" => "Thay đổi thông tin thành công.",
                "status" => 1
            ];
            
        }

        $data = Trademarks::find($id);
        if ($data) {
            $dataImage = [];
            $data->list_slide = explode(',',$data->list_slide);
            foreach ($data->list_slide as $item) {
                $dataImage[] = $item;
            }
            if (! is_array($dataImage)) {
                $dataImage = array();
            }
            
            $data->list_slide = array_pad($dataImage, 50, null);
        }
        

        
        
        $menu_active = 'trademarks';
        $menu_parent_active = 'setting-groups';
        //  echo "<pre>";
        //  print_r($data);die;
        return view(
            'admin.trademarks.edit',
            compact([
                'menu_active',
                'data',
                'message',
                'id',
                'menu_parent_active',
            ])
        );
    }

    function addData(Request $request) {
        
        $data = new Trademarks();
        $data->trademark = $request->name;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Trademarks::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Trademarks Thành Công."]);
    }

}
