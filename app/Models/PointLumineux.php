<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointLumineux extends Model
{
    use HasFactory;
    protected $table = 'points_lumineux';
    protected $fillable = [
        'nom',
        'voie_id',
        'type_lampe',
        'puissance',
        'angle_eclairage',
        'hauteur_montage',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'coordonnees_gps',
        'etat',
    ];

    public function voie()
    {
        return $this->belongsTo(Voie::class);
    }
}
