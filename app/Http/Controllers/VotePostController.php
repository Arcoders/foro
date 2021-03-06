<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\{Post};

class VotePostController extends Controller
{

    public function upvote(Post $post)
    {
        $post->upvote();

        return [
            'new_score' => $post->score
        ];
    }

    public function downvote(Post $post)
    {
        $post->downvote();

        return [
            'new_score' => $post->score
        ];
    }

    public function undoVote(Post $post)
    {
        $post->undoVote();

        return [
            'new_score' => $post->score
        ];
    }

}
