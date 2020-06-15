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
        PostView::updateOrCreate(
            ['post_id' => $request->postId, 'ip_address' => $request->ipAddress],
            ['post_id' => $request->postId, 'ip_address' => $request->ipAddress]
        );
        return response(['status' => 'success'], 200)->header('Content-Type', 'text/json');
    }
}
