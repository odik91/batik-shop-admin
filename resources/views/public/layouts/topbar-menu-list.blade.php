<div class="navbar-nav mr-auto py-0">
  <a href="{{ route('public.home') }}"
    class="nav-item nav-link {{ strtolower($title) == 'home' ? 'active' : '' }}">Beranda</a>
  <a href="{{ route('public.shop') }}"
    class="nav-item nav-link {{ strtolower($title) == 'toko' ? 'active' : '' }}">Toko</a>
  <a href="{{ route('public.contact-us') }}"
    class="nav-item nav-link {{ strtolower($title) == 'kontak kami' ? 'active' : '' }}">Kontak Kami</a>
</div>
<div class="navbar-nav ml-auto py-0">
  @if (Route::has('login'))
    @auth
      <a href="{{ route('public.profile') }}" class="nav-item nav-link">Profil</a>
      <a href="{{ route('logout') }}" class="nav-item nav-link"
        onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Keluar</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    @else
      {{-- <a href="{{ route('login') }}" class="nav-item nav-link">Masuk</a> --}}

      {{-- use modal login --}}
      <!-- Button trigger modal -->
      <a href="javascript:void(0)" class="nav-item nav-link" data-toggle="modal" data-target="#Login">
        Masuk
      </a>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <!-- Modal -->
        <div class="modal fade" id="Login" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="LoginLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="LoginLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="email"
                        placeholder="Email" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password"
                        aria-describedby="password" placeholder=" ">
                    </div>
                  </div>
                  <div class="col-lg-12 d-flex justify-content-between">
                    <div class="form-check mb-3">
                      <input type="checkbox" class="form-check-input" id="customCheck1">
                      <label class="form-check-label" for="customCheck1">Tetap masuk</label>
                    </div>
                    <a href="recoverpw.html">Lupa password?</a>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Masuk</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      {{-- use modal login --}}

      <a href="{{ route('register') }}" class="nav-item nav-link">Daftar</a>
    @endauth
  @endif
</div>
