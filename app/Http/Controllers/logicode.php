<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class logicode extends Controller
{
    function login(Request $request){
        $validate=$request->validate([
        'email'=>'required|email',
        'password'=>'required'

        ]);

        // $credentials=[
        //      'email'=>$request->email,
        //      'password'=>$request->password

        // ];
        $credentials=$request->only('email','password');
          if(Auth::attempt($credentials)){
              return redirect()->intended('dashboard');
              
        

          }else{
              return redirect()->route('login')->with('error',"invalid login");

          }

    }
}
