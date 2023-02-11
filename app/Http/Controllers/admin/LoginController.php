<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function userRegister()
    {
        return view('admin.register');
    }

    public function loginAdminProcess(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            if(Auth()->user()->type == 'admin')
            {
                return redirect()->intended('admin/dashboard');
            }else{
                Auth::logout();
                return redirect()->back()->with(['message'=>'Invalid email or password','type'=>'error']);
            }
            
        }else{
            return redirect()->back()->with(['message'=>'Invalid email or password','type'=>'error']); 
        }
    }

    public function userRegisterProcess(Request $request)
    {
       $input  = $request->except(['_token', 'profile'],$request->all());
       if($request->hasFile('profile'))
        {
            $img = Str::random(17).$request->file('profile')->getClientOriginalName();
            $input['profile'] = $img;
            $request->profile->move(public_path("documents/profile"), $img);
        }
        $useradd = User::create($data);
        if($useradd)
        {
            return redirect()->back()->with(['message'=>'Successfully registered']);
        }else{
            return redirect()->back()->with(['message'=>'Successfully registered']);
        }
    }
}
