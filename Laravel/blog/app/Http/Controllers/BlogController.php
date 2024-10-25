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
        // dd(Auth()->user()->role);
        $user_id = Auth::id();
        $blogs = Blog::with(['Category', 'User'])->where('user_id', '=', $user_id)->get();
        return view('dashboard.blogs.view', ['blogs' => $blogs]);
    }

    public function delete($id)
    {
        Blog::destroy($id);
        return redirect()->back()->with('message', 'blog deleted successfully');
    }

    public function trash()
    {
        $blogs = Blog::onlyTrashed()->with(['Category', 'User'])->get();
        return view('dashboard.blogs.trash', ['blogs' => $blogs]);
    }

    public function restore($id)
    {
        $blog = Blog::onlyTrashed()->find($id);
        $blog->restore();
        return redirect()->back()->with('message', 'blog restored successfully');
    }

    public function delete_forever($id)
    {
        $blog = Blog::onlyTrashed()->find($id);
        unlink(public_path("/assets/thumbnails/$blog->thumbnail"));
        $blog->forceDelete();

        return redirect()->back()->with('message', 'blog deleted successfully');
    }

    public function pending()
    {
        if (Auth()->user()->role == 'writer') {
            return redirect()->route('dashboard')->with('message', 'unauthorized access');
        }

        $blogs = Blog::with(['Category', 'User'])
            ->where('status', '=', 'pending')
            ->get();

        return view('dashboard.blogs.pending', ['blogs' => $blogs]);
    }

    public function approve_blog($id)
    {
        Blog::where('id', $id)->update([
            'status' => 'approved'
        ]);
        return redirect()->back()->with('message', 'blog approved successfully');
    }

    public function reject(Request $request)
    {
        $id = $request->input()['id'];
        $reason = $request->input()['reason'];
        Blog::where('id', $id)->update([
            'status' => 'rejected',
            'reason' => $reason
        ]);

        return redirect()->back()->with('message', 'blog was rejected');
    }

    public function get_reason($id)
    {
        $blog = Blog::select(['id', 'reason', 'status', 'body'])->find($id);

        return $blog;
    }

    public function review($id)
    {
        Blog::where('id', $id)->update([
            'status' => 'pending'
        ]);

        return redirect()->back()->with('message', 'blog was sent for a review');
    }
}
