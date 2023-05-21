<?php

namespace Database\Seeders;

use App\Models\Support;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
      /*  $supports = [
            [
                'points_lumineux_id' => 1,
                'type_support' => 'candelabre',
                'hauteur' => 5.5,
                'diametre' => 1.5,
                'resistance_vent' => 150,
                'couleur' => 'noir',
                'date_installation' => '2022-01-01',
                'date_derniere_maintenance' => '2022-04-01',
                'entreprise_maintenance' => 'ACME Inc.',
                'coordonnees_gps' => '47.2184,-1.5536',
                'etat' => 'actif',
            ],
            // Add more supports as needed
        ];

        foreach ($supports as $support) {
            Support::create($support);
        }

        Support::factory()->count(10)->create();*/
        Support::factory()->count(10)->create();
    }
}
