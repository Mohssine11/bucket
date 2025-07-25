<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'image' => 'required|image|max:2048',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            Storage::disk('s3')->put("students/{$filename}", file_get_contents($image), [
                'visibility' => 'public',
            ]);

            $imageUrl = Storage::disk('s3')->url("students/{$filename}");
        }

        Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'image' => $imageUrl,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'image' => 'nullable|image|max:2048',
        ]);

        $student = Student::findOrFail($id);
        $student->name = $validated['name'];
        $student->email = $validated['email'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            Storage::disk('s3')->put("students/{$filename}", file_get_contents($image), [
                'visibility' => 'public',
            ]);

            $student->image = Storage::disk('s3')->url("students/{$filename}");
        }

        $student->save();
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }
}

