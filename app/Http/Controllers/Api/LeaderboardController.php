<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaderboard;
use Illuminate\Support\Facades\Log;

class LeaderboardController extends Controller
{
    // Add or Update leaderboard score
    // POST karena ada request di param
    public function syncLeaderboard(Request $request)
    {
        #validasi dulu tipenya
        $request->validate([
            'username' => 'required|string|max:30',
            'score' => 'required|integer',
        ]);
        #update ato tambahkan attribute jika tidak ada
        $leaderboard = Leaderboard::create(
            ['username' => $request->username, 'score' => $request->score]
        );

        #kembalikan dalam json
        return response()->json([
            'message' => 'Score submitted successfully!',
            'leaderboard' => $leaderboard,
        ]);
    }

    // Get top 10, jika diflutter app blum ada
    public function showLeaderboard()
    {
        #ambil leaderboard yang diurutkan menurun berdasarkan score
        $rank = Leaderboard::orderByDesc('score')->take(10)->get();
        Log::info('Leaderboard response:', $rank->toArray()); // Or Log::info($rank->toJson());
        return response()->json($rank);
    }
}

