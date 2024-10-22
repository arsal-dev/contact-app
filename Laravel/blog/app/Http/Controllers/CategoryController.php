<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add()
    {
        return view('dashboard.categories.add');
    }

    public function add_post(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Category::create($validated_data);

        return redirect()->back()->with('message', 'category added to the database');
    }

    public function view()
    {
        $categories = Category::all();
        return view('dashboard.categories.view', ['categories' => $categories]);
    }
}
