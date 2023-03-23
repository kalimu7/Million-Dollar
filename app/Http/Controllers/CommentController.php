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
    public function getTotalLikesForComment($comment_id) {
        $total_likes = DB::table('likes')
            ->where('comment_id', $comment_id)
            ->count('likes');
        return $total_likes;
    }
    public function getLikesCommentInfo($comment_id) {
        $likes_info = DB::table('likes')
            ->where('comment_id', $comment_id)
            ->select('likes.user_id')
            ->get();
            $userids = [];
            foreach($likes_info as $like){
                $userids[] = $like->user_id;
            }
            return $userids;
    }
    
    public function DsingleWithComment($idpost){
        $posts = DB::table('comments')    
        ->join('posts','comments.post_id', '=','posts.id')
        ->join('users','comments.user_id','=','users.id')
        ->select('comments.id as comment_id', 'comments.comment', 'comments.user_id', 'comments.post_id', 'comments.created_at', 'comments.updated_at','posts.*','users.*')
        ->where('posts.id',$idpost)
        ->get();

        $postiyas = [];
        foreach ($posts as $p) {
            $total_likes = $this->getTotalLikesForComment($p->comment_id);
            $likes_info = $this->getLikesCommentInfo($p->comment_id);
            
            $postiyas[] = [
                'comment_id' => $p->comment_id,
                'image_path' => $p->image_path,
                'description' => $p->description,
                'title' => $p->title,
                'owner' => $p->owner,
                'comment' => $p->comment,
                'user_id' => $p->user_id,
                'post_id' => $p->post_id,
                'created_at' => $p->created_at,
                'updated_at' => $p->updated_at,
                'total_likes' => $total_likes,
                'id' => $p->id,
                'name' => $p->name,
                'likes_info' => $likes_info,

                
                
            ];
        }
        
        
       
        if ($posts->isEmpty()) {
            $post = posts::find($idpost);
            return view('Single')->with('P',$post);
        }else{
            return view('SingleWithComments')->with('PC', $postiyas)->with('idpost', $idpost);
        } 
    }
    public function Like(Request $request){
        
        $commentid = $request->input('comment_id');
        $userid = $request->input('user_id');
        $idpost = $request->input('post_id');
        $existing_like = likes::where('comment_id', $commentid)->where('user_id', $userid)->first();
        if(!$existing_like){

            $like = new likes;
            $like->likes++;
            $like->dislikes = 0;
            $like->comment_id = $commentid;
            $like->user_id = $userid;
            $like->post_id = $request->input('post_id');
            $like->save();
            echo 'like added successfully';
            return redirect('/display/'.$idpost);

        }else{

            echo 'you have already liked this comment';

            return redirect('/display/'.$idpost);
        }
    }
}
