<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Professor;
use App\Models\University;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    //
    public function create_professor()
    {
        $departments = Department::get();
        $universities = University::get();
        return view('Admin.create_professor', compact('departments', 'universities'));
    }

    public function created_professor(Request $request)
    {
        $request->validate([
            'professor_name'=>'required|max:150',
            'department'=>'required|exists:departments,id',
            'university'=>'required|exists:universities,id'
        ]);
        $professor = new Professor();
        $professor->professor_name = $request->professor_name;
        $university = University::find($request->university);
        $department = Department::find($request->department);
        $professor->university()->associate($university);
        $professor->department()->associate($department);

        // Save the professor to the database
        $professor->save();
        return redirect('show_professor')->with('msg', 'Professor added successfully');

    }

    public function show_professor()
    {
        $professors = Professor::with(['university', 'department'])->get();
        return view('Admin.show_professor', compact('professors'));
    }

    public function edit_professor($id){
        $departments = Department::get();
        $universities = University::get();
        $professor = Professor::findorfail($id);
        return view('Admin.edit_professor', compact('professor', 'departments', 'universities'));
    }

    public function edited_professor(Request $request){
        $request->validate([
            'professor_name'=>'required|max:150',
            'department'=>'required|exists:departments,id',
            'university'=>'required|exists:universities,id'
        ]);
        $professor = Professor::findorfail($request->id);
        $professor->professor_name = $request->professor_name;
        $university = University::find($request->university);
        $department = Department::find($request->department);
        $professor->university()->associate($university);
        $professor->department()->associate($department);
        $professor->update();
        return redirect('show_professor')->with('msg', 'Professor edited successfully');
    }

    public function delete_professor($id){
        $professor = Professor::findorfail($id);
        $professor->delete();
        return redirect('show_professor')->with('msg', 'Professor deleted successfully');
    }
}
