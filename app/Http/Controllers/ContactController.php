<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }


    
}
