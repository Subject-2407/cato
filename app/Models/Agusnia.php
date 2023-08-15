<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agusnia extends Model
{
    use HasFactory;

    protected $fillable = ['waktu','suhu','kelembapan','mesin'];
    public $timestamps = false;
}
