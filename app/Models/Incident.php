<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'prisoner_id',
    ];

    public function Prisoner()
    {
        return $this->belongsTo(Prisoner::class, 'prisoner_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
