<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';

    protected $fillable = [
        'nom',
        'description',
        'quantite',
        'prix',
        'date_ajout',
        'type_article_id',
        'estDisponible',
        'imageUrl'
    ];

    public function typeArticle()
    {
        return $this->belongsTo(TypeArticle::class);
    }
}
