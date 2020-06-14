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
    public function increase(Request $request)
    {
        $ipAddress = $request->data['ipAddress'];
        $postId = $request->data['postId'];

        PostView::updateOrCreate(
            ['post_id' => $postId, 'ip_address' => $ipAddress],
            ['post_id' => $postId, 'ip_address' =>$ipAddress]
        );
        return response(['status' => 'success'], 200)->header('Content-Type', 'text/json');
    }
}
