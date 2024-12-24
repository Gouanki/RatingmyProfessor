<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Professor;
use App\Models\ProfessorRating;
use App\Models\Student;
use App\Models\University;
use App\Models\UniversityRating;
use App\Rules\NoProfanity;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class CLientController extends Controller
{
    // API
    //
    public function home()
    {
        return view('client.home');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $universities = University::where('university_name', 'like', "%$keyword%")->get();
        $professors = Professor::where('professor_name', 'like', "%$keyword%")->get();

        if ($request->ajax()) {
            return response()->json(['universities' => $universities, 'professors' => $professors]);
        }

        if ($universities->count() > 0) {
            return view('client.student_show_universities', compact('universities'));
        } elseif ($professors->count() > 0) {
            return view('client.student_show_professors', compact('professors'));
        } else {
            return view('client.no_found');
        }
    }

    public function autocomplete(Request $request)
    {
        $term = $request->input('term');

        $universities = University::where('university_name', 'like', "%$term%")->pluck('university_name');
        $professors = Professor::where('professor_name', 'like', "%$term%")->pluck('professor_name');

        $results = $universities->merge($professors)->toArray();

        return response()->json($results);
    }

    public function sign()
    {
        $universities = University::get();
        return view('client.signup', compact('universities'));
    }

    public function create_student(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => [
                'required',
                'email',
                'max:150',
                'unique:students,email',
                // 'doesnt_end_with:@gmail.com',
                function ($attribute, $value, $fail) use ($request) {
                    $university = University::find($request->university);
                    if ($university) {
                        $emailDomain = substr(strrchr($value, "@"), 1);
                        if ($emailDomain !== $university?->email_domain) {
                            $fail('You have to sign up with your university email example@' . $university?->email_domain);
                        }
                    } else {
                        $fail('Invalid university selected.');
                    }
                },
            ],
            'password' => [
                'required',
                'min:6',
                'max:150',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{3,}$/'
            ],
            'university' => 'required|exists:universities,id'
        ]);
        $student = new Student();
        $student->student_name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $university = University::findOrfail($request->university);
        $student->university()->associate($university);
        $student->save();
        // email verification
        $token = Str::random(64);
        DB::table('email_verification_tokens')->insert([
            'email' => $student->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('email.verify_email', ['token' => $token, 'name' => $student->student_name], function ($message) use ($student) {
            $message->to($student->email)->subject('Verify Your Email Address');
        });
        return redirect('/login')->with('msg_account', 'Account created successfully. Please check your email to verify your account.');
    }
    public function confirmsub($token)
    {
        $verification = DB::table('email_verification_tokens')->where('token', $token)->first();
        if ($verification) {
            $student = Student::where('email', $verification->email)->first();
            if ($student) {
                $student->email_verified_at = Carbon::now();
                $student->save();
                DB::table('email_verification_tokens')->where('token', $token)->delete();
                return redirect('/login')->with('msg_account', 'Email verified successfully. Please login to continue.');
            } else {
                return redirect('/login')->with('msg_account', 'Invalid token');
            }
        } else {
            return redirect('/login')->with('msg_account', 'Invalid token');
        }
    }

    public function login()
    {
        return view('client.login');
    }

    public function student_logged(Request $request)
    {
        $request->validate([
            'email' => 'required|max:100',
            'password' => 'required|max:100'
        ]);
        $student = Student::where('email', $request->email)->whereNotNull('email_verified_at')->first();
        if ($student) {
            # code...
            if (Hash::check($request->password, $student->password)) {
                # code...
                if ($student->type == 'student') {
                    # code...
                    session(['student' => $student]);
                    return redirect('/')->with('msg', 'Logged successfully');
                } else if ($student->type == 'admin') {
                    session(['admin' => $student]);
                    return redirect('/dashboard')->with('msg', 'Logged successfully');
                }
            } else {
                // Incorrect password
                return back()->with('msg', 'Wrong password');
            }
        } else {
            # code...
            return back()->with('msg', 'Please rerify your email address to confirm your account.');
        }
    }

    public function logout()
    {
        session()->forget('student');
        session()->regenerate();
        return redirect('/')->with('msg', 'You have logged out with success');
    }

    public function client_show_university()
    {
        $universities = University::with('ratings')->get();
        return view('client.student_show_universities', compact('universities'));
    }

    public function university_rating($id)
    {
        $university = University::findOrfail($id);
        $ratings = UniversityRating::where('university_id', $id)->with('student')->where('status', 1)->get();
        return view('client.university_rating', compact('ratings', 'university'));
    }

    public function rate()
    {
        $universities = UniversityRating::with(['university'])
            ->selectRaw('university_id, AVG((reputation + location + opportunity + club + food + happiness + safety + internet) / 8) AS quality')
            ->groupBy('university_id')
            ->having('quality', '>', 3)
            ->orderBy('quality', 'desc')
            ->where('status', 1)
            ->paginate(2);
        $professors = ProfessorRating::with(['professor'])
            ->selectRaw('professor_id, AVG((((grade / 100) * 5)+ (((used_textbooks + listened_to_students + take_again)/3)*5)) / 2) AS quality')
            ->groupBy('professor_id')
            ->having('quality', '>', 3)
            ->orderBy('quality', 'desc')
            ->where('status', 1)
            ->paginate(2);
        return view('client.rate', compact('universities', 'professors'));
    }

    public function university($id)
    {
        if (session()->has('student')) {
            # code...
            $university = University::findOrfail($id);
            return view('client.form_university', compact('university'));
        } else {
            # code...
            return redirect('login');
        }
    }

    public function rate_university(Request $request)
    {
        if (session()->has('student')) {
            $request->validate([
                'comment' => [
                    'required',
                    'string',
                    'max:250',
                    NoProfanity::make(),
                ],
                'reputation' => 'required',
                'location' => 'required',
                'opportunity' => 'required',
                'internet' => 'required',
                'food' => 'required',
                'club' => 'required',
                'happiness' => 'required',
                'safety' => 'required',
            ]);
            $student = Student::find(session('student')->id);
            $university = University::find($request->id);
            $existingRating = UniversityRating::where('student_id', $student->id)
                ->where('university_id', $university->id)
                ->first();
            if ($student->university_id !== $university->id) {
                return redirect()->back()->with('msg', 'Sorry you are not a student of this university');
            }
            if ($existingRating) {

                return redirect()->back()->with('msg', 'You have already rated this university.');
            }
            $university_rate = new UniversityRating();
            $university_rate->comment = $request->comment;
            $university_rate->reputation = $request->reputation;
            $university_rate->location = $request->location;
            $university_rate->opportunity = $request->opportunity;
            $university_rate->internet = $request->internet;
            $university_rate->food = $request->food;
            $university_rate->club = $request->club;
            $university_rate->happiness = $request->happiness;
            $university_rate->safety = $request->safety;

            // Associate the university rating with the student and university
            $university_rate->student()->associate($student);
            $university_rate->university()->associate($university);

            $university_rate->save();
            return redirect('/')->with('msg', 'Thank you for rating this university!');
        } else {
            return redirect('login');
        }
    }

    public function compare(Request $request, $id)
    {


        // Check if a university ID is provided

        // Logic for comparing with the provided university ID
        $university = University::findOrFail($id);
        $ratings = UniversityRating::where('university_id', $id)->with('student')->where('status', 1)->get();
        return view('client.compare_university', compact('university', 'ratings'));
    }
    public function compare_univ(Request $request)
    {
        $request->validate([
            'compare' => 'required'
        ]);
        // Logic for comparing with or without the university ID

        $university = University::findOrFail($request->universityID);
        $ratings = UniversityRating::where('university_id', $request->universityID)->with('student')->where('status', 1)->get();
        $compare = $request->compare;
        $universityToCompare = University::where('university_name', 'like', "%$compare%")->first();
        if ($universityToCompare?->count() > 0) {
            # code...
            $ratingsForComparison = UniversityRating::where('university_id', $universityToCompare->id)->where('status', 1)->get();

            // Return the view with data of both universities
            return view('client.compare_university', compact('university', 'ratings', 'ratingsForComparison', 'universityToCompare'));
        } else {
            return view('client.no_found');
        }
    }

    public function professor_rating($id)
    {
        $professor  = Professor::findOrfail($id);
        $ratings = ProfessorRating::where('professor_id', $id)->where('status', 1)->with(['student'])->orderBy('created_at', 'desc')->get();
        return view('client.professor_rating', compact('professor', 'ratings'));
    }

    public function professor($id)
    {
        if (session()->has('student')) {
            # code...
            $professor = Professor::findOrfail($id);
            $courses = Course::get();
            return view('client.form_professor', compact('courses', 'professor'));
        } else {
            return redirect('login');
        }
    }

    public function rate_professor(Request $request)
    {

        if (session()->has('student')) {
            $request->validate([
                'textbooks' => 'required|in:0,1',
                'listened_to_students' => 'required|in:0,1',
                'take_again' => 'required|in:0,1',
                'grade' => 'required|numeric',
                'gy_Professor' => 'required',
                'difficult_professor' => 'required',
                'comment' => [
                    'required',
                    'string',
                    'max:250',
                    NoProfanity::make(),
                ]
            ]);
            $professor = Professor::findOrfail($request->id);
            $student = Student::findOrfail(session('student')->id);


            $existingRating = ProfessorRating::where([
                'professor_id' => $professor->id,
                'student_id' => $student->id,
                'course_id' => $request->course,
                'course_name' => $request->course_name,
            ])->first();

            if ($existingRating) {
                return back()->with('msg', 'You have already rated this professor for the same course.');
            }

            // Check if the student and professor belong to the same university
            if ($student->university_id != $professor->university_id) {
                return back()->with('msg', 'You can only rate professors from your own university.');
            }

            $professor_rating = new ProfessorRating();
            if ($request->course === 'other') {
                $request->validate([
                    'course_name' => 'required|string|max:255',
                ]);

                $professor_rating->course_id = null;
                $professor_rating->course_name = $request->course_name;
            } else {
                $request->validate([
                    'course' => 'required',
                ]);

                $professor_rating->course_id = $request->course;
                $professor_rating->course_name = null;
            }
            $professor_rating->gradeProfessor = $request->gy_Professor;
            $professor_rating->difficultyProfessor = $request->difficult_professor;
            $professor_rating->grade = $request->grade;
            $professor_rating->used_textbooks = $request->textbooks;
            $professor_rating->listened_to_students = $request->listened_to_students;
            $professor_rating->take_again = $request->take_again;
            $professor_rating->comment = $request->comment;
            $professor_rating->professor()->associate($professor);
            $professor_rating->student()->associate($student);
            $professor_rating->save();
            return redirect('')->with('msg', 'Thank you for having rated this professor');
        } else {
            return redirect('login');
        }
    }

    public function student_profile($id)
    {
        $student = Student::with('university')->findOrfail($id);
        return view('client.client_profile', compact('student'));
    }

    public function edit_profile($id)
    {
        $student = Student::findOrfail($id);
        // $universities = University::get();
        return view('client.student_edit_profile', compact('student'));
    }

    public function edited_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:students,email,' . $request->id,
            'password' => [
                'required',
                'min:6',
                'max:150',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{3,}$/'
            ],
        ]);
        $student = Student::findOrfail($request->id);
        // $university = University::findOrfail($request->university);
        $student->student_name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);;
        // $student->university()->associate($university);
        $student->update();
        return redirect('/')->with('msg', 'Your account has been updated with success');
    }

    public function delete_profile($id)
    {
        $student = Student::findOrfail($id);
        $student->delete();
        session()->forget('student');
        session()->regenerate();
        return redirect('/')->with('msg', 'Your account has been delete with success');
    }


    public function add_university()
    {
        return view('client.add_university');
    }

    public function client_create_university(Request $request)
    {
        $request->validate([
            "university_name" => "required|max:150",
            "country" => "required|max:150",
            "city" => "required|max:100",
            "website" => "required|url|max:150",
            "university_email" => "required|email|max:150"
        ]);
        $university = new University();
        $university->university_name = $request->university_name;
        $university->country = $request->country;
        $university->city = $request->city;
        $university->website = $request->website;
        $university->email = $request->university_email;
        $university->save();
        return back()->with('msg', 'University added successfully');
    }

    public function add_professor()
    {
        $departments = Department::get();
        $universities = University::get();
        return view('client.add_professor', compact('departments', 'universities'));
    }

    public function client_create_professor(Request $request)
    {
        $request->validate([
            'professor_name' => 'required|max:150',
            'department' => 'required|exists:departments,id',
            'university' => 'required|exists:universities,id'
        ]);
        $professor = new Professor();
        $professor->professor_name = $request->professor_name;

        $department = Department::findOrfail($request->department);
        $university = University::findOrfail($request->university);

        $professor->department()->associate($department);
        $professor->university()->associate($university);

        $professor->save();

        return back()->with('msg', 'Professor created successfully');
    }

    public function student_show_professors()
    {
        $professors = Professor::with(['univerdity', 'ratings'])->all();
        return view('client.student_show_professors', compact('professors'));
    }

    // forget password
    public function forgotpassword()
    {
        return view('client.forgetpassword');
    }
    public function verify_email(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email|unique:password_reset_tokens,email'
        ]);
        $token = Str::random();
        DB::insert('insert into password_reset_tokens (email, token, created_at) values (?, ?, ?)', [
            $request->email,
            $token,
            Carbon::now()
        ]);
        // send mail
        Mail::send('Client.forgetPassword_message', ['token' => $token], function ($response) use ($request) {
            $response->to($request->email)->subject('Reset Password');
        });
        return back()->with('msg', 'Check your email for password reset instructions.');
    }
    public function resetpassword($token)
    {
        return view('client.ressetPass', compact('token'));
    }
    public function confirm_reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students',
            'password' => [
                'required',
                'min:6',
                'max:150',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{3,}$/'
            ],
            'confirm_password' => 'required|same:password'
        ]);
        $token = $request->token;
        $email = DB::table('password_reset_tokens')->where('token', $token)->first()->email;
        DB::table('password_reset_tokens')->where('token', $token)->delete();
        $student = Student::where('email', $email)->first();
        $student->password = Hash::make($request->password);
        $student->save();
        return redirect('/login')->with('msg_account', 'Password reset successfully. Please login with your new password.');
    }
}