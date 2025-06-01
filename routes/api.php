<?php

use App\Http\Controllers\Api\AchievementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LeaderboardController;

//endpoint route utk user
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// endpoint route utk tabel leaderboard
Route::post('/submit-score', [LeaderboardController::class, 'submitScore']);
Route::get('/top-scores', [LeaderboardController::class, 'topScores']);

//endpoint untuk achievement
Route::post('/achievements',[AchievementController::class,'index']);
Route::post('/achievements/update',[AchievementController::class,'update']);