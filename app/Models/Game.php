<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $dates = ['release_date'];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'game_users');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'game_images');
    }
}
