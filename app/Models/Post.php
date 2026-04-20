<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id', // On ajoute category_id pour autoriser sa sauvegarde
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Nouvelle relation : Une publication appartient à une seule catégorie
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->using(Like::class)->withTimestamps()->withPivot('reaction');
    }

    // Relation Plusieurs-à-Plusieurs : Une publication peut être mise en favoris par plusieurs utilisateurs
    public function favoritedBy(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}
