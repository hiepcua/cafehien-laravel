<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Promotions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PromotionsController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'promotions';
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.promotions.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Promotions::orderBy("id" , "DESC");
        if(@$request->name != '' ){
            $data = $data->where('promotion_code', 'like', '%'.$request->name.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        foreach ($data as &$item) {
            if ( $item->start_date != '') {
                $item->start_date = date("d/m/Y", strtotime($item->start_date) );
            }

            if ( $item->end_date != '') {
                $item->end_date = date("d/m/Y", strtotime($item->end_date) );
            }
            $item->type = ''.$item->type;
        }
        unset($item);
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Promotions::find($request->id);
        $data->promotion_code = $request->name;
        $data->type = $request->type;
        $data->discount = $request->discount;
        if ($request->start_date != '') {
            $request->start_date = \DateTime::createFromFormat('d/m/Y', $request->start_date);
            $request->start_date =  $request->start_date->format('Y-m-d');
        }

        $data->start_date = $request->start_date ? $request->start_date : null;
        if ($request->end_date != '') {
            $request->end_date = \DateTime::createFromFormat('d/m/Y', $request->end_date);
            $request->end_date =  $request->end_date->format('Y-m-d');
        }
        $data->end_date = $request->end_date ? $request->end_date : null;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Promotions();
        $data->promotion_code = $request->name;
        $data->discount = $request->discount;
        $data->type = $request->type;
        if ($request->start_date != '') {
            $request->start_date = \DateTime::createFromFormat('d/m/Y', $request->start_date);
            $request->start_date =  $request->start_date->format('Y-m-d');
        }

        $data->start_date = $request->start_date ? $request->start_date : null;
        if ($request->end_date != '') {
            $request->end_date = \DateTime::createFromFormat('d/m/Y', $request->end_date);
            $request->end_date =  $request->end_date->format('Y-m-d');
        }
        $data->end_date = $request->end_date ? $request->end_date : null;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Promotions::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Mã Giảm Giá Thành Công."]);
    }

}
