<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as userGuard;

class User extends userGuard
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return "username";
    }
}
