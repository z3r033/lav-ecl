<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\TypeArticle;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{


    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnAddClicked = false;
    public $currentPage = PAGELIST;
    public $article;
    public $nom;
    public $description;
    public $quantite;
    public $prix;
    public $date_ajout;
    public $type_article_id;
    public $estDisponible;
    public $imageUrl;

    public $articlesOfId;
    public $typeArt;




    public function getArticlesByTypeId($id, $type)
    {

        $typeArticle = TypeArticle::with('articles')->find($id);
        $this->typeArt = $id . ' ' . $type;
        $this->articlesOfId = $typeArticle->articles()->get()->toJson();


    }
    public function render()
    {
        $articles = Article::with('typeArticle')->latest()->paginate(6);
        $typesArticles = TypeArticle::all();



        return view('livewire.articles.index', compact('articles', 'typesArticles'))
            ->extends("layouts.master")
            ->section("contenu");

    }

    public function goToAddArticle()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToListArticles()
    {
        $this->currentPage = PAGELIST;
    }

    public function goToEditArticle($id)
    {
        if ($id) {
            $this->article = Article::find($id);
            $this->nom = $this->article->nom;
            $this->description = $this->article->description;
            $this->quantite = $this->article->quantite;
            $this->prix = $this->article->prix;
            $this->date_ajout = $this->article->date_ajout;
            $this->type_article_id = $this->article->type_article_id;
            $this->estDisponible = $this->article->estDisponible;
            $this->imageUrl = $this->article->imageUrl;
            $this->currentPage = PAGEEDITFORM;
        }

    }

    protected $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string',
        'quantite' => 'required|integer',
        'prix' => 'required|numeric',
        'date_ajout' => 'required|date',
        'type_article_id' => 'required|exists:type_article,id',
        'estDisponible' => 'nullable|boolean',
        'imageUrl' => 'nullable|string',
    ];

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent(
            'showConfirmMessage',
            [
                "message" => [
                    "text" => 'Voulez-vous être sûr(e) de vouloir supprimer cet article ? ' . $name,
                    "title" => "Êtes-vous sûr(e) de vouloir supprimer ?",
                    "type" => "warning",
                    "data" => [
                        "article_id" => $id
                    ]
                ]
            ]
        );
    }

    public function deleteArticle($id)
    {
        Article::destroy($id);

        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Article supprimé avec succès."]
        );
    }
    public function save()
    {
        $validatedData = $this->validate();

        $article = new Article();
        $article->nom = $this->nom;
        $article->description = $this->description;
        $article->quantite = $this->quantite;
        $article->prix = $this->prix;
        $article->date_ajout = $this->date_ajout;
        $article->type_article_id = $this->type_article_id;
        $article->estDisponible = $this->estDisponible;
        if ($this->estDisponible == null) {
            $article->estDisponible = 1;
        }

        $article->imageUrl = $this->imageUrl;

        $article->save();

        session()->flash('message', 'Les données de l\'article ont été enregistrées.');
        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Article enregistré avec succès."]
        );

        $this->reset();
    }

    public function update()
    {
        $validatedData = $this->validate();

        Article::find($this->article->id)->update($validatedData);

        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Article mis à jour avec succès."]
        );

        $this->reset();
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantite' => 'required|integer',
                'prix' => 'required|numeric',
                'date_ajout' => 'required|date',
                'type_article_id' => 'required|exists:type_article,id',
                'estDisponible' => 'nullable|boolean',
                'imageUrl' => 'nullable|string',
            ];
        } elseif ($this->currentPage == PAGECREATEFORM) {
            return [
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantite' => 'required|integer',
                'prix' => 'required|numeric',
                'date_ajout' => 'required|date',
                'type_article_id' => 'required|exists:type_article,id',
                'estDisponible' => 'nullable|boolean',
                'imageUrl' => 'nullable|string',
            ];
        }
    }

    public function setTypeArticleId($id)
    {
        $this->type_article_id = $id;
    }
}