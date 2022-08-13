<?php

use App\Http\Controllers\QuestionChoicesController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserResponseController;
use App\Models\Question;
use App\Models\QuestionChoices;
use App\Models\UserResponse;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('questions', QuestionController::class);
Route::apiResource('user_responses', UserResponseController::class);
Route::apiResource('question_choices', QuestionChoicesController::class);