<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LeaderboardController;

// Simple example route
Route::get('/example', function () {
    return response()->json(['message' => 'Hello from Laravel API!']);
});
//endpoint route utk tabel user
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// endpoint route utk tabel leaderboard
Route::post('/submit-score', [LeaderboardController::class, 'submitScore']);
Route::get('/top-scores', [LeaderboardController::class, 'topScores']);