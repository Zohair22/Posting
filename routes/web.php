<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

chat %

git add .
git commit -m "existing file"
git push

*/


Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    Route::get('/',[Controller::class, 'index'])->name('dashboard');
    Route::post('/post',[PostController::class, 'store'])->name('poster');
    Route::delete('/post/{post}/delete',[PostController::class, 'destroy'])->name('deletePost');

    Route::get('/profile/{user}',[ProfileController::class, 'profile'])->name('profileTimeline');

    Route::get('/follow/{user}',[FollowController::class, 'store'])->name('follow');
    Route::get('/unFollow/{user}',[FollowController::class, 'delete'])->name('unFollow');

    Route::post('/post/{post}',[PostLikesController::class, 'store'])->name('likePost');
    Route::delete('/postLike/{post}',[PostLikesController::class, 'destroy'])->name('dislikePost');

    Route::post('/post/{post}/comment',[CommentController::class, 'store'])->name('comment');
    Route::post('/comment/{comment}',[CommentLikesController::class, 'store'])->name('likeComment');
    Route::delete('/commentLike/{comment}',[CommentLikesController::class, 'destroy'])->name('dislikeComment');

    Route::get('/message/{user}',[MessageController::class, 'messages'])->name('message');
    Route::post('/message/{user}/send',[MessageController::class, 'send'])->name
    ('sendMessage');

});
