@extends('public.layouts.master')
@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">{{ auth()->user()['name'] }}</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="{{ route('public.home') }}">Beranda</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0 capitalize">profil</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->
  <!-- Cart Start -->
  <div class="container-fluid">
    <div class="row px-xl-5">
      <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
          <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Pesanan Saya</a>
          <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Menunggu Pembayaran <span
              class="badge badge-info">1</span></a>
          <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Profil</a>
        </div>
        <div class="tab-content">
          @include('public.tabs-profile.pesanan-tab')
          @include('public.tabs-profile.pembayaran-tab')
          @include('public.tabs-profile.profile-tab')
        </div>
      </div>
    </div>
  </div>
  <!-- Cart End -->
@endsection

@push('js')
  <script src="{{ asset('scripts/public/profile.js') }}"></script>
@endpush
