<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CatoUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'cato_user';

    protected $fillable = [
        'type',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
