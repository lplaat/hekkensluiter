<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prisoner extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthdate',
        'profile_picture',
        'date_of_arrival',
        'date_of_leaving',
        'cel_id',
    ];
}
