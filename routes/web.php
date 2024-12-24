<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CLientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\IsadminMiddleware;
use App\Models\University;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware([IsadminMiddleware::class])->group(function () {
    //Admin route
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Admin And Users will log from the same page
    // Route::get('/admin_login', [AdminController::class, 'admin_login']);

    Route::get('/admin_profile/{id}', [AdminController::class, 'admin_profile']);

    Route::get('/edit_admin/{id}', [AdminController::class, 'edit_admin']);
    Route::post('/admin_updated', [AdminController::class, 'update_admin_profile']);
    Route::get('admin_logout', [AdminController::class, 'adlogout']);

    // Courses
    Route::get('/create_course', [CourseController::class, 'create_course']);
    Route::post('/created_course', [CourseController::class, 'created_course']);
    Route::get('/show_course', [CourseController::class, 'show_course']);
    Route::get('/edit_course/{id}', [CourseController::class, 'edit_course']);
    Route::post('/edited_course', [CourseController::class, 'edited_course']);
    Route::get('/delete_course/{id}', [CourseController::class, 'delete_course']);

    // Department
    Route::get('/create_department', [DepartmentController::class, 'create_department']);
    Route::post('/created_department', [DepartmentController::class, 'created_department']);
    Route::get('/show_department', [DepartmentController::class, 'show_department']);
    Route::get('/edit_department/{id}', [DepartmentController::class, 'edit_department']);
    Route::post('/edited_department', [DepartmentController::class, 'edited_department']);
    Route::get('/delete_department/{id}', [DepartmentController::class, 'delete_department']);

    // Unvisersity
    Route::get('/create_university', [UniversityController::class, 'create_university']);
    Route::post('/created_university', [UniversityController::class, 'created_university']);
    Route::get('/show_university', [UniversityController::class, 'show_university']);
    Route::get('/edit_university/{id}', [UniversityController::class, 'edit_university']);
    Route::post('/edited_university', [UniversityController::class, 'edited_university']);
    Route::get('/delete_university/{id}', [UniversityController::class, 'delete_university']);

    // Professor
    Route::get('/create_professor', [ProfessorController::class, 'create_professor']);
    Route::post('/created_professor', [ProfessorController::class, 'created_professor']);
    Route::get('/show_professor', [ProfessorController::class, 'show_professor']);
    Route::get('/edit_professor/{id}', [ProfessorController::class, 'edit_professor']);
    Route::post('/edited_professor', [ProfessorController::class, 'edited_professor']);

    // Comment
    Route::get('/show_comment_prof', [CommentController::class, 'show_comment_prof']);
    Route::get('/disable_prof_comment/{id}', [CommentController::class, 'disprof']);
    Route::get('/active_prof_comment/{id}', [CommentController::class, 'actprof']);
    Route::get('/delete_professor_comment/{id}', [CommentController::class, 'delete_profcomment']);
    Route::get('/show_comment_univ', [CommentController::class, 'show_comment_univ']);
    Route::get('/disable_univ_comment/{id}', [CommentController::class, 'disuniv']);
    Route::get('/active_univ_comment/{id}', [CommentController::class, 'actuniv']);
    Route::get('/delete_university_comment/{id}', [CommentController::class, 'delete_univcomment']);


    // Users
    Route::get('/show_users', [UsersController::class, 'show_users']);
    Route::get('/edit_user_role/{id}', [UsersController::class, 'role']);
    Route::post('/edited_role', [UsersController::class, 'edited_role']);
    Route::get('/delete_student/{id}', [UsersController::class, 'delete_student']);
});

// Client route
Route::get('/', [CLientController::class, 'home']);
Route::get('/search', [CLientController::class, 'search'])->name('search');
Route::get('/autocomplete', [CLientController::class, 'autocomplete'])->name('autocomplete');
Route::get('/rate', [CLientController::class, 'rate']);
Route::get('/sign', [CLientController::class, 'sign']);
Route::post('/create_student', [CLientController::class, 'create_student']);
Route::get('/login', [CLientController::class, 'login'])->name('login');;
Route::post('/student_logged', [CLientController::class, 'student_logged']);
Route::get('/logout', [CLientController::class, 'logout']);
Route::get('/forgotpassword', [CLientController::class, 'forgotpassword']);
Route::post('verify_email', [CLientController::class, 'verify_email']);
Route::get('/reset_password/{token}', [CLientController::class, 'resetpassword']);
Route::post('confirm_reset', [CLientController::class, 'confirm_reset']);
Route::get('/confirmsub/{token}', [CLientController::class, 'confirmsub']);
// Student
Route::get('/student_profile/{id}', [CLientController::class, 'student_profile']);
Route::get('/student_edit_profile/{id}', [CLientController::class, 'edit_profile']);
Route::post('/student_edited_profile', [CLientController::class, 'edited_profile']);
Route::get('/student_delete_profile/{id}', [CLientController::class, 'delete_profile']);
// Emd studemt

// University
Route::get('/add_university', [CLientController::class, 'add_university']);
Route::post('/client_create_university', [CLientController::class, 'client_create_university']);
Route::get('/university_rating/{id}', [CLientController::class, 'university_rating']);
Route::get('/university/{id}', [CLientController::class, 'university']);
Route::post('/student_rate_university', [CLientController::class, 'rate_university']);
Route::get('/compare/{id}', [CLientController::class, 'compare']);
Route::post('/compare', [CLientController::class, 'compare_univ']);
// End university

// Professor
Route::get('/add_professor', [CLientController::class, 'add_professor']);
Route::post('/client_create_professor', [CLientController::class, 'client_create_professor']);
Route::get('/professor_rating/{id}', [CLientController::class, 'professor_rating']);
Route::get('/professor/{id}', [CLientController::class, 'professor']);
Route::post('/student_rate_professor', [CLientController::class, 'rate_professor']);
// End professor
