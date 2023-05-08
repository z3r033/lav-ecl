<div class="row">
    <div class="col-md-6">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus fa-2x"></i>Formulaire de création d'un nouvel article</h3>
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
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Entrez la description"
                            wire:model.defer="description"></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantite">Quantité</label>
                        <input type="number" class="form-control" id="quantite" placeholder="Entrez la quantité"
                            wire:model.defer="quantite" required>
                        @error('quantite') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" class="form-control" id="prix" placeholder="Entrez le prix"
                            wire:model.defer="prix" step="0.01" required>
                        @error('prix') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_ajout">Date d'ajout</label>
                        <input type="date" class="form-control" id="date_ajout" wire:model.defer="date_ajout" required>
                        @error('date_ajout') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="type_article_id">Type d'article</label>
                        <select class="form-control" id="type_article_id" wire:model.defer="type_article_id" required>
                            <option value="">-- Sélectionnez --</option>
                            @foreach($typesArticles as $typeArticle)
                            <option value="{{ $typeArticle->id }}">{{ $typeArticle->type_nom }}</option>
                            @endforeach
                        </select>
                        @error('type_article_id') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="estDisponible">Disponibilité</label>
                        <select class="form-control" id="estDisponible" wire:model.defer="estDisponible" required>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                        @error('estDisponible') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="imageUrl">URL de l'image</label>
                        <input type="text" class="form-control" id="imageUrl" placeholder="Entrez l'URL de l'image"
                            wire:model.defer="imageUrl">
                        @error('imageUrl') <span class="error">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info" wire:click="save">Enregistrer</button>
                <button wire:click="goToListArticles()" type="button" class="btn btn-danger">Annuler</button>
            </div>

        </div>
    </div>
</div>
</div>
</div>