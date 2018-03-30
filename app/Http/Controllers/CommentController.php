<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
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
}
