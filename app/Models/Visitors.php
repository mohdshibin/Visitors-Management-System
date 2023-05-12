<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'contactNo',
        'email',
        'address',
        'purpose',
        'noOfPeople',
        'parkingSlot'
    ];

}
