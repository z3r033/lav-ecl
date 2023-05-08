<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ballaste extends Model
{
    use HasFactory;
    protected $table = 'ballaste';

    protected $fillable = [
        'type',
        'puissance',
        'tension_nominal',
        'courant_nominal',
        'indice_IP',
        'duree_vie',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'etat',
        'SHP_id'
    ];

    public function shp()
    {
        return $this->belongsTo(SHP::class);
    }
}
