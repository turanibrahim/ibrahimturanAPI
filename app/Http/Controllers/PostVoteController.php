<?php

namespace App\Http\Controllers;

use App\Models\PostVote;
use Illuminate\Http\Request;

class PostVoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isVoted = PostVote::where([
            'post_id' => $request->postId,
            'vote_type' => $request->voteType,
            'ip_address' => $request->ipAddress
        ])->count();
        
        if(!$isVoted){
            PostVote::create([
                'post_id' => $request->postId,
                'vote_type' => $request->voteType,
                'ip_address' => $request->ipAddress
            ]);

            return response(['updated' => true], 200)->header('Content-Type', 'text/json');
        }else {
            return response(['updated' => false], 200)->header('Content-Type', 'text/json');
        }

    }
}
