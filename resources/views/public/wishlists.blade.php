@extends('public.layouts.master')
@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">daftar keinginan</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="{{ route('public.home') }}">Beranda</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0 capitalize">daftar keinginan</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->
  <!-- Cart Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5">
      <div class="col-lg-8 table-responsive mb-5">
        <table class="table table-bordered text-center mb-0">
          <thead class="bg-secondary text-dark">
            <tr>
              <th>Pilih</th>
              <th>Produk </th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody class="align-middle">
            <tr>
              <td class="align-middle">
                <input type="checkbox" name="item[]" id="item-1" class="form-control form-control-sm">
              </td>
              <td class="align-middle"><img src="{{ asset('bootstrap-shop-template/img/product-1.jpg') }}" alt=""
                  style="width: 50px;"> Colorful Stylish
                Shirt</td>
              <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
            </tr>
            <tr>
              <td class="align-middle">
                <input type="checkbox" name="item[]" id="item-2" class="form-control form-control-sm">
              </td>
              <td class="align-middle"><img src="{{ asset('bootstrap-shop-template/img/product-2.jpg') }}" alt=""
                  style="width: 50px;"> Colorful Stylish
                Shirt</td>
              <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
            </tr>
            <tr>
              <td class="align-middle">
                <input type="checkbox" name="item[]" id="item-3" class="form-control form-control-sm">
              </td>
              <td class="align-middle"><img src="{{ asset('bootstrap-shop-template/img/product-3.jpg') }}" alt=""
                  style="width: 50px;"> Colorful Stylish
                Shirt</td>
              <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
            </tr>
            <tr>
              <td class="align-middle">
                <input type="checkbox" name="item[]" id="item-4" class="form-control form-control-sm">
              </td>
              <td class="align-middle"><img src="{{ asset('bootstrap-shop-template/img/product-4.jpg') }}" alt=""
                  style="width: 50px;"> Colorful Stylish
                Shirt</td>
              <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
            </tr>
            <tr>
              <td class="align-middle">
                <input type="checkbox" name="item[]" id="item-5" class="form-control form-control-sm">
              </td>
              <td class="align-middle"><img src="{{ asset('bootstrap-shop-template/img/product-5.jpg') }}" alt=""
                  style="width: 50px;"> Colorful
                Stylish
                Shirt</td>
              <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-4">
        <div class="card border-secondary mb-5">
          <div class="card-header bg-secondary border-0">
            <h4 class="font-weight-semi-bold m-0">Informasi Barang</h4>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between mb-3 pt-1">
              <h6 class="font-weight-medium">Total Barang Terpilih</h6>
              <h6 class="font-weight-medium">3</h6>
            </div>
          </div>
          <div class="card-footer border-secondary bg-transparent">
            {{-- <div class="d-flex justify-content-between mt-2">
              <h5 class="font-weight-bold">Total</h5>
              <h5 class="font-weight-bold">Rp160</h5>
            </div> --}}
            {{-- <button class="btn btn-block btn-primary my-3 py-3">Lajutkan Ke Pemesanan</button> --}}
            <a href="{{ route('public.checkout') }}" class="btn btn-block btn-primary my-3 py-3">Masukkan Ke Keranjang</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Cart End -->
@endsection
