@extends('public.layouts.master')
@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">kontak kami</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="{{ route('public.home') }}">Home</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">Kontak</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Contact Start -->
  <div class="container-fluid pt-5">
    <div class="text-center mb-4">
      <h2 class="section-title px-5">
        <span class="px-2 capitalize">hubungi kami jika ada pertanyaan</span>
      </h2>
    </div>
    <div class="row px-xl-5">
      <div class="col-lg-7 mb-5">
        <div class="contact-form">
          <div id="success"></div>
          <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST">
            @csrf
            <div class="control-group">
              <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" required="required"
                data-validation-required-message="Mohon masukkan nama anda" />
              <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
              <input type="email" class="form-control" id="email" placeholder="Email anda" required="required"
                data-validation-required-message="Mohon masukkan email" />
              <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
              <input type="text" class="form-control" id="subject" placeholder="Judul" required="required"
                data-validation-required-message="Mohon judul pertanyaan" />
              <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
              <textarea class="form-control" rows="6" id="message" placeholder="Message" required="required"
                data-validation-required-message="Mohon masukkan pesan anda"></textarea>
              <p class="help-block text-danger"></p>
            </div>
            <div>
              <button class="btn btn-primary py-2 px-4 capitalize" type="submit" id="sendMessageButton">
                kirim pesan
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-5 mb-5">
        <h5 class="font-weight-semi-bold mb-3 capitalize">hubungi kami</h5>
        <p>
          Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed
          duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat
          clita ipsum justo sed.
        </p>
        <div class="d-flex flex-column mb-3">
          <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
          <p class="mb-2">
            <i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street,
            New York, USA
          </p>
          <p class="mb-2">
            <i class="fa fa-envelope text-primary mr-3"></i>info@example.com
          </p>
          <p class="mb-2">
            <i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890
          </p>
        </div>
        <div class="d-flex flex-column">
          <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
          <p class="mb-2">
            <i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street,
            New York, USA
          </p>
          <p class="mb-2">
            <i class="fa fa-envelope text-primary mr-3"></i>info@example.com
          </p>
          <p class="mb-0">
            <i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->
@endsection
