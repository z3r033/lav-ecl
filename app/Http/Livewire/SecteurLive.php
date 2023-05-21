<?php

namespace App\Http\Livewire;

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
    public $geom;

    public function render()
    {
        return view('livewire.secteur-live');
    }
    public function save()
    {
        // Valider les données entrées
        $validatedData = $this->validate([
            'nom_secteur' => 'required',
            'ville' => 'required',
           // 'adresse' => 'required',
            'type_secteur' => 'required',
         //   'nombre_points_lumineux' => 'required|integer',
          //  'puissance_totale' => 'required|numeric',
          //  'type_lampe' => 'required',
        //    'date_installation' => 'required|date',
         //   'date_derniere_maintenance' => 'required|date',
          //  'entreprise_maintenance' => 'required',
            'geom' => 'required',
        ]);

        // Créer un nouvel enregistrement de secteur dans la base de données
        secteur::create($validatedData);

        // Réinitialiser les valeurs des attributs après la sauvegarde
        $this->reset();

        // Envoyer un événement pour afficher un message de succès
        $this->dispatchBrowserEvent('showSuccessMessage', ['message' => 'Le secteur a été créé avec succès.']);
    }
}
