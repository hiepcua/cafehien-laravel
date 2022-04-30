<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Deliveries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DeliveriesController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'deliveries';
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.deliveries.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Deliveries::orderBy("id" , "DESC");
        if(@$request->delivery != '' ){
            $data = $data->where('delivery', 'like', '%'.$request->delivery.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = Deliveries::find($request->id);
        $data->delivery = $request->delivery;
        $data->time = $request->time;
        $data->price = $request->price;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new Deliveries();
        $data->delivery = $request->delivery;
        $data->time = $request->time;
        $data->price = $request->price;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Deliveries::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Danh Mục Thành Công."]);
    }

}
