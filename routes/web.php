<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
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

    Route::post('/post/{post}',[PostLikesController::class, 'store'])->name('likePost');
    Route::delete('/postLike/{post}',[PostLikesController::class, 'destroy'])
        ->name('dislikePost');

    Route::post('/post/{post}/comment',[CommentController::class, 'store'])->name('comment');
    Route::post('/comment/{comment}',[CommentLikesController::class, 'store'])->name('likeComment');
    Route::delete('/commentLike/{comment}',[CommentLikesController::class, 'destroy'])->name('dislikeComment');

});
