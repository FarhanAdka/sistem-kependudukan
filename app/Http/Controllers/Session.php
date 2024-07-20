<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Session extends Controller
{
    function login()
    {
        return view('Asset/login');
    }
}
