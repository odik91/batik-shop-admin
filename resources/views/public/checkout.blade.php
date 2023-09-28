@extends('public.layouts.master')
@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="{{ route('public.home') }}">Beranda</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">Checkout</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->


  <!-- Checkout Start -->
  <form action="#" method="post" id="buat-pesanan-form">
    <div class="container-fluid pt-5">
      <div class="row px-xl-5">
        <div class="col-lg-8">
          <div class="mb-4">
            <h4 class="font-weight-semi-bold mb-4">Alamat Pengiriman</h4>
            <div class="row">
              <div class="col-md-6 form-group">
                <label class="capitalize" for="name">nama lengkap</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Nama Lengkap">
              </div>
              <div class="col-md-6 form-group">
                <label class="capitalize" for="email">email</label>
                <input class="form-control" name="email" id="email" type="email" placeholder="email">
              </div>
              <div class="col-md-6 form-group">
                <label class="capitalize" for="no-hp">No HP</label>
                <input class="form-control" type="text" name="np-hp" id="np-hp" placeholder="example@email.com">
              </div>
              <div class="col-md-6 form-group">
                <label class="capitalize" for="alamat">alamat</label>
                <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Alamat">
              </div>
              <div class="col-md-6 form-group">
                <label class="capitalize" for="provinsi">provinsi</label>
                <select class="custom-select" name="provinsi" id="provinsi">
                  <option selected>Kepulauan Riau</option>
                  <option>Aceh</option>
                  <option>Sumatra utara</option>
                  <option>Riau</option>
                  <option>Sumatera Barat</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label class="capitalize" for="kabupaten-kota">Kabupaten-Kota</label>
                <select class="custom-select" name="provinsi" id="provinsi">
                  <option selected>Tanjung Pinang</option>
                  <option>Bintan</option>
                  <option>Batam</option>
                  <option>...</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label class="capitalize" for="kode-pos">Kode Pos</label>
                <input class="form-control" type="text" name="kode-pos" id="kode-pos" placeholder="Kode Pos">
              </div>
              <div class="col-md-12 form-group">
                <label class="capitalize" for="keterangan">keterangan <small class="text-info"><i>(max
                      300)</i></small></label>
                <textarea class="form-control" name="keterangan" id="keterangan" cols="10" rows="5" placeholder="Keterangan"
                  maxlength="300"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
              <h4 class="font-weight-semi-bold m-0">Order Total</h4>
            </div>
            <div class="card-body">
              <h5 class="font-weight-medium mb-3">Produk</h5>
              <div class="d-flex justify-content-between">
                <p>Colorful Stylish Shirt 1</p>
                <p>Rp150.000</p>
              </div>
              <div class="d-flex justify-content-between">
                <p>Colorful Stylish Shirt 2</p>
                <p>Rp150.000</p>
              </div>
              <div class="d-flex justify-content-between">
                <p>Colorful Stylish Shirt 3</p>
                <p>Rp150.000</p>
              </div>
              <hr class="mt-0">
              <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Subtotal</h6>
                <h6 class="font-weight-medium">Rp450.000</h6>
              </div>
              <div class="d-flex justify-content-between">
                <h6 class="font-weight-medium">Shipping</h6>
                <h6 class="font-weight-medium">Rp10.000</h6>
              </div>
              <div class="d-flex justify-content-between">
                <h6 class="font-weight-medium">Kode Unik</h6>
                <h6 class="font-weight-medium">Rp123</h6>
              </div>
            </div>
            <div class="card-footer border-secondary bg-transparent">
              <div class="d-flex justify-content-between mt-2">
                <h5 class="font-weight-bold">Total</h5>
                <h5 class="font-weight-bold">Rp450.123</h5>
              </div>
            </div>
          </div>
          <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
              <h4 class="font-weight-semi-bold m-0">Metode Pembayaran</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" name="payment" id="ambil-ditempat"
                    value="ambil-sendiri">
                  <label class="custom-control-label" for="ambil-ditempat">Pengambilan Ditempat</label>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" name="payment" id="cod" value="cod">
                  <label class="custom-control-label" for="cod">COD (Bayar Setelah Barang Sampai)</label>
                </div>
              </div>
              <div class="">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" name="payment" id="banktransfer"
                    value="banktransfer">
                  <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                </div>
              </div>
            </div>
            <div class="card-footer border-secondary bg-transparent">
              <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Buat Pesanan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- Checkout End -->
@endsection
