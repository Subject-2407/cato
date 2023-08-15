<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserCato;
use App\Models\Instance;

class UserActivity extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','instance_id','user_name','type','description'];

    public function user(){
        return $this->hasOne(UserCato::class);
    }

    public function instance(){
        return $this->hasOne(Instance::class);
    }
}
