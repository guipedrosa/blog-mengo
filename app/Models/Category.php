<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'slug'];

    // public function posts(): BelongsToMany
    // {
    //     return $this->belongsToMany(Post::class);
    // }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'categoriable');
    }

    public function products(): MorphToMany
    {
        return $this->belongsToMany(Product::class, 'categoriable');
    }
    
}
