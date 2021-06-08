<?php

namespace App\Models;

use App\Models\Badge;
use App\Models\ActivityLog;
use Overtrue\LaravelFollow\Followable;
use Overtrue\LaravelLike\Traits\Liker;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Contracts\Activity;
use Nagy\LaravelRating\Traits\Rate\CanRate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Followable, Liker, CanRate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo',
        'picture',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_users')->withPivot('relation');
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }
    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'badge_users');
    }
    public function activities()
    {
        return $this->hasMany(ActivityLog::class, 'causer_id');
    }

    // ATTRIBUTES
    public function getIsAdminAttribute()
    {
        return (bool) $this->roles->filter(function($role){
            return $role->name === 'admin';
        })->count();

    }

    public function getIsUserAttribute()
    {
        return (bool)$this->roles->filter(function ($role) {
            return $role->name === 'user';
        })->count();
    }

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'App.Models.User.'.$this->id;
    }


}
