<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Vote;
use App\Http\Resources\PostResource as PostResource;

class PostController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show', 'getMdFile']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = ['published' => true ];
        $orderColumn = "created_at";
        $orderBy = "desc";

        if($request->query('lang')&&  $request->query('lang') !== 'all'){
            $filters += ['lang' => $request->query('lang')];
        }
        if($request->query('orderColumn') && $request->query('orderBy')){
            $orderColumn = $request->query('orderColumn');
            $orderBy = $request->query('orderBy');
        }

        $thumbsUps = Vote::select('post_id', Vote::raw('COUNT(id)'))
            ->where('vote_type', 1)
            ->groupBy('post_id');

        $thumbsDowns = Vote::select('post_id', Vote::raw('COUNT(id)'))
            ->where('vote_type', 2)
            ->groupBy('post_id');

        $hearts = Vote::select('post_id', Vote::raw('COUNT(id)'))
            ->where('vote_type', 3)
            ->groupBy('post_id');

        if($request->query('search')){
            $search = $request->query('search');
            return PostResource::collection(Post::where($filters)
                ->where(function ($query)  use ($search) {
                    $query->where('title', 'like', '%'.$search.'%')
                        ->orWhere('description', 'like', '%'.$search.'%')
                        ->orWhere('keys', 'like', '%'.$search.'%');
                })
                ->leftJoin('post_views', 'posts.id', '=', 'post_views.post_id')
                ->selectRaw('
                    posts.*,
                    COUNT(post_views.id) as view_count,
                    COUNT(thumbs_ups) as thumbs_ups,
                    COUNT(thumbs_downs) as thumbs_downs,
                    COUNT(hearts) as hearts')
                ->leftJoinSub($thumbsUps, 'thumbs_ups', function ($join) {
                    $join->on('posts.id', '=', 'thumbs_ups.post_id');
                })
                ->leftJoinSub($thumbsDowns, 'thumbs_downs', function ($join) {
                    $join->on('posts.id', '=', 'thumbs_downs.post_id');
                })
                ->leftJoinSub($hearts, 'hearts', function ($join) {
                    $join->on('posts.id', '=', 'hearts.post_id');
                })
                ->groupBy('posts.id')
                ->orderBy($orderColumn, $orderBy)
                ->paginate(12)
            );
        }

        return PostResource::collection(Post::where($filters)
            ->leftJoin('post_views', 'posts.id', '=', 'post_views.post_id')
            ->selectRaw('
                posts.*,
                COUNT(post_views.id) as view_count,
                COUNT(thumbs_ups) as thumbs_ups,
                COUNT(thumbs_downs) as thumbs_downs,
                COUNT(hearts) as hearts')
            ->leftJoinSub($thumbsUps, 'thumbs_ups', function ($join) {
                $join->on('posts.id', '=', 'thumbs_ups.post_id');
            })
            ->leftJoinSub($thumbsDowns, 'thumbs_downs', function ($join) {
                $join->on('posts.id', '=', 'thumbs_downs.post_id');
            })
            ->leftJoinSub($hearts, 'hearts', function ($join) {
                $join->on('posts.id', '=', 'hearts.post_id');
            })
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
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $thumbsUps = Vote::select('post_id', Vote::raw('COUNT(id)'))
            ->where('vote_type', 1)
            ->groupBy('post_id');

        $thumbsDowns = Vote::select('post_id', Vote::raw('COUNT(id)'))
            ->where('vote_type', 2)
            ->groupBy('post_id');

        $hearts = Vote::select('post_id', Vote::raw('COUNT(id)'))
            ->where('vote_type', 3)
            ->groupBy('post_id');

        return new PostResource(Post::where('posts.id', '=', $post->id)
            ->leftJoin('post_views', 'posts.id', '=', 'post_views.post_id')
            ->selectRaw('
                posts.*,
                COUNT(post_views.id) as view_count,
                COUNT(thumbs_ups) as thumbs_ups,
                COUNT(thumbs_downs) as thumbs_downs,
                COUNT(hearts) as hearts')
            ->leftJoinSub($thumbsUps, 'thumbs_ups', function ($join) {
                $join->on('posts.id', '=', 'thumbs_ups.post_id');
            })
            ->leftJoinSub($thumbsDowns, 'thumbs_downs', function ($join) {
                $join->on('posts.id', '=', 'thumbs_downs.post_id');
            })
            ->leftJoinSub($hearts, 'hearts', function ($join) {
                $join->on('posts.id', '=', 'hearts.post_id');
            })
            ->groupBy('posts.id')
            ->first()
        );
        return $post->id;
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
    public function getMdFile($id)
    {
        $path = public_path()."/md/".$id.".md";

        return response()->file($path);
    }
}


