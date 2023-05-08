<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeUser extends Model
{
    use HasFactory;
    protected $table = 'equipe_user';

    protected $fillable = [
        'equipe_id',
        'user_id',
    ];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
