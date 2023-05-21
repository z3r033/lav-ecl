<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Secteur;

class SecteurLive extends Component
{
    public $nom_secteur;
    public $ville;
    public $adresse;
    public $type_secteur;
    public $nombre_points_lumineux;
    public $puissance_totale;
    public $type_lampe;
    public $date_installation;
    public $date_derniere_maintenance;
    public $entreprise_maintenance;
    public $geom = [];

    public function render()
    {
        return view('livewire.secteur-live');
    }

    public function convertToWKT($geom)
    {

        $coordinates = explode('#', $geom);
        $coordinatePairs = [];

        foreach ($coordinates as $coordinate) {
            $values = explode(',', trim($coordinate));
            $x = trim($values[0]);
            $y = trim($values[1]);
            $coordinatePairs[] = "$x $y";
        }
        $polygonString = 'POLYGON((' . implode(', ', $coordinatePairs) . '))';

        return "ST_GeomFromText('$polygonString')";


    }

  /*  public function save()
    {
        // Validate the entered data
        $validatedData = $this->validate([
            'nom_secteur' => 'required',
            'ville' => 'required',
            'type_secteur' => 'required',
            'geom' => 'required',
        ]);

        // Convert geom to WKT format
        $validatedData['geom'] = $this->convertToWKT($this->geom);

        // Create a new secteur record in the database
        Secteur::create($validatedData);

        // Reset attribute values after saving
        $this->reset();

        // Send an event to display a success message
        $this->dispatchBrowserEvent('showSuccessMessage', ['message' => 'Le secteur a été créé avec succès.']);
    }*/

    public function save()
{
    // Validate the entered data
    $validatedData = $this->validate([
        'nom_secteur' => 'required',
        'ville' => 'required',
        'type_secteur' => 'required',
        'geom' => 'required',
    ]);

    // Convert geom to WKT format
    $geom = $this->convertToWKT($this->geom);

    // Insert the data into the secteur table using the DB facade
    DB::table('secteur')->insert([
        'nom_secteur' => $validatedData['nom_secteur'],
        'ville' => $validatedData['ville'],
        'type_secteur' => $validatedData['type_secteur'],
        'geom' => DB::raw($geom),
        'updated_at' => now(),
        'created_at' => now(),
    ]);

    // Reset attribute values after saving
    $this->reset();

    // Send an event to display a success message
    $this->dispatchBrowserEvent('showSuccessMessage', ['message' => 'Le secteur a été créé avec succès.']);
}


}
