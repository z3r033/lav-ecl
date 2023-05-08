<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampe extends Model
{
    use HasFactory;
    protected $table = 'lampe';

    protected $fillable = [
        'SHP_id',
        'type',
        'puissance',
        'tension_nominal',
        'courant_nominal',
        'indice_IP',
        'duree_vie',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'etat'
    ];

    public function shp()
    {
        return $this->belongsTo(SHP::class);
    }
}
