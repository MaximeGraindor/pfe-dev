<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'content',
    ];

    protected static $logAttributes = ['*'];

    public function game()
    {
        return $this->hasOne(Game::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
