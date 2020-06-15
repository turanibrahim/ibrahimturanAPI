<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Http\Resources\SocialMediaResource as SocialMediaResource;

class SocialMediaController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SocialMediaResource::collection(SocialMedia::all()->sortBy('sequence'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $socialMedia = SocialMedia::create([
            'name' => $request->name,
            'link' => $request->link,
            'color' => $request->color,
            'sequence' => $request->sequence,
        ]);

        return new SocialMediaResource($socialMedia);
    }

    /**
     * Display the specified resource.
     *
     * @param  SocialMedia $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $socialMedia)
    {
        return new SocialMediaResource($socialMedia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        $socialMedia->update($request->only(['name', 'link' ,'color', 'sequence']));

        return new SocialMediaResource($socialMedia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialMedia)
    {
        $socialMedia->delete();

        return response()->json(null, 204);
    }
}
