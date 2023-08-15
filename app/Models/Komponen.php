<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;
    protected $fillable = ['suhu', 'kelembapan', 'sisa_hari', 'motor', 'kipas', 'lampu', 'mode', 'sistem']; 
    public $timestamps = false; 
}
