<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    protected $table = 'intervention';

    protected $fillable = [
        'secteur_id',
        'poste_electrique_id',
        'equipe_id',
        'type_intervention',
        'description',
        'date_intervention',
        'duree',
        'statut',
    ];

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }

    public function posteElectrique()
    {
        return $this->belongsTo(PosteElectrique::class);
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
