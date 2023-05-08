<div class="row">
    <div class="col-md-6">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Formulaire de création d'un nouvel
                    utilisateur</h3>
            </div>


            <div class="card-body">
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Entrez le nom"
                            wire:model.defer="nom" required>
                        @error('nom') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Entrez le prénom"
                            wire:model.defer="prenom" required>
                        @error('prenom') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select class="form-control" id="sexe" wire:model.defer="sexe" required>
                            <option value="">-- Sélectionnez --</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                        @error('sexe') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Entrez l'email"
                            wire:model.defer="email" required>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
   
                    <div class="form-group">
                        <label for="role">Rôle</label>
                        <select class="form-control" id="role" wire:model.defer="role" required>
                            <option value="">-- Sélectionnez --</option>
                            <option value="admin">Administrateur</option>
                            <option value="technicien">Technicien</option>
                            <option value="standardiste">Standardiste</option>
                            <option value="operateur">Opérateur</option>
                        </select>
                        @error('role') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipes">Équipes</label>
                        <select multiple class="form-control" id="equipes" wire:model.defer="equipes" required>
                            @foreach($Allequipes as $equipe)
                            <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                            @endforeach
                        </select>
                        @error('equipes') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_derniere_connexion">Date dernière connexion</label>
                        <input type="date" class="form-control" id="date_derniere_connexion" wire:model.defer="date_derniere_connexion" required>
                        @error('date_derniere_connexion')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>

            <div class="card-footer">
      
                    <button type="submit" class="btn btn-info" wire:click="update">Modifier</button>

                <button wire:click="goToListUser()" type="button" class="btn btn-danger">Annuler</button>
            </div>

            <script>
                window.addEventListener('showSuccessMessage', function (event) {
                 swal.fire({
                    title: event.detail.message,
                    text: event.detail,
                    toast:true,
                    showConfirmButton:false,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    position: 'top-end',
                    timer: 1500
                }); 
               // alert(event.detail);
});
            </script>

        </div>
    </div>

    <div class="col-md-6">
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-key fa-2x"></i> Réinitialisation de mot de passe</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="#" class="btn btn-link" wire:click.prevent="confirmPwdReset()">Réinitialiser le mot de passe</a>
                                <span>(par défaut: "password") </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card card-info">
                    <div class="card-header d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Equipes</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <div id="accordion">
                                    @foreach($user->equipes as $equipe)
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h4 class="card-title flex-grow-1">
                                            <a  data-parent="#accordion" href="#"  aria-expanded="true">
                                                {{$equipe->nom}}
                                            </a>
                                            </h4>
        
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>