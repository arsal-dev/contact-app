<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home()
    {
        $blogs = Blog::with(['Category', 'User'])->paginate(2);
        return view('welcome', ['blogs' => $blogs]);
    }

    public function view_post($title)
    {
        $blog = Blog::with(['Category', 'User'])->where('title', $title)->get();
        return view('post', ['blog' => $blog]);
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'query' => 'required',
        ]);

        $query = $validatedData['query'];

        $blogs = Blog::where('title', 'LIKE', "%$query%")
            ->orWhere('excerpt', 'LIKE', "%$query%")
            ->orWhere('body', 'LIKE', "%$query%")
            ->with(['Category', 'User'])
            ->get();

        return view('search', ['search' => $query, 'blogs' => $blogs]);
    }

    public function writers()
    {
        $users = User::all();
        return view('writeres', ['users' => $users]);
    }

    public function user_blogs($name)
    {
        $user = User::where('name', $name)->get();
        $user_id = $user[0]->id;
        $blogs = Blog::with(['Category', 'User'])
            ->where('user_id', '=', $user_id)
            ->get();

        return view('writer_blogs', ['blogs' => $blogs, 'name' => $name]);

        // $user = User::with('Blogs')->where('name', '=', $name)->get();
        // dd($user);
    }
}
