<div>
    <h1>Liste des interventions pour la réclamation {{-- "{{ $reclamation->titre }}" --}}</h1>

    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info d-flex align-items-center ">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-tag fa-2x"></i> Liste des interventions</h3>
                    <div class="card-tools d-flex align-items-center">
                        <button wire:click="goToAddIntervention()"
                            class="btn btn-link flex-grow-1 text-white mr-4 d-block"><i class="fas fa-plus"></i> Ajouter
                            une intervention</button>
                        <div class="input-group input-group-sm flex-grow-1">
                            <input wire:model="search" type="text" name="table_search" class="form-control float-right"
                                placeholder="Recherche">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 5%;"></th>
                                <th style="width: 20%;">ID</th>
                                <th style="width: 30%;">secteur_id</th>
                                <th style="width: 25%;">type intervention</th>
                                <th class="text-center" style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interventions as $intervention)
                            <tr>
                                <td><i class="fas fa-tag"></i></td>
                                <td>{{$intervention->id}}</td>
                                <td>{{$intervention->secteur_id}}</td>
                                <td>
                                    @switch($intervention->type_intervention)
                                    @case('urgence')
                                    <span class="badge badge-warning">{{$intervention->type_intervention}}</span>
                                    @break

                                    @case('inspection')
                                    <span class="badge badge-warning">{{$intervention->type_intervention}}</span>
                                    @break

                                    {{-- @case('resolue')
                                    <span class="badge badge-success">Résolue</span>
                                    @break

                                    @case('fermee')
                                    <span class="badge badge-secondary">Fermée</span>
                                    @break --}}

                                    @default
                                    <span class="badge badge-secondary">{{ $intervention->type_intervention }}</span>
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-link"
                                        wire:click="goToEditIntervention({{$intervention->id}})"><i
                                            class="far fa-edit btn-info"></i></button>
                                    <button class="btn btn-link" wire:click="confirmDelete({{$intervention->id}})"><i
                                            class="far fa-trash-alt btn-info"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer table-responsive">

                    {{-- {{ $utilisateurs->links() }} --}}
                    <div class="pagination-links">
                        {{ $interventions->onEachSide(1)->links() }}
                    </div>
                </div>
                <div class="card-footer">
                  
                </div>
            </div>

            <script>
                window.addEventListener('showConfirmMessage', function (event) {
                                        Swal.fire({
                                            title: event.detail.message.title,
                                            text: event.detail.message.text,
                                            icon: event.detail.message.type,
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'oui, supprimer!',
                                            cancelButtonText: 'annuler'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                @this.deleteReclamation(event.detail.message.data.reclamation_id);
                                            }
                                        });
                                    });
                        
                                    window.addEventListener('showSuccessMessage', function (event) {
                                        swal.fire({
                                            title: event.detail.message,
                                            text: event.detail,
                                            toast: true,
                                            showConfirmButton: false,
                                            icon: 'success',
                                            confirmButtonText: 'OK',
                                            position: 'top-end',
                                            timer: 1500
                                        });
                                    });
            </script>
        </div>
    </div>