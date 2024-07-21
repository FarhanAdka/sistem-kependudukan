<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect('dashboard');
        }
        return view('Page.login');
    }

    function dashboard(){
        $user=User::where('id',auth()->user()->id)->get()->first();
        $info=[
            'name'=>$user->name
        ];
        //Ambil Data KK

        //Ambil Data penduduk
        return view('Page/dashboard', $info);
    }
    function profile(){
        $user=User::where('id',auth()->user()->id)->get()->first();
        $info=[
            'name'=>$user->name
        ];
        return view('Page.profile',$info); 
    }
    
    function updateProfile(){

    }
}
