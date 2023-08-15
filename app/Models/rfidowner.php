<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RobotikRFID;

class rfidowner extends Model
{
    use HasFactory;

    protected $fillable = ['nis','nama','kelas','rfid'];

    public function rfid()
    {
        return $this->belongsTo(RobotikRFID::class,'nomor_rfid','rfid');
    }
}
