<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Page extends Controller
{
    public function index(Request $Request) {
       return view('frontend.page');
       // return view('welcome');
        
    }
}
