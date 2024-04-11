<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Favourite[] $favourites
 * @method \Illuminate\Database\Eloquent\Relations\HasMany favourites()
 */

class User extends Authenticatable
{
    use HasFactory;

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
}