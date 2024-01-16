<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    use HasFactory;

    protected $table = "class_student";

    public function klass()
    {
        return $this->belongsTo(Klass::class,'class_id','id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
    

}
