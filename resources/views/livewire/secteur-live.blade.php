<div>
    {{-- Do your work, then step back. --}}


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus fa-2x"></i> Formulaire de création d'un secteur</h3>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="save">
            <!-- Form fields -->
            <div class="form-group">
                <label for="nom_secteur">Nom Secteur</label>
                <input type="text" class="form-control" id="nom_secteur" placeholder="Entrez le nom du secteur" wire:model.defer="nom_secteur" required>
                @error('nom_secteur') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" placeholder="Entrez la ville" wire:model.defer="ville" required>
                @error('ville') <span class="error">{{ $message }}</span> @enderror
            </div>



            <div class="mb-4">
                <label for="type_secteur" class="block mb-2">Type de Secteur</label>
                <select id="type_secteur" wire:model.defer="type_secteur" required class="form-select">
                    <option value="">-- Sélectionnez --</option>
                    <option value="résidentiel">Résidentiel</option>
                    <option value="commercial">Commercial</option>
                    <option value="industriel">Industriel</option>
                    <option value="public">Public</option>
                </select>
                @error('type_secteur') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>


            <template x-for="coordinate in clickedPolygonCoordinates">
                <li x-text="coordinate"></li>
              </template>
              <div class="form-group">
                <label for="geom">Geom</label>
                <input type="text" class="form-control" id="geom" placeholder="Entrez la valeur de geom" wire:model.defer="geom" required x-bind:value="'POLYGON((' + clickedPolygonCoordinates.map(coordinate => coordinate.join(',')).join(' ') + '))'">

                @error('geom') <span class="error">{{ $message }}</span> @enderror
              </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-info">Enregistrer</button>
            <button wire:click="goToListReclamation" type="button" class="btn btn-danger">Annuler</button>
        </div>
    </form>
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
