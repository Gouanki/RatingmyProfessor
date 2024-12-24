<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    //
    public function create_course()
    {
        return view('Admin.create_course');
    }

    public function created_course(Request $request)
    {
        $request->validate([
            "course_name" => "required|max:100",
            "course_code" => "required|unique:courses,code|max:100"
        ]);
        $course = new Course();
        $course->course_name = $request->course_name;
        $course->code = $request->course_code;
        $course->save();
        return redirect('show_course')->with('msg', 'course added successfully');
    }

    public function show_course()
    {
        $course = Course::get();
        return view('Admin.show_course')->with('courses', $course);
    }

    public function edit_course($id)
    {
        $course = Course::findorfail($id);
        return view('Admin.edit_course')->with('course', $course);
    }

    public function edited_course(Request $request){
        $request->validate([
            "course_name" => "required|max:100",
            "course_code" => "required|max:100"
        ]);
        $course = Course::findorfail($request->id);
        $course->course_name = $request->course_name;
        $course->code = $request->course_code;
        $course->update();
        return redirect('show_course')->with('msg', 'course edited successfully');
    }

    public function delete_course($id){
        $course = Course::findorfail($id);
        $course->delete();
        return redirect('show_course')->with('msg', 'course deleted successfully');
    }
}
