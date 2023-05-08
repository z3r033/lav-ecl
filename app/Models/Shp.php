<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shp extends Model
{
    use HasFactory;
    protected $table = 'shp';

    protected $fillable = [
        'luminaire_id',
        'hauteur_fixation',
        'puissance_installee',
        'flux_lumineux_initial',
        'angle_eclairage',
        'IRC',
        'duree_vie',
        'efficacite_lumineuse',
        'indice_IP',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'etat',
        'latitude',
        'longitude',
        'modele_sph'
    ];

    public function luminaire()
    {
        return $this->belongsTo(Luminaire::class);
    }
}
