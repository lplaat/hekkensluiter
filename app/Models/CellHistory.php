<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'prisoner_id',
        'user_id',
        'cell_id',
        'old_cell_id'
    ];

    public function Prisoner()
    {
        return $this->belongsTo(Prisoner::class, 'prisoner_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Cell()
    {
        return $this->belongsTo(Cell::class, 'cell_id');
    }

    public function OldCell()
    {
        return $this->belongsTo(Cell::class, 'old_cell_id');
    }
}
