<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserCato;
use App\Models\InstanceClass;
use App\Models\UserPost;
use App\Models\UserActivity;

class Instance extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'email', 'country', 'address', 'website', 'avatar','code','owner_id']; 

    public function users()
    {
        return $this->hasMany(UserCato::class);
    }

    public function classes()
    {
        return $this->hasMany(InstanceClass::class);
    }

    public function posts(){
        return $this->hasMany(UserPost::class);
    }

    public function activities(){
        return $this->hasMany(UserActivity::class);
    }


}
