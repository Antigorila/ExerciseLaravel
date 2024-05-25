<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SoulLinkController;
use App\Http\Controllers\SoulLinksRequestController;
use App\Http\Controllers\SuspendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('api_files', FileController::class);
Route::apiResource('api_comments', CommentController::class);
Route::apiResource('api_replies', ReplyController::class);
Route::apiResource('api_soul_links', SoulLinkController::class);
Route::apiResource('api_soul_links_requests', SoulLinksRequestController::class);
Route::apiResource('api_suspends', SuspendController::class);

Route::put('api_comments/{comment}/like', [CommentController::class, 'like'])->name('api_comments.like');
Route::put('api_replies/{reply}/like', [ReplyController::class, 'like'])->name('api_replies.like');