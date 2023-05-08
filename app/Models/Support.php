<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $table = 'support';

    protected $fillable = [
        'points_lumineux_id',
        'type_support',
        'hauteur',
        'diametre',
        'resistance_vent',
        'couleur',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'coordonnees_gps',
        'etat',
    ];

    public function points_lumineux()
    {
        return $this->belongsTo(PointsLumineux::class);
    }
}
