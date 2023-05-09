<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $table = 'reclamation';

    protected $fillable = [
        'utilisateur_id',
        'equipe_id',
        'secteur_id',
        'titre',
        'description',
        'statut',
        'source_defaillance',
        'etat_signalement'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipe_id');
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class, 'secteur_id');
    }
}
