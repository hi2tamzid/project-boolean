<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <a class="navbar-brand" href="{{ URL::to('/admin-dashboard') }}"><span class="header_title_1">{{$account_holder}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 navlist_cut">
        <li class="nav-item">
          <a class="nav-link {{ $overviewActive }}" aria-current="page" href="{{ URL::to('/admin-dashboard') }}">Overview</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $controlPanelActive }}" aria-current="page" href="{{ URL::to('/control-panel') }}"><i class="fas fa-users-cog"></i> Control Panel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ URL::to('/logout-admin') }}"><i class="fas fa-sign-out-alt"></i> Log out</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>