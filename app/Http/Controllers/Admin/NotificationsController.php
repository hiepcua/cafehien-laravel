<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Notifications;
use App\Models\NotificationTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NotificationsController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'notifications';
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.notifications.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = NotificationTypes::orderBy("id" , "DESC");
        if(@$request->title != '' ){
            $data = $data->where('title', 'like', '%'.$request->title.'%');
        }
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        
        $data = NotificationTypes::find($request->id);
        $data->message = $request->message;
        $data->title = $request->title;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function addData(Request $request) {
        
        $data = new NotificationTypes();
        $data->message = $request->message;
        $data->title = $request->title;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = NotificationTypes::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Danh Mục Thành Công."]);
    }

}
