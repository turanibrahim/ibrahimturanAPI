<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('experience', 'ExperienceController')->except(['show']);
Route::get('experience/{lang}', 'ExperienceController@index');
Route::apiResource('socialMedia', 'SocialMediaController')->except(['show']);
Route::apiResource('contactForm', 'ContactFormController');
Route::apiResource('aboutSection', 'AboutSectionController')->except(['show']);
Route::get('aboutSection/{lang}', 'AboutSectionController@index');
