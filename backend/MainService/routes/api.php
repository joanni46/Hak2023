<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Meeting\GetMeeting;
use App\Http\Controllers\Meeting\GetMeetings;
use Illuminate\Http\Request;
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

Route::group(['prefix' => 'meetings', 'as' => 'meetings.'], function () {
    Route::get('/', GetMeetings::class)->name('index');
    Route::get('/{id}', GetMeeting::class)->name('show');
});

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::group(['middleware' => 'api', 'prefix' => 'auth', 'as' => 'auth.'], function ($router) {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [AuthController::class, 'me'])->name('me');
});
