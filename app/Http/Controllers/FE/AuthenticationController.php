<?php

namespace App\Http\Controllers\FE;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use App\User;

use Session;

class AuthenticationController extends BaseController
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    

    function login(Request $request){ 
        if(Auth::guard('web')->user()) {
            return redirect('/thanh-vien/thong-ke');
        }
        return view('fe.auth.login');
    }
    function logout(Request $request){ 
        Auth::guard('web')->logout();
        Session::flash('success-logout', 'Logout Success!');
        return redirect('/nha-phan-phoi');
    }
    public function postLogin(Request $request) {
        if($request->type == 1) {
            $rules = [
                'email' =>'required',
                'password' => 'required|min:6'
            ];
            $messages = [
                'email.required' => 'Nhập Tên Đăng Nhập',
                'password.required' => 'Nhập Mật Khẩu',
                'password.min' => 'Mật Khẩu Không Được Dưới 6 Ký Tự',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            
            
            if ($validator->fails()) {
                return redirect('/dang-nhap?callback='.$request->callback)->withErrors($validator);
            } else {
                $email = $request->input('email');
                $password = $request->input('password');
         
                if( Auth::guard('web')->attempt(['email' => $email, 'password' =>$password])) { 
                    if ( Auth::guard('web')->user()->code == '' ) {
                        Auth::guard('web')->logout();
                        Session::flash('error', 'Tài khoản đăng nhập không phải nhà phân phối.');
                        return redirect('/dang-nhap?callback='.$request->callback);
                    }
                    if($request->callback != '' && $request->callback != '//' && $request->callback != '//') {
                        return redirect('/thanh-vien/thong-ke');
                    } else {
                        return redirect('/thanh-vien/thong-ke');
                    }
                    
                } else {
                    Session::flash('error', 'Tài khoản hoặc mật khẩu không tồn tại.');
                    return redirect('/dang-nhap?callback='.$request->callback);
                }
            }
        } else {
            $rules = [
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|alpha_dash',
            ];
            $messages = [
                'email.required' => 'Vui lòng nhập lại email!',
                'email.unique' => 'Email này đã tồn tại!',
                'phone.required' => 'Vui lòng nhập lại số điện thoại !',
                'phone.unique' => 'Số điện thoại này đã tồn tại!',
                'password.required' => 'Vui lòng nhập lại mật khẩu !'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect('/dang-nhap?callback='.$request->callback)->withErrors($validator)->withInput();
            } else {
                $email = $request->input('email');
                $password = $request->input('password');
                
                $user = new User();
                

                $user->password = Hash::make($password);
                $user->level_id = 1;
                $user->email = $email;
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->updated_at = date("Y-m-d");
                $user->created_at = date("Y-m-d");
                $user->save();

                if( Auth::guard('web')->attempt(['email' => $email, 'password' =>$password])) { 
                    if($request->callback != '' && $request->callback != '//' && $request->callback != '//') {
                        return redirect($request->callback);
                    } else {
                        return redirect('/');
                    }
                    
                } else {
                    Session::flash('error', 'Có Lỗi Xảy Ra. Vui Lòng Liên Hệ Quản Trị Viên!');
                    return redirect('/dang-nhap?callback='.$request->callback);
                }
            }
        }
        
    }
    
    function register()             { return view('authentication.register');}
    function forgotpassword()       { return view('authentication.forgotpassword');}
    function error404()             { return view('authentication.error404');}
}