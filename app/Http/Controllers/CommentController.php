<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Like;
use App\Dislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function addPostComment(Request $request, Post $post)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        $comment=new Comment;
        $comment->body=$request->body;
        $comment->user_id=Auth::id();
        
        $post->comments()->save($comment);
        return back()->withMessage('Komentaras sukurtas!');
    }

    public function update(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        //tikrinimas, kad vartotojas neistrintu ne savo komentaro
        if(auth()->user()->id !== $comment->user_id){
            return redirect('/forum');
        }
        
        $comment->update($request->all());
        return back()->withMessage('Komentaras atnaujintas!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //tikrinimas, kad vartotojas neistrintu ne savo komentaro
        if(auth()->user()->id !== $comment->user_id){
            return redirect('/forum');
        }
        $comment->delete();
        return back()->withMessage('Komentaras pašalintas!');
    }


    //Reply Dalykai
    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        $reply=new Comment;
        $reply->body=$request->body;
        $reply->user_id=Auth::id();
        
        $comment->comments()->save($reply);
        return back()->withMessage('Atsakyta!');
    }

    public function likeIt($id)
    {
        $user = Auth::user();
        $comment_find = Comment::find($id);
        //tikrinam ar sitas vartotojas jau spaude like
        $like = $user->likes()->where('comment_id', $id)->first();
        if ($like){
            $like->delete();
            $mess = "Like pašalintas!";
        }else{
            $like = new Like;
            $like->like = true;
            $like->user_id = $user->id;
            $like->comment_id = $id;
            $like->save();
            $mess = "Like užskaitytas!";
        }
        return back()->withMessage($mess);
    }

    public function dislikeIt($id)
    {
        $user = Auth::user();
        $comment_find = Comment::find($id);
        //tikrinam ar sitas vartotojas jau spaude like
        $dislike = $user->dislikes()->where('comment_id', $id)->first();
        if ($dislike){
            $dislike->delete();
            $mess = "Dislike pašalintas!";
        }else{
            $dislike = new Dislike;
            $dislike->dislike = true;
            $dislike->user_id = $user->id;
            $dislike->comment_id = $id;
            $dislike->save();
            $mess = "Dislike užskaitytas!";
        }
        return back()->withMessage($mess);
    }
  
}
