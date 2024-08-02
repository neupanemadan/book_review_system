<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'description', 'cover_image',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
