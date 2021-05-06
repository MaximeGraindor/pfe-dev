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

    public function modes()
    {
        return $this->belongsToMany(Mode::class, 'game_modes');
    }

    public function plateformes()
    {
        return $this->belongsToMany(Plateforme::class, 'game_plateformes');
    }

    public function supports()
    {
        return $this->belongsToMany(Support::class, 'game_supports');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genres');
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
