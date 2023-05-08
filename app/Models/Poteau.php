<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poteau extends Model
{
    use HasFactory;
    protected $table = 'poteau';
    protected $fillable = [
        'hauteur',
        'diametre',
        'materiau',
        'resistance_vent',
        'couleur',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'coordonnees_gps',
        'etat',
        'support_id',
    ];

    public function support()
    {
        return $this->belongsTo(Support::class);
    }
}
