<div class="navbar-nav mr-auto py-0">
  <a href="{{ route('public.home') }}" class="nav-item nav-link {{ strtolower($title) == 'home' ? 'active' : '' }}">Beranda</a>
  <a href="{{ route('public.shop') }}" class="nav-item nav-link {{ strtolower($title) == 'toko' ? 'active' : '' }}">Toko</a>
  <a href="#" class="nav-item nav-link">Kontak Kami</a>
</div>
<div class="navbar-nav ml-auto py-0">
  @if (Route::has('login'))
    @auth
      <a href="#" class="nav-item nav-link">Profil</a>
      <a href="{{ route('logout') }}" class="nav-item nav-link"
        onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Keluar</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    @else
      <a href="{{ route('login') }}" class="nav-item nav-link">Masuk</a>
      <a href="{{ route('register') }}" class="nav-item nav-link">Daftar</a>
    @endauth
  @endif
</div>
