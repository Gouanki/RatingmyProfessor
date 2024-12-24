<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    public function ratings(){
        return $this->hasMany(UniversityRating::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }
}
