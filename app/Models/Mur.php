<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mur extends Model
{
    use HasFactory;
    protected $table = 'mur';

    protected $fillable = [
        'hauteur',
        'support_id',
        'longueur',
        'epaisseur',
        'materiau',
        'couleur',
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
