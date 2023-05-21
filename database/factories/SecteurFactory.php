<?php

namespace Database\Factories;
use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secteur>
 */
class SecteurFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        $faker = \Faker\Factory::create();

        // Generate random coordinates for the polygon
        $numPoints = $faker->numberBetween(3, 6);
        $coordinates = [];

        for ($i = 0; $i < $numPoints; $i++) {
            $longitude = $faker->longitude();
            $latitude = $faker->latitude();
            $coordinates[] = $longitude . ' ' . $latitude;
        }

      # $polygonString = 'POLYGON((' . implode(',', $coordinates) . '))';
      $polygonString = 'POLYGON((-6.344129447522761 32.34055434254856, -6.344584401592186 32.34066317764443, -6.344588869226385 32.34042285951243, -6.344378890425276 32.3401938646773, -6.343967123484816 32.340319686086616, -6.343943296103248 32.34052792013543, -6.344129447522761 32.34055434254856))';
   // $polygonString='POLYGON((-12.327244531249999,32.59697187500001,-8.547947656249999,31.21269453125001,-12.217381249999999,30.39970625000001,-12.173435937499999,30.79521406250001,-12.327244531249999,32.59697187500001))';
    #  $polygonString = 'POLYGON((-6.344129447522761 32.34055434254856, -6.344584401592186 32.34066317764443, -6.344588869226385 32.34042285951243, -6.344378890425276 32.3401938646773, -6.343967123484816 32.340319686086616, -6.343943296103248 32.34052792013543, -6.344129447522761 32.34055434254856))';


    return [
        'nom_secteur' => $faker->word,
        'ville' => $faker->city,
        'adresse' => $faker->address,
        'type_secteur' => $faker->randomElement(['résidentiel', 'commercial', 'industriel', 'public']),
        'nombre_points_lumineux' => $faker->numberBetween(1, 100),
        'puissance_totale' => $faker->numberBetween(100, 1000),
        'type_lampe' => $faker->word,
        'date_installation' => $faker->dateTimeThisMonth(),
        'date_derniere_maintenance' => $faker->dateTimeThisMonth(),
        'entreprise_maintenance' => $faker->company,
        'geom' => DB::raw("ST_GeomFromText('$polygonString')"),
    ];
    }
}
