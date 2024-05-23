<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check())
    {
        return view('home');
    }
    else
    {
        return view('welcome');
    }
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('files', App\Http\Controllers\FileController::class);

Route::resource('comments', App\Http\Controllers\CommentController::class);
Route::put('comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');

Route::resource('replies', App\Http\Controllers\ReplyController::class);
Route::put('replies/{reply}/like', [ReplyController::class, 'like'])->name('replies.like');

Route::resource('soul_links', App\Http\Controllers\SoulLinkController::class);

Route::resource('soul_links_requests', App\Http\Controllers\SoulLinksRequestController::class);

Route::resource('suspends', App\Http\Controllers\SuspendController::class);