<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantMoisture extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "plant_moisture";
    protected $fillable = ['kelembapan','pump','mode','terakhir_pump_hidup','terakhir_pump_mati'];
}
