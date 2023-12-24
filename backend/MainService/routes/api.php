<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Meeting\DeleteMeeting;
use App\Http\Controllers\Meeting\GetMeeting;
use App\Http\Controllers\Meeting\GetMeetings;
use App\Http\Controllers\Meeting\StoreMeeting;
use App\Http\Controllers\User\DeleteUser;
use App\Http\Controllers\User\GetUser;
use App\Http\Controllers\User\GetUsers;
use App\Http\Controllers\User\StoreUser;
use App\Http\Controllers\User\UpdateUser;
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

Route::group(['middleware' => 'api'], function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
        Route::post('me', [AuthController::class, 'me'])->name('me');
    });

    Route::group(['prefix' => 'meetings', 'as' => 'meetings.'], function () {
        Route::post('/', StoreMeeting::class)
            ->middleware(['role:' . RoleEnum::Specialist->value . '|' . RoleEnum::Admin->value])
            ->name('store');
        Route::delete('/{id}', DeleteMeeting::class)
            ->middleware(['role:' . RoleEnum::Specialist->value . '|' . RoleEnum::Admin->value])
            ->name('destroy');
    });

    Route::group(['middleware' => 'role:' . RoleEnum::Admin->value, 'prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', GetUsers::class)->name('index');
        Route::get('/{id}', GetUser::class)->name('show');
        Route::post('/', StoreUser::class)->name('store');
        Route::post('/{id}', UpdateUser::class)->name('update');
        Route::delete('/{id}', DeleteUser::class)->name('destroy');
    });
});
