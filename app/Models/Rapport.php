<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;
    protected $table = 'rapport';

    protected $fillable = [
        'intervention_id',
        'contenu',
        'recommandations',
        'date_creation'
    ];

    public function intervention()
    {
        return $this->belongsTo(Intervention::class);
    }
}
