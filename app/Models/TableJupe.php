<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableJupe extends Model
{
    use HasFactory;
    protected $table = 'table_jupe';

    protected $fillable = [
        'type_table_jupe',
        'points_lumineux_id',
        'materiau',
        'couleur',
        'forme',
        'dimensions',
        'poids',
        'indice_IP',
        'date_installation',
        'date_derniere_maintenance',
        'entreprise_maintenance',
        'etat',
    ];

    public function pointsLumineux()
    {
        return $this->belongsTo(PointsLumineux::class);
    }
}
