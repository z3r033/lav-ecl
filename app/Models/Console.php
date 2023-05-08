<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    use HasFactory;
    protected $table = 'console';

    protected $fillable = [
        'type_console',
        'points_lumineux_id',
        'marque',
        'modele',
        'nombre_canal',
        'protocole_supporte',
        'tension_alimentation',
        'courant_max',
        'type_interface',
        'adresse_IP',
        'adresse_MAC',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'etat'
    ];

    public function pointsLumineux()
    {
        return $this->belongsTo(PointsLumineux::class);
    }
}
