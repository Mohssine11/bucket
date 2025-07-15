<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller{
    public function index(){
        $etudients=Student::all();
        return view('students.index', compact('etudients')); 
    }
    public function create(){
        return view('students.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image|max:2048',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;

        if ($request->hasFile('image')) {
            $student->image = $request->file('image')->store('images', 'public');
        }

        $student->save();
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }
    public function edit($id){
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image|max:2048',
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;

        if ($request->hasFile('image')) {
            $student->image = $request->file('image')->store('images', 'public');
        }

        $student->save();
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
    public function show($id){
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }



}
