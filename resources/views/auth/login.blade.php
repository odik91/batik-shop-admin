@extends('auth.layouts.master')
@section('content')
  <div class="row m-0 align-items-center bg-white vh-100">
    <div class="col-md-6">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
            <div class="card-body">
              <a href="#" class="navbar-brand d-flex align-items-center mb-3">
                <!--Logo start-->
                <!--logo End-->

                <!--Logo start-->
                <div class="logo-main">
                  <div class="logo-normal">
                    <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                        transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                      <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                        transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                      <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                        transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                      <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                        transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg>
                  </div>
                  <div class="logo-mini">
                    <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                        transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                      <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                        transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                      <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                        transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                      <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                        transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg>
                  </div>
                </div>
                <!--logo End-->

                <h4 class="logo-title ms-3">Batikmu</h4>
              </a>
              <h2 class="mb-2 text-center">Masuk</h2>
              <p class="text-center">Masuk untuk melajutkan</p>
              <form method="POST" action="{{ route('login') }}">
                @csrf
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
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
                {{-- <p class="text-center my-3">or sign in with other accounts?</p>
                <div class="d-flex justify-content-center">
                  <ul class="list-group list-group-horizontal list-group-flush">
                    <li class="list-group-item border-0 pb-0">
                      <a href="#"><img src="../../assets/images/brands/fb.svg" alt="fb"></a>
                    </li>
                    <li class="list-group-item border-0 pb-0">
                      <a href="#"><img src="../../assets/images/brands/gm.svg" alt="gm"></a>
                    </li>
                    <li class="list-group-item border-0 pb-0">
                      <a href="#"><img src="../../assets/images/brands/im.svg" alt="im"></a>
                    </li>
                    <li class="list-group-item border-0 pb-0">
                      <a href="#"><img src="../../assets/images/brands/li.svg" alt="li"></a>
                    </li>
                  </ul>
                </div> --}}
                <p class="mt-3 text-center">
                  Belum punya akun? <a href="{{ route('register') }}" class="text-underline">Klik disini untuk
                    mendaftar</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="sign-bg">
        <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g opacity="0.05">
            <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857"
              transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
            <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857"
              transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
            <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857"
              transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
            <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857"
              transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
          </g>
        </svg>
      </div>
    </div>
    <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
      <img src="{{ asset('template/assets/images/auth/01.png') }}" class="img-fluid gradient-main animated-scaleX"
        alt="images">
    </div>
  </div>
@endsection
