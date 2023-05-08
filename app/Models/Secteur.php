<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;
    protected $table = 'secteur';

    protected $fillable = [
        'nom_secteur',
        'ville',
        'adresse',
        'type_secteur',
        'nombre_points_lumineux',
        'puissance_totale',
        'type_lampe',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
    ];
}
