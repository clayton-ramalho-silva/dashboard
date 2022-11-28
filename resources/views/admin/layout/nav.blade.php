<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="col-2">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container">
                  <a class="navbar-brand" href="#">
                    <img src="{{asset('img/bootstrap-logo.svg')}}" alt="" width="30" height="24">
                  </a>
                </div>
              </nav>

        </div>

      <div class="collapse navbar-collapse col-10 justify-content-end" id="navbarSupportedContent">

        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="{{asset('img/usuario.png')}}" alt="" width="50" height="50" class="d-inline-block align-text-top">

              </a>
              <ul class="nav justify-content-end">

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $user->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>

                    </li>

                  </ul>
                </li>

              </ul>
            </div>

          </div>
          </nav>

    </div>
  </nav>
