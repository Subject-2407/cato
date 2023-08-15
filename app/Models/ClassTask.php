<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTask extends Model
{
    use HasFactory;
    protected $fillable = ['instance_code','class_id', 'title', 'description', 'type','attachment']; 
    protected $hidden = ['instance_code'];
}
