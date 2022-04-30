<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
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
        return view('authentication.login');
    }
    function logout(Request $request){ 
        Auth::guard('admin')->logout();
        Session::flash('success-logout', 'Logout Success!');
        return redirect(route('login'));
    }
    public function postLogin(Request $request) {
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
            return redirect(route('login'))->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::guard('admin')->attempt(['username' => $email, 'password' =>$password])) { 
                return redirect('/admin');
            } else {
                Session::flash('error', 'Tài khoản hoặc mật khẩu không tồn tại.');
                return redirect(route('login'));
            }
        }
    }
    
    function register()             { return view('authentication.register');}
    function forgotpassword()       { return view('authentication.forgotpassword');}
    function error404()             { return view('authentication.error404');}
}