<?php

namespace App\Http\Controllers;

use App\Models\ProfessorRating;
use App\Models\UniversityRating;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function show_comment_prof(){
        $ratings = ProfessorRating::with('student')->get();
        return view('Admin.show_comment_prof', compact('ratings'));
    }

    public function disprof($id){
        $disable = ProfessorRating::findOrfail($id);
        $disable->status = 0;
        $disable->update();
        return back()->with('msg', 'Disable successfully');
    }

    public function actprof($id){
        $active = ProfessorRating::findOrfail($id);
        $active->status = 1;
        $active->update();
        return back()->with('msg', 'Activate successfully');
    }

    public function delete_profcomment($id){
        $delete = ProfessorRating::findOrfail($id);
        $delete->delete();
        return back()->with('msg', 'Delete with success');
    }

    public function show_comment_univ(){
        $ratings = UniversityRating::with('student')->get();
        return view('Admin.show_comment_univ', compact('ratings'));
    }

    public function disuniv($id){
        $disable = UniversityRating::findOrfail($id);
        $disable->status = 0;
        $disable->update();
        return back()->with('msg', 'Disable successfully');
    }

    public function actuniv($id){
        $active = UniversityRating::findOrfail($id);
        $active->status = 1;
        $active->update();
        return back()->with('msg', 'Activate successfully');
    }

    public function delete_univcomment($id){
        $delete = UniversityRating::findOrfail($id);
        $delete->delete();
        return back()->with('msg', 'Delete with success');
    }


}
