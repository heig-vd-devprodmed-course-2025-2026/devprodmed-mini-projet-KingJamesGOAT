<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // On autorise l'assignation de masse pour le champ 'name'
    protected $fillable = ['name'];

    // Relation "Un à Plusieurs" : Une catégorie possède plusieurs publications
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
