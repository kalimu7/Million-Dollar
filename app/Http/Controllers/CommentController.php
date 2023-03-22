<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\User;
use App\Models\comment;
use App\Models\likes;
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

        return redirect('/display/'.$comment->post_id)->with('success', 'New comment added successfully');
    }
    public function DsingleWithComment($idpost){
        $posts = DB::table('comments')    
        ->join('posts','comments.post_id', '=','posts.id')
        // ->take(1)
        ->join('users','comments.user_id','=','users.id')
        ->select('comments.id as comment_id', 'comments.comment', 'comments.user_id', 'comments.post_id', 'comments.created_at', 'comments.updated_at','posts.*','users.*')
        // ->select('posts.*')
        ->where('posts.id',$idpost)
        ->get();
       
        if ($posts->isEmpty()) {
            $post = posts::find($idpost);
            return view('Single')->with('P',$post);
        }else{
            return view('SingleWithComments')->with('PC', $posts)->with('idpost', $idpost);
        } 
    }
    public function Like(Request $request){
        $like = new likes;
        $like->likes++;
        $like->dislikes = 0;
        $like->comment_id = $request->input('comment_id');
        $like->user_id = $request->input('user_id');
        $like->save();
        echo 'liked it';
    }
}
