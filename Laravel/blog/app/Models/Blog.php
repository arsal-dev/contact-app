<?php

namespace App\Models;

// use App\Models\User;
// use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'excerpt', 'body', 'thumbnail', 'category_id', 'user_id'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
