<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function Add(Request $request){
        $comment = new comment;
        $comment->comment = $request->input('comment');
        $comment->post_id = $request->input('post_id');
        $comment->user_id = $request->input('user_id');

        $comment->save();

        return redirect('/show/'.$comment->user_id)->with('success', 'New comment added successfully');
    }
}
