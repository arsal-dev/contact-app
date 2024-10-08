<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function create()
    {
        return view('teachers.create');
    }

    public function upload(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers',
            'address' => 'required',
            'phone' => 'required|max_digits:11',
        ]);

        Teacher::create($validated_data);

        return redirect('/teacher/create')->with('message', 'data added to the database');
    }
}
