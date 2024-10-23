<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function add()
    {
        return view('dashboard.blogs.create', ['categories' => Category::all()]);
    }

    public function add_post(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp,svg|max:5000',
            'category' => 'required'
        ]);

        $newFileName = $this->upload_image($request);

        Blog::create([
            'title' => $validated_data['title'],
            'excerpt' => $validated_data['excerpt'],
            'body' => $validated_data['body'],
            'thumbnail' => $newFileName,
            'category_id' => $validated_data['category'],
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('message', 'blog added to the database');
    }

    public function upload_image($image)
    {
        $newFileName = time() . '.' . $image->thumbnail->extension();
        $image->thumbnail->move(public_path('/assets/thumbnails'), $newFileName);

        return $newFileName;
    }

    public function view()
    {
        $blogs = Blog::with(['Category', 'User'])->get();
        return view('dashboard.blogs.view', ['blogs' => $blogs]);
    }
}
