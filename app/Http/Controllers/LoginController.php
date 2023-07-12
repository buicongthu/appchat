<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
  
          
        $email=$request->email;
        $password=$request->password;
        
        if (Auth::attempt(['email'=> $email,'password'=>$password])) {
            // $request->session()->regenerate();
          
            return redirect('/'); 
        }
    
        // Đăng nhập không thành công, xử lý thông báo lỗi hoặc chuyển hướng đến trang đăng nhập lại
        return redirect()->back()->withInput()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }
}
