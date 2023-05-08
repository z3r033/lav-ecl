<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luminaire extends Model
{
    use HasFactory;
    protected $table = 'luminaire';

    protected $fillable = [
        'points_lumineux_id',
        'type',
        'puissance',
        'flux_lumineux',
        'angle_eclairage',
        'couleur_lumiere',
        'hauteur',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'etat',
    ];

    public function pointLumineux()
    {
        return $this->belongsTo(PointLumineux::class, 'points_lumineux_id');
    }
}
