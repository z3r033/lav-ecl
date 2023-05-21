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

  {{--   <input type="text" class="form-control" id="geom" placeholder="Entrez la valeur de geom" wire:model.defer="-7.844822656250001,32.48710859375001,-6.284764062500001,29.78447187500001,-8.59189296875,29.63066328125001,-7.844822656250001,32.48710859375001geom" required :value="'POLYGON((' + clickedPolygonCoordinates.map(coordinate => coordinate.join(','))+ '))'"> --}}
  {{--  <input type="text" class="form-control" id="geom" placeholder="Entrez la valeur de geom" wire:model.defer="geom" required x-bindvalue="clickedPolygonCoordinates.map(coordinate => coordinate.join(','))+">--}}
  <input type="text" class="form-control" id="geom" placeholder="Entrez la valeur de geom" wire:model.defer="geom" required x-bind:value="clickedPolygonCoordinates.map(coordinate => coordinate.join('#')).join(' ')">


                @error('geom') <span class="error">{{ $message }}</span> @enderror
              </div>


        <div class="card-footer">
            <button type="submit" class="btn  btn-info" style="color: black;">Enregistrer</button>
            <button  type="button" @click="opensupportModal = false" style="color: black;" class="btn btn-danger" data-modal-hide="support-modal">Annuler</button>
            <button type="button" @click="opensupportModal = false" class="close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="support-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
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
