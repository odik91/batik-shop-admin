@extends('public.layouts.master')
@push('style')
  <style>
    .select2-results__options {
      max-height: 300px;
      overflow-y: scroll;
    }

    .select2-container .select2-selection--single {
      height: 38px;
      border: 1px solid #EDF1FF;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
      padding-top: 5px;
    }
  </style>
@endpush
@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">Keranjang Belanja</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="{{ route('public.home') }}">Beranda</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">Keranjang Belanja</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->
  <!-- Cart Start -->
  <div class="container-fluid pt-5">
    <form action="" id="form-checkout" method="POST">
      @csrf
      <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
          <table class="table table-bordered text-center mb-0">
            <thead class="bg-secondary text-dark">
              <tr>
                <th>Produk </th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Harga</th>
                <th>Kuantitas</th>
                <th>Total</th>
                <th>Hapus</th>
              </tr>
            </thead>
            <tbody class="align-middle" id="detail-cart">
              {{-- <tr>
                <td class="align-middle"><img src="{{ asset('bootstrap-shop-template/img/product-1.jpg') }}"
                    alt="" style="width: 50px;"> Colorful Stylish
                  Shirt</td>
                <td class="align-middle">warna</td>
                <td class="align-middle">ukuran</td>
                <td class="align-middle">Rp150</td>
                <td class="align-middle">
                  <div class="input-group quantity mx-auto" style="width: 100px;">
                    <div class="input-group-btn">
                      <button class="btn btn-sm btn-primary btn-minus">
                        <i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                      <button class="btn btn-sm btn-primary btn-plus">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </td>
                <td class="align-middle">Rp150</td>
                <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
              </tr> --}}
            </tbody>
          </table>
        </div>
        <div class="col-lg-4">
          <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
              <h6 class="font-weight-semi-bold m-0">Kurir</h6>
            </div>
            <div class="card-body">
              <h6 class="text-center">Tujuan Pengiriman</h6>
              <hr>
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi" id="provinsi" class="form-control">
                  <option value="" selected disabled>Pilih provinsi</option>
                </select>
              </div>
              <div class="form-group">
                <label for="kota">Kabupaten Kota</label>
                <select name="kota" id="kota" class="form-control" disabled>
                  <option value="" selected disabled>Pilih kabupaten kota</option>
                </select>
              </div>
              <hr>
              <div class="form-group row">
                <label for="kurir" class="col-sm-4 col-form-label">Kurir</label>
                <div class="col-sm-8">
                  <select class="form-control" name="kurir" id="kurir" disabled>
                    <option value="" selected disabled>Pilih kurir</option>
                    <option value="lokal">Kurir lokal</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS Indonesia</option>
                    <option value="tiki">TIKI</option>
                  </select>
                </div>
              </div>
              <div class="form-group row px-3">
                <button type="button" id="check-layanan-kurir" class="btn btn-block btn-sm btn-info">Cek Layanan</button>
              </div>
              {{-- <div class="form-group row">
                <label for="service" class="col-sm-4 col-form-label">Layanan</label>
                <div class="col-sm-8">
                  <select class="form-control" name="service" id="service">
                    <option value="" selected disabled>Pilih layanan</option>
                  </select>
                </div>
              </div> --}}
              <div class="row" id="list-layanan">                
              </div>
            </div>
          </div>
          {{-- <div class="input-group">
            <input type="text" class="form-control p-4" placeholder="Coupon Code">
            <div class="input-group-append">
              <button class="btn btn-primary">Gunakan Kupon</button>
            </div>
          </div> --}}
          <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
              <h4 class="font-weight-semi-bold m-0">Informasi Belanja</h4>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Subtotal</h6>
                <h6 class="font-weight-medium" id="subtotal">Rp150</h6>
              </div>
              <div class="d-flex justify-content-between">
                <h6 class="font-weight-medium">Shipping</h6>
                <h6 class="font-weight-medium" id="shipping">Rp0</h6>
              </div>
            </div>
            <div class="card-footer border-secondary bg-transparent">
              <div class="d-flex justify-content-between mt-2">
                <h5 class="font-weight-bold">Total</h5>
                <h5 class="font-weight-bold" id="grand-total">Rp160</h5>
              </div>
              {{-- <button class="btn btn-block btn-primary my-3 py-3">Lajutkan Ke Pemesanan</button> --}}
              @if (Route::has('login'))
                @auth
                  <a href="{{ route('public.checkout') }}" class="btn btn-block btn-primary my-3 py-3">Lajutkan Ke
                    Pemesanan</a>
                @else
                  <a href="{{ route('login') }}"
                    class="btn btn-block btn-primary my-3 py-3 text-capitalize text-light">Login untuk memesan</a>
                @endauth
              @endif
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- Cart End -->
@endsection

@push('js')
  <script src="{{ asset('scripts/public/cart.js') }}"></script>
@endpush
