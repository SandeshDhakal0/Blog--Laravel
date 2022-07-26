<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // Login View
    function login(){
        return view('backend.login');
    }
    // Submit Login
    function submit_login(Request $request){

        $request->validate([
            'username'=> 'required',
            'password'=> 'required',
        ]);
        // Check is the user enters the designation
        $userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
        if($userCheck>0){
            $adminCheck = Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
            session(['adminCheck'=> $adminCheck]);
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error','Invalid Username/Password!!');
        }
    }

        // Dashboard
        function dashboard(){
             return view('backend.dashboard');
        }

    function logout(){
        session()->forget(['adminCheck']);
        return redirect('admin/login');
    }
}

