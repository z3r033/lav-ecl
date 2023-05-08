<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatePlanning extends Model
{
    use HasFactory;
    protected $table = 'date_planning';

    protected $fillable = [
        'planning_id',
        'date_debut',
        'date_fin',
    ];

    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }
}
