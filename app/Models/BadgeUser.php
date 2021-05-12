<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BadgeUser extends Model
{
    use HasFactory, LogsActivity;

    protected static $recordEvents = ['created'];
}
