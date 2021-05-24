
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">Online Pharmacy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        @if($user == '-')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('registration') }}">Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        @else
          @if($user->role == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('newMedicine') }}">Add medicine</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('basket') }}">Basket</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">My page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('basket') }}">Basket</a>
            </li>
          @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
  </nav>
  <br><br>
