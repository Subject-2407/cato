<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InstanceClass;

class ClassPost extends Model
{
    use HasFactory;

    protected $fillable = ['instance_class_id','poster_id','caption']; 
    protected $hidden = ['updated_at'];

    public function posterClass(){
        return $this->hasOne(InstanceClass::class);
    }
}
