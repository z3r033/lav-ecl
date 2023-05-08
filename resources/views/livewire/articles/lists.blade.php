<h1>Liste des articles</h1>

<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info d-flex align-items-center ">
                <h3 class="card-title flex-grow-1"><i class="fas fa-clipboard-list fa-2x"></i> Liste des articles
                </h3>
                <div class="card-tools d-flex align-items-center">
                    <a wire:click.prevent="goToAddArticle()" class="btn btn-link text-white mr-4 d-block"><i class="fas fa-plus"></i>
                        Ajouter un article</a>
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Rechercher">
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
                            <th style="width: 10%;"></th>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 15%;">Nom</th>
                            <th style="width: 15%;">Prix</th>
                            <th style="width: 15%;">Quantité</th>
                            <th style="width: 15%;">type d'article</th>
                            <th class="text-center" style="width: 10%;">Date creation</th>
                            <th class="text-center" style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($articles as $article)
                        <tr>
                            <td>
                                <img src="{{$article->imageUrl}}" width="24" />
                            </td>
                            <td>{{$article->id}}</td>
                            <td>{{ $article->nom }}</td>
                            <td>{{ $article->prix }} DH</td>
                            <td>{{ $article->quantite }}</td>
                            <td><button class="btn btn-link btn-info text-white"  wire:click="getArticlesByTypeId({{$article->TypeArticle->id}},'{{$article->TypeArticle->type_nom}}')">{{ $article->TypeArticle->type_nom}}</button></td>
                         
                            <td>{{ $article->created_at->diffForHumans() }}</td>

                            <td class="text-center">
                                <button class="btn btn-link" wire:click="goToEditArticle({{$article->id}})"><i class="far fa-edit btn-info"></i></button>
                                <button class="btn btn-link" wire:click="confirmDelete('{{$article->nom}}',{{$article->id}})">
                                    <i class="far fa-trash-alt btn-info"></i></button>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="float-right">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        @if(!is_null($articlesOfId) && !is_null($typeArt))
        <h2>{{$typeArt}}</h2>
        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Quantite</th>
                <th>Prix</th>
                <th>Date ajout</th>
                <th>Date mise a jour</th>
                <th>Type article ID</th>
                <th>Est disponible</th>
                <th>Image URL</th>
              </tr>
            </thead>
            <tbody>
              @foreach(json_decode($articlesOfId) as $article)
                <tr>
                  <td>{{ $article->id }}</td>
                  <td>{{ $article->nom }}</td>
                  <td>{{ $article->description }}</td>
                  <td>{{ $article->quantite }}</td>
                  <td>{{ $article->prix }}</td>
                  <td>{{ $article->date_ajout }}</td>
                  <td>{{ $article->date_mise_a_jour }}</td>
                  <td>{{ $article->type_article_id }}</td>
                  <td>{{ $article->estDisponible }}</td>
                  <td>{{ $article->imageUrl }}</td>
                </tr>
              
              @endforeach
         
            </tbody>
          </table>
          @endif
     
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
                    @this.deleteArticle(event.detail.message.data.article_id);
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
