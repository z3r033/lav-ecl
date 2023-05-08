<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffret extends Model
{
    use HasFactory;

    protected $table = 'coffret';

    protected $fillable = [
        'nom',
        'poste_electrique_id',
        'type',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'puissance_maximale',
        'nombre_circuits',
        'etat',
    ];

    public function posteElectrique()
    {
        return $this->belongsTo(PosteElectrique::class);
    }
}
