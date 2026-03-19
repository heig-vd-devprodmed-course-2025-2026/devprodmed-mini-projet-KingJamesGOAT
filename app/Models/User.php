<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'likes')->using(Like::class)->withTimestamps()->withPivot('reaction');
    }
}
