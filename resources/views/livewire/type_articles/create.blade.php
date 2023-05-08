<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus fa-2x"></i>Formulaire de création d'un nouveau type d'article</h3>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="type_nom">type_nom du type d'article</label>
                <input type="text" class="form-control" id="type_nom" placeholder="Entrez le type_nom"
                    wire:model.defer="type_nom" required minlength="2">
                @error('type_nom') <span class="error">{{ $message }}</span> @enderror
            </div>
        </form>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-info" wire:click="save">Enregistrer</button>
        <button wire:click="goToListTypeArticle()" type="button" class="btn btn-danger">Annuler</button>
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
</div>