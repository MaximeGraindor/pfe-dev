<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Badge extends Model
{
    use HasFactory, LogsActivity;

    public function users()
    {
        return $this->belongsToMany(User::class, 'badge_users');
    }
}
