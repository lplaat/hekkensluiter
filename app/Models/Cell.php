<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'wing_code'
    ];

    public function currentPrisoner()
    {
        return $this->belongsTo(Prisoner::class, 'id', 'cell_id');
    }
}
