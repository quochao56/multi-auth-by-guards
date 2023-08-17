<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password'
        ],[
            'cpassword.same' => "The confirm password and password do not match.",
            'cpassword.required' => "The confirm password is required."
        ]);

        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($user){
            return redirect()->back()->with('success','You have registered successfully');
        }
        else{
            return redirect()->back()->with('error','Registration Failed');
        }

    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:15',
        ]);
        $check = $request->only(['email','password']);
        if(Auth::guard('web')->attempt($check)){
            return redirect()->route('user.home')->with('success','Welcome to dashboard');
        }else{
            return redirect()->back()->with('error','Login Failed');

        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
