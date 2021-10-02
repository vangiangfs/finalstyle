<?php

namespace App\Http\Controllers\Cms\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('cms.users.login', [
            'title' => 'Đăng nhập'
        ]);
    }

    public function do_login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $username = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if(Auth::attempt([
            'username' => $username, 
            'password' => $password,
            'published' => 1
        ], $remember)){
            return redirect()->route('dashboard');
        }

        $request->session()->flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng');

        return redirect()->back();
    }

    public function forgot_password(){
        return view('cms.users.forgot_password', [
            'title' => 'Quên mật khẩu'
        ]);
    }

    public function do_forgot_password(){
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
