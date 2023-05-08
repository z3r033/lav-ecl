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
        'titre',
        'description',
        'statut'
    ];

    protected $dates = [
        'date_creation',
        'date_modification',
        'created_at',
        'updated_at',
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
