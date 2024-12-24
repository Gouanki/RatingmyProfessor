<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function universityRating(){
        return $this->hasMany(UniversityRating::class);
    }
    public function university(){
        return $this->belongsTo(University::class);
    }
    public function professorRating(){
        return $this->hasMany(ProfessorRating::class);
    }
}