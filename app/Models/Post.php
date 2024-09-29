<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'category_id', 'image', 'views', 'banner'
    ];
    

    /**
     * Post'un sahibi (yazarı).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Post'un kategorisi.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
