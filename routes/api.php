<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
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

    /**
     * Public Routes
     */

//Auth
Route::post('register/', [AuthController::class, 'register']);
Route::post('login/', [AuthController::class, 'login']);

//Questions
Route::get('questions/', [QuestionController::class, 'index']);
Route::get('questions/{id}', [QuestionController::class, 'show']);
Route::get('questions/search/{question}', [QuestionController::class, 'search']);


    /**
     * Protected Routes
     */

Route::group(['middleware'=>['auth:sanctum']], function (){
    //Auth
    Route::post('logout/', [AuthController::class, 'logout']);

    //Questions
    Route::post('questions/', [QuestionController::class, 'store']);
    Route::put('questions/{id}', [QuestionController::class, 'update']);
    Route::delete('questions/{id}', [QuestionController::class, 'destroy']);
});
