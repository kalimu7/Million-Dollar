<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    public function Add(Request $request){
        $comment = new comment;
        $comment->comment = $request->input('comment');
        $comment->post_id = $request->input('post_id');
        $comment->user_id = $request->input('user_id');

        $comment->save();

        return redirect('/show/'.$comment->post_id)->with('success', 'New comment added successfully');
    }
    public function DsingleWithComment($idpost){
        $posts = DB::table('comments')
                    
                    ->join('posts','comments.post_id', '=','posts.id')
                    // ->take(1)
                    ->join('users','comments.user_id','=','users.id')
                    
                    ->select('comments.*','posts.*','users.*')
                    // ->select('posts.*')
                    ->where('posts.id',$idpost)
                    ->get();

        return view('SingleWithComments')->with('PC',$posts);
    }
}
