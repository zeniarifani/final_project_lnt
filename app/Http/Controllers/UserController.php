<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
class UserController extends Controller
{
    public function registerPage(){
        return view('register');
    }

    

    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|min:3|max:40',
            'password'=>'required|string|min:6|max:12',
            'email'=>'required|string|ends_with:@gmail.com',
            'handphone'=>'required|string|starts_with:08',
        ]);


        User::create([
            'name'=>$request->input('name'),
            'password'=>Hash::make($request->input('password')), 
            'email'=>$request->input('email'), 
            'handphone'=>$request->input('handphone'), 
        ]);
        $request->session()->regenerate();
        $request->session()->put('name',$request->name);



        return redirect(route('catalogue'));
    }

    public function loginPage(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->put('name',$request->name);
            return redirect(route('catalogue'));
        }

        return back()->withErrors([
            'name'=>'Invalid Credentials'
        ])->onlyInput('name');

    }

    public function logout(request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('loginPage'));
    }

    public function adminLogin(){
        return view('adminLogin');
    }

    public function adminOnly(Request $request){
        $credentials = $request->validate([
            'admin_name'=>'required',
            'id_admin'=>'required',
            'admin_email'=>'required',
            'admin_password'=>'required',
            'admin_handphone'=>'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->put('admin_name',$request->admin_name);

            return redirect(route('viewPage'));
        }
        
        return back()->withErrors([
            'admin_name'=>'Invalid Credentials'
            ])->onlyInput('admin_name');

    }
    
}
