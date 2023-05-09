<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class TypeArticle extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;

    public $type_nom;
    public $type_article;
    public $selectedType;

    public $search;
    public function goToAddTypeArticle()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToListTypeArticle()
    {
        $this->currentPage = PAGELIST;
    }

    public function goToEditTypeArticle($id)
    {
        if ($id) {
            $this->type_article = \App\Models\TypeArticle::find($id);
            $this->type_nom = $this->type_article->type_nom;
            $this->currentPage = PAGEEDITFORM;
        }
    }
    protected $rules = [
        'type_nom' => 'required|string|unique:type_article|max:255'
    ];

    protected $messages = [
        'type_nom.required' => 'Le type_nom est obligatoire',
        'type_nom.string' => 'Le type_nom doit être une chaîne de caractères',
        'type_nom.unique' => 'Le type_nom existe déjà',
        'type_nom.max' => 'Le type_nom ne doit pas dépasser 255 caractères'
    ];

    public function render()
    {
        $types = \App\Models\TypeArticle::with('articles')->latest()->paginate(6);

        return view('livewire.type_articles.index', compact('types'))
            ->extends("layouts.master")
            ->section("contenu");
        ;
        ;
    }

    public function save()
    {
        $this->validate();
        \App\Models\TypeArticle::create(['type_nom' => $this->type_nom]);
  
       $this->dispatchBrowserEvent(
        'showSuccessMessage',
        ["message" => "Type d\'article ajouté avec succès!"]
    );
        $this->reset();
    }

    public function editType($id)
    {
        $type = \App\Models\TypeArticle::find($id);
        $this->selectedType = $type;
        $this->type_nom = $type->type_nom;
    }

    public function updateType()
    {
        $this->validate([
            'type_nom' => 'required|string|unique:type_article,type_nom,' . $this->selectedType->id . '|max:255'
        ]);
        $this->selectedType->update(['type_nom' => $this->type_nom]);
        session()->flash('success', 'Type d\'article modifié avec succès!');
        $this->reset(['selectedType', 'type_nom']);
    }

    public function confirmDelete($name,$id)
   
    {
        $this->dispatchBrowserEvent('showConfirmMessage', [
            'message' => [
                'title' => 'Êtes-vous sûr de vouloir supprimer ce type d\'article nom'.$name.' et avec id'.$id.' ?' ,
                'text' => 'Type article',
                'type' => 'warning',
                'data' => [
                    'type_id' => $id
                ]
            ]
        ]);
    }

    public function deleteType($id)
    {
    \App\Models\TypeArticle::destroy($id);
     //   session()->flash('success', 'Type d\'article supprimé avec succès!');
     $this->dispatchBrowserEvent(
        'showSuccessMessage',
        ["message" => "Type d'article supprimé avec succès."]
    );
    }
}