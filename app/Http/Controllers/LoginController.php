<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
       return view('admin.index');
    }

    // public function prosesLogin(LoginRequest $request)
    // {
    //    $login = [
    //        "username" => $request->username,
    //        "password" => $request->password,
    //    ];
    //    if (Auth::attempt($login)) {
    //        $request->session()->regenerate();
   
    //        if (Auth::user()->hasRole('user_guest')) {
    //            return redirect('approval'); 
    //        } else {
    //            return redirect('dashboard'); 
    //        }
           
    //    }else{
    //         return redirect('login')->with('error','Akun tidak terdaftar');
    //    }
    // }
}
