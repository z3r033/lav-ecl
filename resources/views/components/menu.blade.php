<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item  menu-open {{setMenuClass('home','menu-open')}}">
      <a href="#" class="nav-link {{setMenuClass('home','active')}}">
        <i class="nav-icon fas fa-globe-americas fa-lg"></i>
        <p>
          Gestion GIS
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link  {{setMenuClass('home','active')}}">
            <i class="nav-icon fas fa-globe-americas"></i>
            <p>S.I.G</p>
          </a>
        </li>

    </li>
  </ul>
  </li>





  <li class="nav-item menu-open {{setMenuClass('users.index','menu-open')}}">
    <a href="#" class="nav-link {{setMenuClass('users.index','active')}}">
      <i class=" nav-icon fas fa-user-shield"></i>
      <p>
        Gestion des personnels
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item  ">
        <a href="{{ route('users.index') }}" class="nav-link {{setMenuClass('users.index','active')}}">
          <i class=" nav-icon fas fa-users-cog"></i>
          <p>Utilisateurs</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users-slash"></i>
          <p>équipes</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-fingerprint"></i>
          <p>roles</p>
        </a>
      </li>

    </ul>
  </li>

  <li class="nav-item menu-open {{setMenuClass('articles','menu-open')}} {{setMenuClass('type-articles','menu-open')}} ">
    <a href="#" class="nav-link {{setMenuClass('articles','active')}} {{setMenuClass('type-articles','active')}}">
      <i class="nav-icon fas fa-cogs"></i>
      <p>
        Gestion articles
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>


    <ul class="nav nav-treeview">
      <li class="nav-item ">
        <a href="{{route('articles')}}" class="nav-link {{setMenuClass('articles','active')}}">
          <i class="nav-icon  fas fa-solar-panel"></i>
          <p>Articles</p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{ route('type-articles')}}" class="nav-link {{setMenuClass('type-articles','active')}}">
          <i class="nav-icon fas fa-cogs"></i>
          <p>Type d'articles</p>
        </a>
      </li>


    </ul>
  </li>



  <li class="nav-item menu-open {{setMenuClass('reclamations','menu-open')}} {{setMenuClass('interventions','menu-open')}}">
    <a href="#" class="nav-link {{setMenuClass('reclamations','active')}} {{setMenuClass('interventions','active')}}">
      <i class="nav-icon fas fa-lightbulb"></i>
      <p>
        Interventions
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('reclamations')}}" class="nav-link  {{setMenuClass('reclamations','active')}} ">
          <i class="nav-icon fas fa-bullhorn"></i>
          <p>Reclamation</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('interventions')}}" class="nav-link  {{setMenuClass('interventions','active')}} ">
          <i class="nav-icon fas fa-wrench"></i>
          <p>Interventions</p>
        </a>
      </li>

    </ul>
  </li>
</nav>