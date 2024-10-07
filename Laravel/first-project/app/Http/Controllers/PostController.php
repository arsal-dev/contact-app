<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show()
    {
        // return Post::where('id', '<', 50)->orWhere('id', 100)->get();
        // return Post::select('title')->get();
        return Post::where('id', 521)
            ->get();
    }

    public function create()
    {
        Post::create([
            'title' => 'my new title',
            'body' => 'my new body'
        ]);

        return 'data created into the databse';
    }

    public function update()
    {
        Post::find(521)->update([
            'title' => 'new title updated',
            'body' => 'my new body updated'
        ]);

        return 'data updated in the databse';
    }

    public function delete()
    {
        Post::destroy(521);
    }
}
