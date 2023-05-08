<?php

namespace App\Http\Livewire;

use App\Models\Equipe;
use App\Models\PosteElectrique;
use App\Models\Secteur;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class InterventionComponent extends Component
{
   
        use WithPagination;
        protected $paginationTheme = "bootstrap";
        public $isBtnAddClicked = false;
        public $currentPage = PAGELIST;
        public $intervention;
        public $secteur_id;
        public $poste_electrique_id;
        public $equipe_id;
        public $type_intervention;
        public $description;
        public $date_intervention;
        public $duree;
        public $statut;
    
        public function render()
        {
            $secteurs = Secteur::all();
            $postesElectriques = PosteElectrique::all();
            $equipes = Equipe::all();
            $interventions = DB::table('intervention')
                ->join('secteur', 'intervention.secteur_id', '=', 'secteur.id')
                ->join('poste_electrique', 'intervention.poste_electrique_id', '=', 'poste_electrique.id')
                ->join('equipe', 'intervention.equipe_id', '=', 'equipe.id')
                ->select('intervention.*', 'secteur.nom_secteur as secteur_nom', 'poste_electrique.nom as poste_electrique_nom', 'equipe.nom as equipe_nom')
                ->latest()
                ->paginate(6);
            return view('livewire.interventions.index', compact('interventions', 'secteurs', 'postesElectriques', 'equipes'))
                ->extends("layouts.master")
                ->section("contenu");
        }
    
        public function goToAddIntervention()
        {
            $this->currentPage = PAGECREATEFORM;
        }
    
        public function goToListIntervention()
        {
            $this->currentPage = PAGELIST;
        }
    
        public function goToEditIntervention($id)
        {
            if ($id) {
                $this->intervention = DB::table('intervention')->where('id', $id)->first();
                $this->secteur_id = $this->intervention->secteur_id;
                $this->poste_electrique_id = $this->intervention->poste_electrique_id;
                $this->equipe_id = $this->intervention->equipe_id;
                $this->type_intervention = $this->intervention->type_intervention;
                $this->description = $this->intervention->description;
                $this->date_intervention = $this->intervention->date_intervention;
                $this->duree = $this->intervention->duree;
                $this->statut = $this->intervention->statut;
                $this->currentPage = PAGEEDITFORM;
            }
        }
    
        protected $rules =
        [
            'secteur_id' => 'required',
            'poste_electrique_id' => 'required',
            'equipe_id' => 'required',
            'type_intervention' => 'required',
            'description' => 'required',
            'date_intervention' => 'required|date',
            'duree' => 'required|integer',
            'statut' => 'required',
        ];
    
        public function confirmDelete($id)
   
        {
            $this->dispatchBrowserEvent('showConfirmMessage', [
                'message' => [
                    'title' => 'Êtes-vous sûr de vouloir supprimer cet intervention?' ,
                    'text' => 'Intervention',
                    'type' => 'warning',
                    'data' => [
                        'intervention_id' => $id
                    ]
                ]
            ]);
        }
    
        public function deleteIntervention($id)
        {
        \App\Models\Intervention::destroy($id);
         //   session()->flash('success', 'Type d\'article supprimé avec succès!');
         $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Intervention supprimé avec succès."]
        );
        }
    
}
