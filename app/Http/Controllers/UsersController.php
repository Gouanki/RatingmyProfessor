<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function show_users(){
        $students = Student::with(['university'])->get();
        return view('Admin.show_users', compact('students'));
    }

    public function role($id){
        $user = Student::findorfail($id);
        return view('Admin.update_users_role', compact('user'));
    }

    public function edited_role(Request $request){
        $request->validate([
            'role'=> 'required|max:15'
        ]);
        $user = Student::findorfail($request->id);
        $user->type = $request->role;
        $user->update();
        return redirect('show_users')->with('msg', 'The user role has been upadated with success');
    }

    public function delete_student($id){
       $student = Student::findorfail($id);
       $student->delete();
       return redirect('show_users')->with('msg', 'User delete successfully');
    }
}
