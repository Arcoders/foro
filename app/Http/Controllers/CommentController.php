<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {

        auth()->user()->comment($post, $request->get('comment'));

        return redirect($post->url);

    }

    public function accept(Comment $comment)
    {

        $comment->markAsAnswer();

        return redirect($comment->post->url);

    }

}
