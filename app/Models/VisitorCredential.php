<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class VisitorCredential extends Authenticatable
{
    use HasFactory;
    protected $table = 'visitor_credentials';

    protected $fillable = [
        'email',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

}
