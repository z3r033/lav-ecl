<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Douille extends Model
{
    use HasFactory;
    protected $table = 'douille';

    protected $fillable = [
        'SHP_id',
        'type',
        'puissance_max',
        'tension_nominal',
        'courant_nominal',
        'indice_IP',
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
