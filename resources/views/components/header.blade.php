<header class="cabeza">
  <nav class="navbar navbar-expand-lg navbar-light footerBg">
  <div class="container">
    <a class="navbar-brand" href="{{ route('portada') }}">ACERVO AUDIOVISUAL TAMIX</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Accesar') }}</a>
            </li>
          @endif

          <!--@if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
              </li>
          @endif-->
        @else
          <li class="nav-item">
            <a href="{{route('inicio')}}" class="btn btn-light">
              <img src="{{asset('storage/img/iconos/buscar.png')}}" width="20px">
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('archivos.index')}}" class="nav-link">Archivos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                  ">
                    {{ __('Salir') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>

              </li>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
</header>
