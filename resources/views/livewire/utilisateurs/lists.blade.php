<h1>Liste des utilisateurs</h1>

<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info d-flex align-items-center ">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des utilisateurs
                </h3>
                <div class="card-tools d-flex align-items-center">
                    <a wire:click.prevent="goToAddUser()" class="btn btn-link text-white mr-4 d-block"><i class="fas fa-user-plus"></i>
                        utilisateur</a>
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Search">
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
                            <th style="width: 20%;">User</th>
                            <th style="width: 20%;">Role</th>
                            <th style="width: 15%;">Ajouté</th>
                            <th style="width: 15%;">Equipe</th>
                            <th class="text-center" style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($utilisateurs as $utilisateur)
                        <tr>
                            <td>
                                @if ($utilisateur->sexe=='M')
                                <img src="{{asset("images/male.png")}}" width="24" />
                                @else
                                <img src="{{asset("images/female.png")}}" width="24" />
                                @endif
                            </td>
                            <td>{{$utilisateur->id}}</td>
                            <td>{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</td>
                            <td>{{ $utilisateur->role }}</td>
                            <td>{{ $utilisateur->created_at->diffforHumans() }}</td>
                            <td>{{ $utilisateur->equipes->implode('nom','|')}}</td>



                            <td class="text-center">
                                <button class="btn btn-link" wire:click="goToEditUser({{$utilisateur->id}})"><i class="far fa-edit btn-info"></i></button>
                                <button class="btn btn-link" wire:click="confirmDelete('{{$utilisateur->prenom}} {{$utilisateur->nom}}',{{$utilisateur->id}})">
                                    <i class="far fa-trash-alt btn-info"></i></button>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="float-right">
                    {{ $utilisateurs->links() }}
                </div>
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
                    @this.deleteUser(event.detail.message.data.user_id);
                  /*   Swal.fire(
                    'Deleted!',
                    'l\'account est bien supprimé.',
                    'success'
                    ) */
                }
                })
          //  alert('Title',event.detail, 'success');
          // alert(event.detail);
});

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
</div>