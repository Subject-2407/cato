<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRFID extends Model
{
    use HasFactory;
    protected $fillable = ['rfid', 'user_id']; 
}
