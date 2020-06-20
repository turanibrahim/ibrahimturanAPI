<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Http\Resources\PostCommentResource;

class PostCommentController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api')->only(['index, store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return PostCommentResource::collection(PostComment::
            where('post_id', '=' , $id)->with('parentComment:id,name,surname,comment')->paginate(12)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postComment = PostComment::create([
            'post_id' => $request->post_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'comment' => $request->comment,
            'reply_to' => $request->reply_to,
            'approved' => false
        ]);

        return new PostCommentResource($postComment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($postId, $commentId)
    {
        return new PostCommentResource(PostComment::
            where('id', '=' , $commentId)
            ->with('parentComment:id,name,surname,comment')->firstOrFail()
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PostComment  $post_comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId , $commentId)
    {

        PostComment::findOrFail($commentId)->delete();

        return response()->json(null, 204);
    }
}
