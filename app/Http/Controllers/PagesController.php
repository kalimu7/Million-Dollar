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
        $image = $request->file('image');
        $imagePath = $image->move(public_path('/uploaded'), $image->getClientOriginalName());
        $post  = new posts;
        $post->owner = $name;
        $post->user_id = $id;
        $post->title = $request->input('title');
        $post->image_path = $request->file('image')->getClientOriginalName();
        $post->category = $request->input('category');
        $post->Description = $request->input('Description');

        $post->save();

        return redirect('/Posts')->with('success', 'New Post Created Successfully!');
    }
    public function fetchdata(){
        $AllPosts = posts::all();
        return view ('Posts')->with('Ps',$AllPosts);
    }
    public function edit($id){
        $single = posts::find($id);
        return view('edit')->with('Ps',$single);
    }
    public function update(Request $request,$id){

        $post = posts::find($id);
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->move(public_path('/uploaded'), $image->getClientOriginalName());
        $post->image_path = $image->getClientOriginalName();
        }

        
        $post->title = $request->input('title');
        $post->category = $request->input('category');
        $post->Description = $request->input('Description');
        
        $post->update();
        

        return redirect('/Posts')->with('success', 'Post updated successfully');
    }
    public function destroy($id){
        posts::destroy($id);
        return redirect('/Posts')->with('success', 'Post deleted successfully');
    }
    public function Dsingle($id){
        $post = posts::find($id);
        return view('Single')->with('P',$post);
    }
    
    
}


