<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Http\Resources\ExperienceResource as ExperienceResource;

class ExperienceController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query('lang')){
            $lang = $request->query('lang');
            return ExperienceResource::collection(Experience::all()->where('lang', $lang)->sortByDesc('startingDate'));
        }

        return ExperienceResource::collection(Experience::all()->sortByDesc('startingDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $experience = Experience::create([
            'title' => $request->title,
            'company' => $request->company,
            'description' => $request->description,
            'startingDate' => $request->startingDate,
            'terminationDate' => $request->terminationDate,
            'logo' => $request->logo,
            'lang' => $request->lang,
        ]);

        return new ExperienceResource($experience);
    }

    /**
     * Display the specified resource.
     *
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return new ExperienceResource($experience);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $experience->update($request->only(['title', 'company' ,'description', 'startingDate', 'terminationDate', 'logo', 'lang']));

        return new ExperienceResource($experience);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return response()->json(null, 204);
    }
}
