<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function create()
    {
        $teachers = Teacher::all();
        return view('teachers.create', ['teachers' => $teachers]);
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

    public function destroy($id)
    {
        Teacher::destroy($id);
        return redirect()->back()->with('message', 'data deleted from the database');
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('teachers.edit', ['teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:teachers,email,$id",
            'address' => 'required',
            'phone' => 'required|max_digits:11',
        ]);

        Teacher::find($id)->update($validated_data);

        return redirect('/teacher/create')->with('message', 'data updated successfully');
    }
}
