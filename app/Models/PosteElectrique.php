<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosteElectrique extends Model
{  protected $table = 'poste_electrique';
    use HasFactory;
    protected $fillable = [
        'nom',
        'secteur_id',
        'capacite',
        'type',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'equipements',
        'puissance_souscrite',
        'etat',
    ];

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }
}
