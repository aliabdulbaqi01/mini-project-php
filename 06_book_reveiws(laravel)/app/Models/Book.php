<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{
    use HasFactory;
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    /*
     * scope query to find by title column
     */
    public function scopeTitle(Builder $query, string $title) : Builder
    {
        return $query->where('title', 'LIKE', "%$title%");
    }
}
