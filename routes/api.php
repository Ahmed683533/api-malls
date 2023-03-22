<?php

use App\Http\Controllers\APi\AuthController;
use App\Http\Controllers\Api\postController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
});*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

// هعمل ميدل وير عشان مخليش حد يقدر يعمل الحاجات دي الا لم يعمل لوجين بالتوكن
Route::middleware(['jwt.verify'])->group(function () {
    // دة روت بكتبه في البراوز بيعرض api
    Route::get('/malls', [postController::class, 'index']);
    Route::get('/mall/{id}', [postController::class, 'show']);
    Route::post('/malls', [PostController::class, 'create']);
    Route::post('/mall/{id}', [postController::class, 'update']);
    Route::delete('/malls/{id}', [postController::class, 'destroy']);
});
