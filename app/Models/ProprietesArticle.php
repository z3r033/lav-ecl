<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprietesArticle extends Model
{
    use HasFactory;
    protected $table = 'proprietes_article';

    protected $fillable = [
        'article_id',
        'nom_propriete',
        'valeur_propriete',
        'estObligatoire'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
