<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=user::paginate(10);
        return view('admin.user.index',compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $user=new User();
//        $user->name=$request->name;
//        $user->email=$request->email;
//        $user->password=$request->password;
//        $user->save();
//        return redirect()->route('user.index')->with('success','user has been added succsesfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('admin.user.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('user.index')->with('success','the user has been updated succsesfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        if($user->delete()){
            return redirect()->route('user.index')->with('success','user has been deleted');
        }
        return redirect()->route('user.index')->with('error','delete user fail their is post this user published');
    }
}
