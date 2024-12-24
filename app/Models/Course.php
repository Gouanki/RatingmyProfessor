<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function professor(){
        return $this->belongsTo(Professor::class);
    }

    public function ratings(){
        return $this->belongsTo(ProfessorRating::class);
    }

    public function professorRatings()
    {
        return $this->hasMany(ProfessorRating::class, 'course_id');
    }
}
