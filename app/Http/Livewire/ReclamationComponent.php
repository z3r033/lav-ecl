<?php

namespace App\Http\Livewire;

use App\Models\Equipe;
use App\Models\Reclamation;
use App\Models\Secteur;
use Illuminate\Foundation\Auth\User;
use Livewire\Component;
use Livewire\WithPagination;

class ReclamationComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $reclamation;
    public $utilisateur_id;
    public $equipe_id;
    public $titre;
    public $description;
    public $statut;
    public $source_defaillance;
    public $etat_signalement;
    public $search;
    public $secteur_id; // Ajout de la propriété secteur_id

    protected $rules = [
        /*  'utilisateur_id' => 'required', */
        'equipe_id' => 'required',
        'titre' => 'required|max:255',
        'description' => 'required',
        'statut' => 'required',
        'source_defaillance' => 'nullable|string|max:255',
        'etat_signalement' => 'nullable|string|max:255',
        'secteur_id' => 'nullable|integer',
    ];





    public function goToAddReclamation()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToListReclamation()
    {
        $this->currentPage = PAGELIST;
    }
    public function goToEditReclamation($id)
    {
        if ($id) {
            $reclamation = Reclamation::with('utilisateur', 'equipe')->find($id);
            $this->titre = $reclamation->titre;
            $this->description = $reclamation->description;
            $this->statut = $reclamation->statut;
            $this->utilisateur_id = $reclamation->utilisateur_id;
            $this->equipe_id = $reclamation->equipe_id;
            $this->secteur_id = $reclamation->secteur_id; // ajout de secteur_id
            $this->source_defaillance = $reclamation->source_defaillance; // ajout de source_defaillance
            $this->etat_signalement = $reclamation->etat_signalement; // ajout de etat_signalement
            $this->reclamation = $reclamation;
        }
    }


    public function save()
    {
        $validatedData = $this->validate([
          /*   'utilisateur_id' => 'required', */
            'equipe_id' => 'required',
            'titre' => 'required|min:2',
            'description' => 'required|min:2',
            'secteur_id' => 'nullable',
            'source_defaillance' => 'nullable',
            'etat_signalement' => 'nullable'
        ]);

        $reclamation = new Reclamation();
        $reclamation->utilisateur_id = auth()->user()->id;
        $reclamation->equipe_id = $this->equipe_id;
        $reclamation->titre = $this->titre;
        $reclamation->description = $this->description;
        $reclamation->statut = 'ouverte';
        $reclamation->secteur_id = $this->secteur_id; // Ajout de l'assignation de secteur_id

        $reclamation->save();

        session()->flash('message', 'La réclamation a été créée avec succès.');
        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Réclamation créée avec succès."]
        );

        $this->reset();
        $this->goToListReclamation();
    }
    public function render()
    {
        $query = Reclamation::with('utilisateur', 'equipe', 'secteur')->latest(); // Ajouter 'secteur' ici
    
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('titre', 'like', '%' . $this->search . '%');
                // ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }
        $equipes = Equipe::all();
        $sections = Secteur::all(); // Ajouter cette ligne pour récupérer toutes les sections
    
        $reclamations = $query->paginate(10);
        return view('livewire.reclamations.index',compact('reclamations', 'equipes','sections')) // Ajouter 'sections' ici
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function create()
    {
        $validatedData = $this->validate();
        Reclamation::create($validatedData);
        $this->resetInputs();
    }

    public function edit($id)
    {
        $this->reclamation = Reclamation::findOrFail($id);
        $this->utilisateur_id = $this->reclamation->utilisateur_id;
        $this->equipe_id = $this->reclamation->equipe_id;
        $this->titre = $this->reclamation->titre;
        $this->description = $this->reclamation->description;
        $this->statut = $this->reclamation->statut;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->reclamation->update($validatedData);
        $this->resetInputs();
    }

    public function delete($id)
    {
        Reclamation::findOrFail($id)->delete();
    }

    private function resetInputs()
    {
        $this->utilisateur_id = null;
        $this->equipe_id = null;
        $this->titre = null;
        $this->description = null;
        $this->statut = null;
    }
}