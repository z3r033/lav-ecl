<?php

namespace App\Http\Livewire;

use App\Models\Equipe;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Utilisateurs extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnAddClicked = false;
    public $currentPage = PAGELIST;
    public $user;
    public $nom;
    public $prenom;
    public $sexe;
    public $email;
    public $password;
    public $role;
    public $equipes;
    public $date_derniere_connexion;

    public function render()
    {
        // $utilisateurs = User::all();
        $utilisateurs = User::with('equipes')->latest()->paginate(6);
        $Allequipes = Equipe::all();
        return view('livewire.utilisateurs.index', compact('utilisateurs', 'Allequipes'))
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function goToAddUser()
    {
        $this->currentPage = PAGECREATEFORM;

    }

    public function goToListUser()
    {
        $this->currentPage = PAGELIST;
    }
    public function goToEditUser($id)
    {
        if ($id) {
            $this->user = User::find($id);
            // dump($this->user);
            $this->nom = $this->user->nom;
            $this->prenom = $this->user->prenom;
            $this->sexe = $this->user->sexe;
            $this->email = $this->user->email;
            $this->password = $this->user->password;
            $this->role = $this->user->role;
            $this->equipes = $this->user->equipes->pluck('id')->toArray();
            $this->date_derniere_connexion = $this->user->date_derniere_connexion;
            $this->currentPage = PAGEEDITFORM;
        }


    }



    protected $rules =
    [
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'sexe' => 'required|in:M,F,O',
        'email' => 'required|email|unique:users,email|max:255',
        'password' => 'required|string|min:8|max:255',
        'role' => 'required|in:admin,technicien,standardiste,operateur',
        'date_derniere_connexion' => 'nullable|date',
    ];
 
    public function confirmPwdReset(){
        
        User::find($this->user->id)->update(["password" => Hash::make("password")]);
        User::find($this->user->id)->update(["mot_de_passe" =>   Hash::make("password")]);
        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Mot de pass réunisialisé avec succés"]
        );
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->user = User::find($id);
            $this->nom = $this->user->nom;
            $this->prenom = $this->user->prenom;
            $this->sexe = $this->user->sexe;
            $this->email = $this->user->email;
            $this->password = $this->user->password;
            $this->role = $this->user->role;
            $this->equipes = $this->user->equipes->pluck('id')->toArray();
            $this->date_derniere_connexion = $this->user->date_derniere_connexion;
        }
    }

    public function confirmDelete($name, $id)
    {


        $this->dispatchBrowserEvent(
            'showConfirmMessage',
            [
                "message" => [

                    "text" => 'Voulez-vous être sûr(e) de vouloir supprimer cet utilisateur ? ' . $name,
                    "title" => "sure vous voulez supprimer?",
                    "type" => "warning",
                    "data" => [
                        "user_id" => $id
                    ]
                ]
            ]
        );

    }

    public function deleteUser($id)
    {
        User::destroy($id);
        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Utilisateur supprimé avec succès."]
        );

    }
    public function save()
    {

        // Code pour enregistrer les données utilisateur dans la base de données
        $validatedData = $this->validate();

        $user = new User();
        $user->nom = $this->nom;
        $user->prenom = $this->prenom;
        $user->sexe = $this->sexe;
        $user->email = $this->email;
        $user->mot_de_passe = bcrypt($this->password);
        $user->password = bcrypt($this->password);
        $user->role = $this->role;
        $user->date_derniere_connexion = $this->date_derniere_connexion;

        $user->save();

        if (!empty($this->equipes)) {
            $equipes = Equipe::whereIn('id', $this->equipes)->get();
            $user->equipes()->attach($equipes);
        }

        //    $user->equipes()->sync($this->equipes);


        session()->flash('message', 'Les données de l\'utilisateur ont été enregistrées.');
        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Utilisateur enregistré avec succès."]
        );
        // Réinitialiser les propriétés du formulaire
        $this->reset();
    }
    public function update()
    {
        $validatedData = $this->validate();
        User::find($this->user->id)->update($validatedData);
        if (!empty($this->equipes)) {
            $this->user->equipes()->detach(); 
            $equipes = Equipe::whereIn('id', $this->equipes)->get();
            $this->user->equipes()->attach($equipes);
        }
        $this->dispatchBrowserEvent(
            'showSuccessMessage',
            ["message" => "Utilisateur mise à jour avec succès."]
        );
        // Réinitialiser les propriétés du formulaire

        $this->reset();

    }
    public function rules(){
        if($this->currentPage== PAGEEDITFORM){
            return [
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'sexe' => 'required|in:M,F,O',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($this->user->id),
                    'max:255',
                ],
                'password' => 'required|string|min:8|max:255',
                'role' => 'required|in:admin,technicien,standardiste,operateur',
                'date_derniere_connexion' => 'nullable|date',
            ];
        }elseif($this->currentPage== PAGECREATEFORM){
            return [
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'sexe' => 'required|in:M,F,O',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|min:8|max:255',
                'role' => 'required|in:admin,technicien,standardiste,operateur',
                'date_derniere_connexion' => 'nullable|date',
            ];
        }
    }

}