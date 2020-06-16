<?php

use App\Http\Controllers\PostViewController;
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
    'experiences' => 'ExperienceController',
    'socialmedia' => 'SocialMediaController',
    'contactforms' => 'ContactFormController',
    'aboutsections' => 'AboutSectionController',
    'posts' => 'PostController',
    'metas' => 'MetaController',
]);
Route::get('metas/{hid}/{lang}', 'MetaController@withHid');

Route::get('posts/mdfile/{id}', 'PostController@mdFile');

Route::apiResource('posts.views', 'PostViewController')->only('store');
Route::apiResource('posts.votes', 'PostVoteController')->only('store');

