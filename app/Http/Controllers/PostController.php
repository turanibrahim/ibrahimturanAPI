<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostVote;
use App\Http\Resources\PostResource;

class PostController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show', 'mdFile']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Post $posts)
    {
        $filters = ['published' => true ];
        $orderColumn = "created_at";
        $orderBy = "desc";
        $search="";

        if($request->query('lang')&&  $request->query('lang') !== 'all'){
            $filters += ['lang' => $request->query('lang')];
        }
        if($request->query('orderColumn') && $request->query('orderBy')){
            $orderColumn = $request->query('orderColumn');
            $orderBy = $request->query('orderBy');
        }

        if($request->query('search')){
            $search = $request->query('search');
        }

        return PostResource::collection(Post::posts($search)->where($filters)
            ->groupBy('posts.id')
            ->orderBy($orderColumn, $orderBy)
            ->paginate(12)
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
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'mdFile' => $request->mdFile,
            'readCount' => $request->readCount,
            'keys' => $request->keys,
            'lang' => $request->lang,
            'published' => $request->published,
        ]);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PostResource(Post::posts()
            ->where('posts.id', '=', $id)
            ->groupBy('posts.id')
            ->firstOrFail()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->only([
            'title',
            'name' ,
            'description',
            'image',
            'mdFile',
            'readCount',
            'keys',
            'published',
        ]));

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }

    /**
     * Send md file as response
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function mdFile($id)
    {
        $path = public_path()."/md/".$id.".md";

        return response()->file($path);
    }
}


