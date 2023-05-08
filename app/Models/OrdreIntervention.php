<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdreIntervention extends Model
{
    use HasFactory;
    protected $table = 'ordre_intervention';

    protected $fillable = [
        'utilisateur_id',
        'equipe_id',
        'description',
        'statut'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
