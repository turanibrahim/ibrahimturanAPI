<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meta;
use App\Http\Resources\MetaResource as MetaResource;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MetaResource::collection(Meta::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meta = Meta::create([
            'title' => $request->title,
            'name' => $request->name,
            'description' => $request->description,
            'hid' => $request->hid,
            'lang' => $request->lang,
        ]);

        return new MetaResource($meta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new MetaResource(Meta::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meta  $meta)
    {
        $meta->update($request->only(['title', 'name' ,'description', 'hid', 'lang']));

        return new MetaResource($meta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta $meta)
    {
        $meta->delete();

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $hid
     * @param  string  $lang
     * @return \Illuminate\Http\Response
     */
    public function withHid($hid, $lang)
    {
        return new MetaResource(Meta::where(['hid' => $hid, 'lang' => $lang])->firstOrFail());
    }
}
