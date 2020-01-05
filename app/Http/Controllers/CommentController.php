<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request,$id){
        $comment=new Comment();
        $comment->user()->associate(Auth::user());
        $comment->post()->associate(Post::find($id));
        $comment->body=$request->body;
        $comment->save();
        return back();
//        return back();
//        $comment->user()->associate(User::find(1));
//        $comment->post()->associate(Post::find(2));
//        $comment->body="asdasdsadd";
//        $comment->save();
//        dd($comment);
    }
}
