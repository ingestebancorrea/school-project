<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = ['score', 'date', 'subject_id', 'student_id'];

    public function subject() {
    
        return $this->belongsTo(Subject::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
