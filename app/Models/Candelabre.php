<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candelabre extends Model
{
    use HasFactory;
    protected $table = 'candelabre';

    protected $fillable = [
        'support_id',
        'hauteur',
        'diametre',
        'nombre_lampes',
        'type_lampes',
        'puissance',
        'angle_eclairage',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'coordonnees_gps',
        'etat',
    ];

    public function support()
    {
        return $this->belongsTo(Support::class);
    }
}
