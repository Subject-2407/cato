<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInkubator extends Model
{
    use HasFactory;
    protected $fillable = ['suhu', 'sisa_hari', 'total_hari', 'motor', 'kipas', 'lampu', 'mode', 'sistem']; 
    public $timestamps = false; 
}
