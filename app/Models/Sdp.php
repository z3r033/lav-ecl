<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdp extends Model
{
    use HasFactory;
    protected $table = 'sdp';
    protected $fillable = [
        'led_id',
        'date_adoption',
        'ville',
        'objectifs',
        'strategies',
        'actions',
        'couts',
        'echeanciers',
        'responsable',
    ];

    public function led()
    {
        return $this->belongsTo(Led::class);
    }
    
}
