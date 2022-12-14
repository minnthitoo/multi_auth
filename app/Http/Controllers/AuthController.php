<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //dashboard
    public function dashboard()
    {
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin#home');
        }else{
            return redirect()->route('user#home');
        }
    }
}
