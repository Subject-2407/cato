<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskGrades extends Model
{
    use HasFactory;
    protected $fillable = ['class_id','task_id', 'student_id', 'attachment', 'completed', 'marks']; 
    protected $hidden = ['id','instance_code','attachment','completed','created_at','updated_at'];

}
