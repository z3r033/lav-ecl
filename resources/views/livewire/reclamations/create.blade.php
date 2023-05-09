<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus fa-2x"></i> Formulaire de création d'une nouvelle réclamation</h3>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="equipe_id">Equipe</label>
                <select class="form-control" id="equipe_id" wire:model.defer="equipe_id" required>
                    <option value="">-- Sélectionnez une équipe --</option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                    @endforeach
                </select>
                @error('equipe_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" placeholder="Entrez le titre" wire:model.defer="titre" required>
                @error('titre') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" wire:model.defer="description" required></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="source_defaillance">Source de la défaillance</label>
                <input type="text" class="form-control" id="source_defaillance" placeholder="Entrez la source de la défaillance" wire:model.defer="source_defaillance">
                @error('source_defaillance') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="etat_signalement">Etat de signalement</label>
                <input type="text" class="form-control" id="etat_signalement" placeholder="Entrez l'état de signalement" wire:model.defer="etat_signalement">
                @error('etat_signalement') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="secteur_id">secteurs</label>
                <select class="form-control" id="secteur_id" wire:model.defer="secteur_id">
                    <option value="">-- Sélectionnez une secteur --</option>
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->nom_secteur }}</option>
                    @endforeach
                </select>
                @error('secteur_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </form>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-info" wire:click="save">Enregistrer</button>
        <button wire:click="goToListReclamation()" type="button" class="btn btn-danger">Annuler</button>
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
    });
</script>
    </div>
</div>