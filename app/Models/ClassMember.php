<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassMember extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['instance_class_id', 'user_cato_id']; 
    protected $hidden = ['joined_at'];
}
