<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function AdminLogin(){
     return view('Admin.Auth.login');
    }
    public function login(Request $request){
        if (AdminGuard()->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect(AdminUrl().'/dashboard');
        }else{
            session()->flash('error','please check your email or password');
            return redirect(AdminUrl().'/adminlogin');
        }
    }
    function LogoutAdmin(){
        AdminGuard()->logout();
        return redirect(AdminUrl().'/adminlogin');
    }
}
