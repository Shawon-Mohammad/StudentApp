<?php

namespace App\Models;

use App\Http\Controllers\StudentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAttendence extends Model
{
    use HasFactory;

    protected $table = "class_attendence";

    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function klass()
    {
        return $this->belongsTo(Klass::class,'class_id','id');
    }

}
