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

Route::apiResources([
    'experience' => 'ExperienceController',
    'socialMedia' => 'SocialMediaController',
    'contactForm' => 'ContactFormController',
    'aboutSection' => 'AboutSectionController',
    'meta' => 'MetaController',
    'post' => 'PostController',
]);

Route::get('meta/{hid}/{lang}', 'MetaController@getWithHid');

Route::get('post/getMdFile/{id}', 'PostController@getMdFile');

Route::prefix('postView')->group(function () {
    Route::post('increase', 'PostViewController@increase');
});

