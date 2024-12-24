<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    //
    public function create_university()
    {
        return view('Admin.create_university');
    }

    public function created_university(Request $request)
    {
        $request->validate([
            "university_name" => "required|max:150",
            "country" => "required|max:150",
            "city" => "required|max:100",
            "website" => "required|url|max:150",
            "email" => "required|email|max:150",
            "email_domain" => 'required|max:100'
        ]);
        $university = new University();
        $university->university_name = $request->university_name;
        $university->country = $request->country;
        $university->city = $request->city;
        $university->website = $request->website;
        $university->email = $request->email;
        $university->email_domain = $request->email_domain;

        $university->save();
        return redirect('show_university')->with('msg', 'University added with success');
    }

    public function show_university()
    {
        $universities = University::get();
        return view('Admin.show_university', compact('universities'));
    }

    public function edit_university($id)
    {
        $university = University::findorfail($id);
        return view('Admin.edit_university', compact('university'));
    }

    public function edited_university(Request $request)
    {
        $request->validate([
            "university_name" => "required|max:150",
            "country" => "required|max:150",
            "city" => "required|max:100",
            "website" => "required|url|max:150",
            "email" => "required|email|max:150",
            "email_domain" => 'required|max:100'
        ]);
        $university = University::findorfail($request->id);
        $university->university_name = $request->university_name;
        $university->country = $request->country;
        $university->city = $request->city;
        $university->website = $request->website;
        $university->email = $request->email;
        $university->email_domain = $request->email_domain;
        $university->update();
        return redirect('show_university')->with('msg', 'University edited succesfully');
    }

    public function delete_university($id)
    {
        $university = University::findorfail($id);
        $university->delete();
        return redirect('show_university')->with('msg', 'University deleted succesfully');
    }

    public function compare(Request $request)
    {
        $universityId = $request->input('university_id');
        $selectedUniversity = University::find($universityId);

        if (!$selectedUniversity) {
            return response()->json(['error' => 'University not found'], 404);
        }

        // You can retrieve ratings however you've set up in your database.
        $ratings = $selectedUniversity->ratings;

        return response()->json(['ratings' => $ratings]);
    }
}