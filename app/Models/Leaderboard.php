<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'score',
    ];
    #username ga increment
    public $incrementing = false;
    #username karena pasti unique
    protected $primaryKey = 'username';
    protected $keyType = 'string';
}
