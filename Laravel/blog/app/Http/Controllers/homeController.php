<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home()
    {
        $blogs = Blog::with(['Category', 'User'])->get();
        return view('welcome', ['blogs' => $blogs]);
    }

    public function view_post($title)
    {
        $blog = Blog::with(['Category', 'User'])->where('title', $title)->get();
        return view('post', ['blog' => $blog]);
    }
}
