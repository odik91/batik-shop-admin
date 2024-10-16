<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="_token" content="{{ csrf_token() }}">
  <title>Batikmu - {{ $title }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="{{ asset('bootstrap-shop-template/img/favicon.ico') }}" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  {{-- sweet alert --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.min.css">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="{{ asset('bootstrap-shop-template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{ asset('bootstrap-shop-template/css/style.css') }}" rel="stylesheet">

  {{-- select2 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

  {{-- toastify --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  <!-- Main Stylesheet -->
  <link href="{{ asset('styles/loading.css') }}" rel="stylesheet">
  <link href="{{ asset('styles/main.css') }}" rel="stylesheet">

  @stack('style')
</head>

<body>
  {{-- loading animation --}}
  <div class="spinner-box loading-rtf d-none" id="loading-rtf">
    <div class="three-quarter-spinner"></div>
  </div>

  <!-- Topbar Start -->
  @include('public.layouts.topbar')
  <!-- Topbar End -->


  <!-- Navbar Start -->
  @include('public.layouts.navbar')
  <!-- Navbar End -->


  @yield('content')


  <!-- Footer Start -->
  @include('public.layouts.footer')
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"
    integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('bootstrap-shop-template/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('bootstrap-shop-template/lib/owlcarousel/owl.carousel.min.js') }}"></script>

  <!-- Contact Javascript File -->
  <script src="{{ asset('bootstrap-shop-template/mail/jqBootstrapValidation.min.js') }}"></script>
  <script src="{{ asset('bootstrap-shop-template/mail/contact.js') }}"></script>

  <!-- Template Javascript -->
  <script src="{{ asset('bootstrap-shop-template/js/main.js') }}"></script>

  {{-- sweet alert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.all.min.js"></script>

  {{-- select2 --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  {{-- toastify --}}
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <script src="{{ asset('scripts/main.js') }}"></script>
  <script src="{{ asset('scripts/public/main-public.js') }}"></script>

  @stack('js')
</body>

</html>
