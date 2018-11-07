<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function admin(Request $request){

        if($request->input('username') == "admin"){
            return view('welcome');
        }else{
            return view('noadmin');
        }
    }
}
