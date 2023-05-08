<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'driver';

    protected $fillable = [
        'led_id',
        'puissance_entree',
        'tension_entree',
        'courant_sortie',
        'tension_sortie',
        'efficacite',
        'facteur_puissance',
        'indice_protection',
        'temperature_fonctionnement',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'etat'
    ];

    public function led()
    {
        return $this->belongsTo(Led::class);
    }
}
