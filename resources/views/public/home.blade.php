@extends('public.layouts.master')
@section('content')
  <!-- Featured Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
          <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">Produk Berkualitas</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
          <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
          <h5 class="font-weight-semi-bold m-0">Pengiriman Cepat</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
          <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">14-Hari Pengembalian</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
          <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">Layanan Pelanggan</h5>
        </div>
      </div>
    </div>
  </div>
  <!-- Featured End -->

  <!-- Categories Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
          <p class="text-right">15 Products</p>
          <a href="" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="{{ asset('bootstrap-shop-template/img/cat-1.jpg') }}" alt="">
          </a>
          <h5 class="font-weight-semi-bold m-0">Men's dresses</h5>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
          <p class="text-right">15 Products</p>
          <a href="" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="{{ asset('bootstrap-shop-template/img/cat-2.jpg') }}" alt="">
          </a>
          <h5 class="font-weight-semi-bold m-0">Women's dresses</h5>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
          <p class="text-right">15 Products</p>
          <a href="" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="{{ asset('bootstrap-shop-template/img/cat-3.jpg') }}" alt="">
          </a>
          <h5 class="font-weight-semi-bold m-0">Baby's dresses</h5>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
          <p class="text-right">15 Products</p>
          <a href="" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="{{ asset('bootstrap-shop-template/img/cat-4.jpg') }}" alt="">
          </a>
          <h5 class="font-weight-semi-bold m-0">Accerssories</h5>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
          <p class="text-right">15 Products</p>
          <a href="" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="{{ asset('bootstrap-shop-template/img/cat-5.jpg') }}" alt="">
          </a>
          <h5 class="font-weight-semi-bold m-0">Bags</h5>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
          <p class="text-right">15 Products</p>
          <a href="" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="{{ asset('bootstrap-shop-template/img/cat-6.jpg') }}" alt="">
          </a>
          <h5 class="font-weight-semi-bold m-0">Shoes</h5>
        </div>
      </div>
    </div>
  </div>
  <!-- Categories End -->

  <!-- Products Start -->
  <div class="container-fluid pt-5">
    <div class="text-center mb-4">
      <h2 class="section-title px-5"><span class="px-2 text-capitalize">produk terbaru</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
      @foreach ($new_products as $product)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
          <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="{{ asset('upload/images/' . $product->getGalleries[0]['file']) }}"
                alt="{{ $product['slug'] }}" />
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3 text-capitalize">{{ $product['product'] }}</h6>
              <div class="d-flex justify-content-center">
                <h6>Rp{{ number_format($product['price'], 0, ',', '.') }}</h6>
                {{-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> --}}
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i
                  class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
          </div>
        </div>
      @endforeach

      {{-- <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4">
          <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="{{ asset('bootstrap-shop-template/img/product-8.jpg') }}"
              alt="">
          </div>
          <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
            <div class="d-flex justify-content-center">
              <h6>$123.00</h6>
              <h6 class="text-muted ml-2"><del>$123.00</del></h6>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
              Detail</a>
            <a href="" class="btn btn-sm text-dark p-0"><i
                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
  <!-- Products End -->


  <!-- Vendor Start -->
  <div class="container-fluid py-5">
    <div class="row px-xl-5">
      <div class="col">
        <div class="owl-carousel vendor-carousel">
          <div class="vendor-item border p-4">
            <img src="{{ asset('bootstrap-shop-template/img/vendor-1.jpg') }}" alt="">
          </div>
          <div class="vendor-item border p-4">
            <img src="{{ asset('bootstrap-shop-template/img/vendor-2.jpg') }}" alt="">
          </div>
          <div class="vendor-item border p-4">
            <img src="{{ asset('bootstrap-shop-template/img/vendor-3.jpg') }}" alt="">
          </div>
          <div class="vendor-item border p-4">
            <img src="{{ asset('bootstrap-shop-template/img/vendor-4.jpg') }}" alt="">
          </div>
          <div class="vendor-item border p-4">
            <img src="{{ asset('bootstrap-shop-template/img/vendor-5.jpg') }}" alt="">
          </div>
          <div class="vendor-item border p-4">
            <img src="{{ asset('bootstrap-shop-template/img/vendor-6.jpg') }}" alt="">
          </div>
          <div class="vendor-item border p-4">
            <img src="{{ asset('bootstrap-shop-template/img/vendor-7.jpg') }}" alt="">
          </div>
          <div class="vendor-item border p-4">
            <img src="{{ asset('bootstrap-shop-template/img/vendor-8.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Vendor End -->
@endsection
