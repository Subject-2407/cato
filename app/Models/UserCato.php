<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\InstanceClass;
use App\Models\Instance;
use App\Models\UserPost;
use App\Models\UserActivity;

class UserCato extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'email',
        'password',
        'instance_code',
        'instance_id',
        'role',
        'firstname',
        'lastname',
        'birthdate',
        'gender',
        'occupation',
        'personalid',
        'profession',
        'title',
        'country',
        'phone',
        'profile',
    ];

    protected $hidden = [
        'instance_id',
        'created_at',
        'updated_at',
        'profession',
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }

    public function classes()
    {
        return $this->belongsToMany(InstanceClass::class, 'class_members')->withPivot('joined_at');
    }

    public function posts(){
        return $this->hasMany(UserPost::class);
    }

    public function activities(){
        return $this->hasMany(UserActivity::class);
    }
}
