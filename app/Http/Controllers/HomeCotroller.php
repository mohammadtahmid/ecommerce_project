<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCotroller extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function home(){
        return view('home.index');
    }
}
