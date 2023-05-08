<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voie extends Model
{
    use HasFactory;
    protected $table = 'voie';
    protected $fillable = [
        'nom',
        'secteur_id',
        'type_voie',
        'code_postal',
        'nombre_points_lumineux',
        'puissance_totale',
        'type_lampe',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'coordonnees_gps',
        'etat',
    ];

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }
}
