<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Professor;
use App\Models\ProfessorRating;
use App\Models\Student;
use App\Models\University;
use App\Models\UniversityRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class AdminController extends Controller
{
    //
    public function dashboard(){
            $university = University::count();
            $student = Student::where('type', 'student')->count();
            $professor = Professor::count();
            $univ_ratings = UniversityRating::count();
            $prof_ratings= ProfessorRating::count();
            return view('Admin.dashboard', compact('university','student', 'professor', 'univ_ratings', 'prof_ratings'));
    }

    public function admin_profile($id){
        $admin = Student::findorfail($id);
        return view('Admin.admin_profile', compact('admin'));
    }

    public function edit_admin($id){
        $admin = Student::findOrfail($id);
        return view('Admin.edit_admin', compact('admin'));
    }

    public function update_admin_profile(Request $request){

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:students,email,'.$request->id,
            'password' => [
                'required',
                'min:6',
                'max:150',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{3,}$/'
            ],
        ]);
        $admin = Student::findOrfail($request->id);
        $admin->student_name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->update();
        return redirect('dashboard')->with('msg', 'Your account has been updated with success');
    }

    public function  adlogout(){
        session()->forget('admin');
        session()->regenerate();
        return redirect('login');
    }
}
