<div class="row">
    <div class="col-md-6">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Formulaire de création d'un nouvel
                    utilisateur</h3>
            </div>


            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Entrez le nom"
                            wire:model.defer="nom" required minlength="2">
                        @error('nom') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Entrez le prénom"
                            wire:model.defer="prenom" required minlength="2">
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
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Entrez le mot de passe"
                            wire:model.defer="password" required minlength="6">
                        @error('password') <span class="error">{{ $message }}</span> @enderror
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
                        <input type="date" class="form-control" id="date_derniere_connexion"
                            wire:model.defer="date_derniere_connexion" required>
                        @error('date_derniere_connexion') <span class="error">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info" wire:click="save">Enregistrer</button>
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