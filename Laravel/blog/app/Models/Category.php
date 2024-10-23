<?php

namespace App\Models;

// use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'description'];

    public function Blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
