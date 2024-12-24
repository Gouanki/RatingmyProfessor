<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityRating extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'university_id', 'comment', 'reputation', 'location', 'opportunity', 'internet', 'food', 'club', 'happiness', 'safety'];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function university(){
        return $this->belongsTo(University::class);
    }
}
