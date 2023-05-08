<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateOrdreIntervention extends Model
{
    
    use HasFactory;
    protected $table = 'date_ordre_intervention';

    protected $fillable = [
        'ordre_intervention_id',
        'date_debut',
        'date_fin',
    ];

    public function ordreIntervention()
    {
        return $this->belongsTo(OrdreIntervention::class);
    }
}
