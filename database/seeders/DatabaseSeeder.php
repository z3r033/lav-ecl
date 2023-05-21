<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Amorceur;
use App\Models\Article;
use App\Models\Ballaste;
use App\Models\BlocLed;
use App\Models\Candelabre;
use App\Models\Coffret;
use App\Models\Console;
use App\Models\DateOrdreIntervention;
use App\Models\DatePlanning;
use App\Models\Douille;
use App\Models\Driver;
use App\Models\Equipe;
use App\Models\EquipeUser;
use App\Models\Intervention;
use App\Models\Lampe;
use App\Models\Led;
use App\Models\Luminaire;
use App\Models\Mur;
use App\Models\OrdreIntervention;
use App\Models\Permission;
use App\Models\Planning;
use App\Models\PointLumineux;
use App\Models\PosteElectrique;
use App\Models\Poteau;
use App\Models\ProprietesArticle;
use App\Models\Rapport;
use App\Models\Reclamation;
use App\Models\Role;
use App\Models\Sdp;
use App\Models\Secteur;
use App\Models\Shp;
use App\Models\Support;
use App\Models\TableJupe;
use App\Models\User;
use App\Models\UserPermission;
use App\Models\UserRole;
use App\Models\Voie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->count(10)->create();
        Secteur::factory(Secteur::class)->count(10)->create();
        PosteElectrique::factory()->count(10)->create();
        Coffret::factory()->count(10)->create();
        Voie::factory()->count(10)->create();
        PointLumineux::factory()->count(10)->create();
     /*   $supports = [
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
        }*/

        Support::factory()->count(10)->create();
        //candelabre start ===
        $supports = Support::all();

        foreach ($supports as $support) {
            Candelabre::factory()
                ->count(5)
                ->create([
                    'support_id' => $support->id,
                ]);
        }
        //candelabre end

        Poteau::factory()->count(10)->create();

        Mur::factory()->count(10)->create();

        Luminaire::factory()->count(10)->create();

        Led::factory()->count(50)->create();

        Sdp::factory()
        ->count(50)
        ->create();

        Driver::factory()
        ->count(10)
        ->create();

        BlocLed::factory()->count(10)->create();

        Shp::factory()
            ->count(10)
            ->create();

        Amorceur::factory()->count(10)->create();
        Ballaste::factory()->count(10)->create();
        Lampe::factory()->count(50)->create();

        Douille::factory()
        ->count(10)
        ->create();

        Console::factory()->count(50)->create();

        TableJupe::factory()
        ->count(50)
        ->create();

       /* TypeArticle::insert([
            ['type_nom' => 'candelabre'],
            ['type_nom' => 'poteau'],
            ['type_nom' => 'mur'],
            ['type_nom' => 'LED'],
            ['type_nom' => 'SHP'],
            ['type_nom' => 'Amorceur'],
            ['type_nom' => 'ballaste'],
            ['type_nom' => 'lampe'],
            ['type_nom' => 'douille']
        ]);*/

        Article::factory()
        ->count(50)
        ->create();

        ProprietesArticle::factory()->count(50)->create();
        Equipe::factory()->count(10)->create();

        EquipeUser::factory()->count(50)->create();

        Intervention::factory()
        ->count(10)
        ->create();

        Rapport::factory()->count(50)->create();

        Reclamation::factory()
        ->count(10)
        ->create();

        Planning::factory()->count(10)->create();

        OrdreIntervention::factory()->count(10)->create();
        DateOrdreIntervention::factory()->count(10)->create();

        DatePlanning::factory()->count(10)->create();
        //******** */
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'standardiste']);
        Role::create(['name' => 'technician']);
        Role::create(['name' => 'operateur']);
        /***** */
        UserRole::factory()->count(10)->create();

        Permission::factory()->count(10)->create();

         UserPermission::factory()->count(50)->create();

    }

}
