<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstanceRegisterRfid extends Model
{
    use HasFactory;
    protected $fillable = ['instance_id', 'user_id','ready']; 
}
