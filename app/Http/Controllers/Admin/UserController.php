<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Levels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $count = User::orderBy("name" , "ASC")->count();
        $totalPage = ceil($count/$this->limit);
        $menu_active = 'users';
        //  echo "<pre>";
        //  print_r($totalPage);die;
        return view(
            'admin.user.list',
            compact([
                'menu_active',
                'count',
                'totalPage'
            ])
        );
    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $users = User::orderBy("name" , "ASC")->with('level');
        if(@$request->name != '' ){
            $users = $users->where('name', 'like', '%'.$request->name.'%');
        }
        if(@$request->email != '' ){
            $users = $users->Where('email', 'like', '%'.$request->email.'%');
        }

        if(@$request->is_active != '' ){
            $users = $users->Where('is_active', '=', $request->is_active);
        }
        
        $count = $users->count();
        $pageTotal = ceil($count/$this->limit);
        $users = $users->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$users,'count'=>$count,'pageTotal' => $pageTotal]);
    }


    function add(Request $request) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        $user = new \stdClass();
        if ($request->isMethod('post')) {

            $user = $request->all();

            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|unique:users',
                    'code' => 'unique:users',
                    'phone' => 'required|unique:users',
                    'password' => 'required|alpha_dash',
    
                ],
                [
                    'email.required' => 'Vui lòng nhập lại email!',
                    'email.unique' => 'Email này đã tồn tại!',
                    'code.unique' => 'Code này đã tồn tại!',
                    'phone.required' => 'Vui lòng nhập lại số điện thoại !',
                    'phone.unique' => 'Số điện thoại này đã tồn tại!',
                    'password.required' => 'Vui lòng nhập lại mật khẩu !'
                ]
            );
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput($request->input());
            }
            
            $user = new User();
            if ($request->birthday != '') {
                $request->birthday = \DateTime::createFromFormat('d/m/Y', $request->birthday);
                $user->birthday =  $request->birthday->format('Y-m-d');
            }

            $user->password = Hash::make($request->password);
            $user->address = $request->address;
            $user->level_id = $request->level_id;
            $user->email = $request->email;
            $user->code = $request->code;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->ward_id = $request->ward_id;
            $user->district_id = $request->district_id;
            $user->province_id = $request->province_id;
            $user->avatar = $request->avatar;
            $user->points = $request->points ? $request->points : 0;
            $user->is_active = $request->is_active;
            $user->notify = $request->notify;
            $user->updated_at = date("Y-m-d");
            $user->created_at = date("Y-m-d");
            $user->save();

            return redirect('/admin/user/edit/'.$user->id)->with('message-add','Thêm Thành Viên Thành Công!');
        }
        $levels = Levels::all();
        if ( @$user->birthday != '') {
            $user->birthday = date("d/m/Y", strtotime($user->birthday) );
        }
        $listProvinces = Provinces::all();
        $menu_active = 'users';
        //  echo "<pre>";
        //  print_r($totalPage);die;
        return view(
            'admin.user.add',
            compact([
                'listProvinces',
                'menu_active',
                'user',
                'message',
                'levels'
            ])
        );
    }

    function edit(Request $request,$id) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        if ($request->isMethod('post')) {
            $user = User::find($id);
            if ($request->birthday != '') {
                $request->birthday = \DateTime::createFromFormat('d/m/Y', $request->birthday);
                $user->birthday =  $request->birthday->format('Y-m-d');
            }
            $flagUpdatePass = 0;
            if (@$request->password != '') {
                if ($request->password === $request->re_password) {
                    $user->password = Hash::make($request->password);
                } else {
                    $flagUpdatePass = 1;
                }
            }
            if ($flagUpdatePass === 0) {
                $user->address = $request->address;
                $user->name = $request->name;
                $user->level_id = $request->level_id;
                $user->ward_id = $request->ward_id;
                $user->district_id = $request->district_id;
                $user->province_id = $request->province_id;
                $user->avatar = $request->avatar;
                $user->points = $request->points ? $request->points : 0;
                $user->is_active = $request->is_active;
                $user->notify = $request->notify;
                $user->updated_at = date("Y-m-d");
                $user->save();
                $message = [
                    "message" => "Thay đổi thông tin thành công.",
                    "status" => 1
                ];
            } else {
                $message = [
                    "message" => "Thay đổi thông tin không thành công. Mật khẩu không trùng khớp.",
                    "status" => 2
                ];
            }
           
        }
        $user = User::find($id);
        if (!$user) {
            return view('authentication.error404');
        }
        if ( $user->birthday != '') {
            $user->birthday = date("d/m/Y", strtotime($user->birthday) );
        }
        $levels = Levels::all();
        $listProvinces = Provinces::all();
        $menu_active = 'users';
        //  echo "<pre>";
        //  print_r($totalPage);die;
        return view(
            'admin.user.edit',
            compact([
                'listProvinces',
                'menu_active',
                'user',
                'message',
                'levels'
            ])
        );
    }

    function delete(Request $request,$id) {
        $users = User::find($id);
        $users->delete();
        return response()->json(['message'=>"Xóa Thành Viên Thành Công."]);
    }

    function active(Request $request,$id) {
        $users = User::find($id);
        $users->is_active = 1 ;
        $users->save();
        return response()->json(['message'=>"Active Thành Viên Thành Công."]);
    }

    function deactive(Request $request,$id) {
        $users = User::find($id);
        $users->is_active = 0 ;
        $users->save();
        return response()->json(['message'=>"Deactive Thành Viên Thành Công."]);
    }

}
