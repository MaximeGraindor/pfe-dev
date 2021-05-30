<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory, Rateable;

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

    public function screenshots()
    {
        return $this->belongsToMany(Screenshot::class, 'game_screenshots');
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'game_publishers');
    }
}
