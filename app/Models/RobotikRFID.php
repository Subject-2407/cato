<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\rfidowner;

class RobotikRFID extends Model
{
    use HasFactory;

    public $table = "robotik_rfid";
    protected $fillable = ['nomor_rfid','dibuat'];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(rfidowner::class,'rfid','nomor_rfid');
    }
}
