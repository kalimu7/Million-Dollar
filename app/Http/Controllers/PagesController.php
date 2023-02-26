<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        return view('form');
    }
    public function ADD(Request $request){
        $id = Auth::id();
        $name = Auth::user()->name;
        // echo $name;
        // echo $id;
        // die;
        $post  = new posts;
        $post->owner = $name;
        $post->user_id = $id;
        $post->title = $request->input('title');
        $post->image_path = $request->input('image');
        $post->category = $request->input('category');
        $post->Description = $request->input('Description');

        $post->save();
    }
    public function fetchdata(){
        $data = posts::all();
        print_r($data);
    }
}


