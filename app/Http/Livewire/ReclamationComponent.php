<?php

namespace App\Http\Livewire;

use App\Models\Reclamation;
use Livewire\Component;

class ReclamationComponent extends Component
{
    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

        public $reclamation;
        public $utilisateur_id;
        public $equipe_id;
        public $titre;
        public $description;
        public $statut;
        public $search;
        protected $rules = [
            'utilisateur_id' => 'required',
            'equipe_id' => 'required',
            'titre' => 'required|max:255',
            'description' => 'required',
            'statut' => 'required',
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
                $this->reclamation = $reclamation;
            
            }
        }
    

        public function render()
        {
            $query = Reclamation::with('utilisateur', 'equipe');
    
            if ($this->search) {
                $query->where(function ($q) {
                    $q->where('titre', 'like', '%' . $this->search . '%');
                     // ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            }
        
            $reclamations = $query->paginate(10);
            return view('livewire.reclamations.index', ['reclamations' => $reclamations])
            ->extends("layouts.master")
            ->section("contenu");;
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
    
    

