<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus fa-2x"></i>Formulaire de création d'une nouvelle intervention</h3>
            </div>
    
            <div class="card-body">
                <form wire:submit.prevent="save">
              
                    <div class="form-group">
                        <label for="secteur_id">Secteur</label>
                        <select class="form-control" id="secteur_id" wire:model.defer="secteur_id" required>
                            <option value="">-- Sélectionnez --</option>
                            @foreach($secteurs as $secteur)
                            <option value="{{ $secteur->id }}">{{ $secteur->nom_secteur }}</option>
                            @endforeach
                        </select>
                        @error('secteur_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="poste_electrique_id">Poste électrique</label>
                        <select class="form-control" id="poste_electrique_id" wire:model.defer="poste_electrique_id" required>
                            <option value="">-- Sélectionnez --</option>
                            @foreach($postesElectriques as $posteElectrique)
                            <option value="{{ $posteElectrique->id }}">{{ $posteElectrique->nom }}</option>
                            @endforeach
                        </select>
                        @error('poste_electrique_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="type_intervention">Type d'intervention</label>
                        <select class="form-control" id="type_intervention" wire:model.defer="type_intervention" required>
                            <option value="">-- Sélectionnez --</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="inspection">Inspection</option>
                            <option value="urgence">Urgence</option>
                            <option value="autre">Autre</option>
                        </select>
                        @error('type_intervention') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <fieldset>
                        <legend>Type d'intervention:</legend>
                    
                        <div>
                          <input type="checkbox" id="lamp" name="lamp" checked>
                          <label for="lamp">changement de lamp</label>
                        </div>
                    
                        <div>
                          <input type="point_lumn" id="point_lumn" name="horns">
                          <label for="point_lumn">changement de point lumineurs</label>
                        </div>
                        <div>
                            <input type="checkbox" id="autre" name="autre">
                            <label for="autre">Autres</label>
                          </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Entrez la description"
                            wire:model.defer="description"></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_intervention">Date de lintervention</label>
<input type="date" class="form-control" id="date_intervention" wire:model.defer="date_intervention" required>
@error('date_intervention') <span class="error">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="duree">Durée (en minutes)</label>
<input type="number" class="form-control" id="duree" placeholder="Entrez la durée"
                     wire:model.defer="duree" required>
@error('duree') <span class="error">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="statut">Statut</label>
<select class="form-control" id="statut" wire:model.defer="statut" required>
<option value="">-- Sélectionnez --</option>
<option value="planifié">Planifié</option>
<option value="en_cours">En cours</option>
<option value="terminé">Terminé</option>
<option value="annulé">Annulé</option>
</select>
@error('statut') <span class="error">{{ $message }}</span> @enderror
</div>
</form>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-info" wire:click="save">Enregistrer</button>
    <button wire:click="goToListInterventions()" type="button" class="btn btn-danger">Annuler</button>
</div>

</div>
</div> 