<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Http\Resources\ContactFormResource as ContactFormResource;

class ContactFormController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api')->except(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContactFormResource::collection(ContactForm::all()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactForm = ContactForm::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'description' => $request->description,
        ]);
    
        return new ContactFormResource($contactForm);
    }

    /**
     * Display the specified resource.
     *
     * @param  ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function show(ContactForm  $contactForm)
    {
        return new ContactFormResource($contactForm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactForm  $contactForm)
    {
        $contactForm->delete();

        return response()->json(null, 204);
    }
}
