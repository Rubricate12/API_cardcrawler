<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class AchievementController extends Controller
{
    public function index(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string',
            ]);
    
            $user = User::where('username', $request->username)->first();
    
            if (!$user) {
                return response()->json(['error' => 'User not found.'], 404);
            }
    
            $unlocked = json_decode($user->achievements ?? '[]');
    
            return response()->json(['unlocked_ids' => $unlocked], 200);
    
        } catch (\Exception $e) {
            // Log the exact error for debugging
            Log::error('Error fetching achievements: '.$e->getMessage());
    
            return response()->json([
                'error' => 'An unexpected error occurred.',
            ], 500);
        }
    }

    public function update(Request $request)
    {
        Log::info('ENTERED AchievementController@update method at ' . now()); // <-- ADD THIS LINE

        $middlewares = Route::current()->gatherMiddleware();
        \Illuminate\Support\Facades\Log::debug('Middleware for /api/achievements/update:', $middlewares);
   
        $request->validate([
            'username' => 'required|string',
            'achievement_id' => 'required|integer'
        ]);
        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
        $unlocked = json_decode($user->achievements ?? '[]');

        if (!in_array($request->achievement_id, $unlocked)) {
            $unlocked[] = $request->achievement_id;
            $user->achievements = json_encode($unlocked);
            $user->save();
        }

        return response()->json(['message' => 'Achievement updated successfully.'], 200);
    }
}
