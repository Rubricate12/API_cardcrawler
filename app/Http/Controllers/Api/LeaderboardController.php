<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaderboard;

class LeaderboardController extends Controller
{
    // Add or Update leaderboard score
    public function submitScore(Request $request)
    {
        #validasi dulu tipenya
        $request->validate([
            'username' => 'required|string',
            'score' => 'required|integer',
        ]);
        #update ato tambahkan
        $leaderboard = Leaderboard::updateOrCreate(
            ['username' => $request->username],
            ['score' => $request->score]
        );
        #kembalikan dalam json
        return response()->json([
            'message' => 'Score submitted!',
            'leaderboard' => $leaderboard,
        ]);
    }

    // Get top 10, jika diflutter app blum ada
    public function topScores()
    {
        #ambil leaderboard yang diurutkan menurun berdasarkan score
        $leaderboards = Leaderboard::orderByDesc('score')->take(10)->get();

        return response()->json($leaderboards);
    }
}

