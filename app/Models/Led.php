<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Led extends Model
{
    use HasFactory;
    protected $table = 'led';
    protected $fillable = [
        'luminaire_id',
        'puissance',
        'flux_lumineux',
        'temp_couleur',
        'angle_eclairage',
        'IRC',
        'duree_vie',
        'efficacite_lumineuse',
        'indice_IP',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'etat'
    ];

    public function luminaire()
    {
        return $this->belongsTo(Luminaire::class);
    }
}
