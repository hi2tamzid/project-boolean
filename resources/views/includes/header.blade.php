<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <a class="navbar-brand" href="{{ URL::to('/') }}"><span class="header_title_1">Project</span> Manager</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 navlist_cut">
        <li class="nav-item">
          <a class="nav-link {{ $homeActive }}" aria-current="page" href="{{ URL::to('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('/supervisor-login') }}" ><i class="fas fa-sign-in-alt"></i> Login</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

@include('includes.loginform')  