<aside class="control-sidebar control-sidebar-dark">

    <div class="p-3">
        <div class="card bg-dark">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('images/user2-160x160.jpg')}}"
                        alt="User profile picture">
                </div>
                <h3 class="profile-username text-center ellipsis">{{userfullName()}} </h3>
                <p class="text-muted text-center">{{auth()->user()->role}}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <button class="btn btn-block btn-outline-info btn-sm"><i class="fas fa-user"></i> Mon profil </button>
                    </li>
                    <li class="list-group-item">
                        <button class="btn btn-block btn-outline-info btn-sm">   <i class="fas fa-lock"></i> Changer le mot de passe</button>
                    </li>

                </ul>
               
                <a class=" btn btn-info btn-block" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Déconnexion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
            </div>

        </div>
</aside>