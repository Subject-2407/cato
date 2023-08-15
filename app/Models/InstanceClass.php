<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserCato;
use App\Models\Instance;
use App\Models\ClassPost;

class InstanceClass extends Model
{
    use HasFactory;
    protected $fillable = ['instance_id', 'name', 'avatar', 'owner_id','members']; 
    protected $hidden = ['pivot'];

    public function users()
    {
        return $this->belongsToMany(UserCato::class,'class_members');
    }

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }
    
    public function posts(){
        return $this->hasMany(ClassPost::class);
    }
}
