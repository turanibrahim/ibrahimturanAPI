<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostView;

class PostViewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isVoted = PostView::where([
            'post_id' => $request->postId,
            'ip_address' => $request->ipAddress
        ])->count();

        if(!$isVoted){
            PostView::create([
                'post_id' => $request->postId,
                'ip_address' => $request->ipAddress
            ]);

            return response(['updated' => true], 200)->header('Content-Type', 'text/json');
        }else {
            return response(['updated' => false], 200)->header('Content-Type', 'text/json');
        }   
    }
}
