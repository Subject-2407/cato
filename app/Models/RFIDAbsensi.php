<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFIDAbsensi extends Model
{
    use HasFactory;

    public $table = "rfid_absensi";
    protected $fillable = ['rfid'];
}
