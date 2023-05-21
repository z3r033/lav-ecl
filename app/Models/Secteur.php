<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;
    protected $table = 'secteur';

    protected $fillable = [
        'nom_secteur',
        'ville',

        'type_secteur',
     //   'nombre_points_lumineux',
      //  'puissance_totale',
       // 'type_lampe',
       // 'date_installation',
       // 'date_derniere_maintenance',
       // 'entreprise_maintenance',
        'geom',
    ];

    protected $dates = [
        'date_installation',
        'date_derniere_maintenance',
    ];
 /*
    protected $casts = [
        'geom' => 'geometry',
    ];

  public function getGeomAttribute($value)
    {
        // Convert the stored WKT (Well-Known Text) representation to a Geometry object
        return \Geometry::fromWKT($value);
    }

    public function setGeomAttribute($value)
    {
        // Convert the incoming Geometry object to a WKT representation and store it
        $this->attributes['geom'] = $value->toWKT();
    }*/
}
