<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;
    protected $table = 'equipe';

    protected $fillable = [
        'nom',
        'description',
        'date_creation',
    ];

    protected $dates = [
        'date_creation',
        'created_at',
        'updated_at',
    ];

    public function techniciens()
{
    return $this->belongsToMany(User::class);
}
}
