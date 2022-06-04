<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function auth(Request $request){
        $login_data=['email'=>$request->email,'password'=>$request->password];
        if(Auth::attempt($login_data)){
            return redirect()->route('admin.admin');
        }
        return redirect()->back()->with('error','invalid username or password');
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('home');
    }

    public  function register(){
        return view('auth.register');
    }

    public  function do_register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);
        User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success','user is created');
    }

    public  function change($id){
        return view('admin.user.changePass',compact('id'));
    }

    public function do_change(Request $request,$id){
        $user=User::find($id);
        $request->validate([
            'oldp'=>'required',
            'password'=>'required|confirmed'
        ]);
        if(Hash::check($request->oldp,$user->password)){
            User::where( 'id' , $id)->update( array( 'password' => Hash::make( $request->password)));
            return redirect()->route('user.index')->with('success','the password is update succsesfuly');
        }
        else{
            return redirect()->route('change',$id)->with('error','the old password is not correct');
        }

    }
}
