<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\{Post, VoteRepository};

class VotePostController extends Controller
{

    /**
    * @var voteRespository
    */
    private $voteRepository;

    public function __construct(VoteRespository $voteRepository)
    {
        $this->voteRespository = $voteRepository;
    }

    public function upvote(Post $post)
    {
        $this->voteRepository->upvote($post);

        return [
            'new_score' => $post->score
        ];
    }

    public function downvote(Post $post)
    {
        $this->voteRepository->downvote($post);

        return [
            'new_score' => $post->score
        ];
    }

    public function undoVote(Post $post)
    {
        $this->voteRepository->undoVote($post);

        return [
            'new_score' => $post->score
        ];
    }

}
