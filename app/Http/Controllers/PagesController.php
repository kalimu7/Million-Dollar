<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('layout.app');
    }
    public function body(){
        return view('body');
    }
    public function footer(){
        return view('footer');
    }
    public function post(){
        return view('Posts');
    }
    public function addpost(){
        
    }
}


