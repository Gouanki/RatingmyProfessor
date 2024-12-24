<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function create_department(){
        return view('Admin.create_department');
    }

    public function created_department(Request $request){
        $request->validate([
            'department_name'=>'required|unique:departments|max:100'
        ]);
        $department = new Department();
        $department->department_name = $request->department_name;
        $department->save();
        return redirect('show_department')->with('msg', 'Department added successfully');
    }

    public function show_department(){
        $departments =  Department::get();
        return view('Admin.show_department', compact('departments'));
    }

    public function edit_department($id){
        $department = Department::findorfail($id);
        return view('Admin.edit_department', compact('department'));
    }

    public function edited_department(Request $request){
        $request->validate([
            'department_name'=>'required|max:100'
        ]);
        $department= Department::findorfail($request->id);
        $department->department_name = $request->department_name;
        $department->update();
        return redirect('show_department')->with('msg', 'Department edited successfully');
    }

    public function delete_department($id){
        $department= Department::findorfail($id);
        $department->delete();
        return redirect('show_department')->with('msg', 'Department deleted successfully');
    }

}
