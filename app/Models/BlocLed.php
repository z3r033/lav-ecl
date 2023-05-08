<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlocLed extends Model
{
    use HasFactory;
    protected $table = 'bloc_led';

    protected $fillable = [
        'led_id',
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

    public function led()
    {
        return $this->belongsTo(Led::class);
    }
}
