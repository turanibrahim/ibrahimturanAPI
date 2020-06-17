<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutSection;
use App\Http\Resources\AboutSectionResource as AboutSectionResource;

class AboutSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query('lang')){
            $lang = $request->query('lang');
            return AboutSectionResource::collection(AboutSection::all()->where('lang', $lang)->sortBy('sequence'));
        }
        
        return AboutSectionResource::collection(AboutSection::all()->sortBy('sequence'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aboutSection = AboutSection::create([
            'title' => $request->title,
            'description' => $request->description,
            'icons' => json_encode($request->icons),
            'lang' => $request->lang,
            'sequence' => $request->sequence,
        ]);

        return new AboutSectionResource($aboutSection);
    }

    /**
     * Display the specified resource.
     *
     * @param  AboutSection  $aboutSection
     * @return \Illuminate\Http\Response
     */
    public function show(AboutSection  $aboutSection)
    {
        return new AboutSectionResource($aboutSection);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  AboutSection  $aboutSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutSection  $aboutSection)
    {
        $aboutSection->update($request->only(['title', 'description' ,'icons', 'lang', 'sequence']));

        return new AboutSectionResource($aboutSection);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AboutSection  $aboutSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutSection  $aboutSection)
    {
        $aboutSection->delete();

        return response()->json(null, 204);
    }
}
