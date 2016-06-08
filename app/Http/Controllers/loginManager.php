<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class loginManager extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function firstPage(){
        $something = Session::get('error');
        $ok = Session::get('success');
        $data = array();
        if (Auth::check()) {
            $data = Auth::user();
        }
        if($something == null)
            $something = false;
        if($ok == null)
            $ok = false;
        return view('welcome',compact('something','ok','data'));
    }
    public function getLogin(){
        return view('testLogin');
    }
    public function getNewUser(){
        return view('register-page');
    }

    public function postForm(Request $request){
    //    User::create(Request::all());
        $user = $request->newUser;
        $pass = $request->newPass;
        $confirm_pass = $request->conPass;
        $mail = $request->new_mail;
        if(Auth::attempt(array('username' => $user))) return redirect('createNewUser');
        if($pass != $confirm_pass) return redirect('createNewUser');
        $new_username = new User();
        $new_username->username = $user;
        $new_username->password = bcrypt($pass);
        $new_username->email = $mail;
        $new_username->save();
        return redirect('/')->with('success',true)->with('pass',$pass);
    }
    public function checkID(Request $request){
        $user = $request->name_userName;
        $password = $request->name_password;
        if (Auth::attempt(array('username' => $user, 'password' => $password),null))
        {
            return redirect('testLogin');
        }
        else{
            return Redirect::back()->with('error',true);
        }

    }
    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

}
