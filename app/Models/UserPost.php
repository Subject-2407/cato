<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserCato;
use App\Models\Instance;

class UserPost extends Model
{
    use HasFactory;
    protected $fillable = ['poster_id', 'poster_name', 'poster_avatar', 'instance_id','caption','media']; 

    public function user(){
        return $this->hasOne(UserCato::class);
    }

    public function instance(){
        return $this->hasOne(Instance::class);
    }
}
