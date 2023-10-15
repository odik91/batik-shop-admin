@extends('public.layouts.master')
@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">Toko Kami</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="{{ route('public.home') }}">Beranda</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">Toko</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Shop Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5">
      <!-- Shop Sidebar Start -->
      <div class="col-lg-3 col-md-12">
        <!-- Color Start -->
        <div class="border-bottom mb-4 pb-4">
          <h5 class="font-weight-semi-bold mb-4 capitalize">filter berdasarkan warna</h5>
          <form method="GET" action="#" id="filter-warna">
            @csrf
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="custom-control-input" checked id="color-all" name="color-all" />
              <label class="custom-control-label capitalize" for="color-all">semua warna</label>
              {{-- <span class="badge border font-weight-normal">1000</span> --}}
            </div>

            @foreach (App\Models\Color::orderBy('color', 'asc')->get() as $color)
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-{{ $color['id'] }}" name="color[]" />
                <label class="custom-control-label" for="color-{{ $color['id'] }}">{{ $color['color'] }}</label>
                {{-- <span class="badge border font-weight-normal">150</span> --}}
              </div>
            @endforeach
          </form>
        </div>
        <!-- Color End -->

        <!-- Size Start -->
        <div class="mb-5">
          <h5 class="font-weight-semi-bold mb-4 capitalize">filter berdasarkan ukuran</h5>
          <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="checkbox" class="custom-control-input" checked id="size-all" />
              <label class="custom-control-label capitalize" for="size-all">semua ukuran</label>
              {{-- <span class="badge border font-weight-normal">1000</span> --}}
            </div>
            @foreach (App\Models\Size::get() as $size)
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-{{ $size['id'] }}" name="size[]" />
                <label class="custom-control-label" for="size-{{ $size['id'] }}">{{ $size['size'] }}</label>
                {{-- <span class="badge border font-weight-normal">150</span> --}}
              </div>
            @endforeach
          </form>
        </div>
        <!-- Size End -->

        <!-- button filter -->
        <div class="col-12 text-center">
          <button class="btn btn-sm btn-outline-primary" id="applay-filter">Terapkan</button>
        </div>
        <!-- button filter -->
      </div>
      <!-- Shop Sidebar End -->

      <!-- Shop Product Start -->
      <div class="col-lg-9 col-md-12">
        <div class="row pb-3">
          {{-- shorting --}}
          <div class="col-12 pb-1">
            <div class="d-flex align-items-center justify-content-between mb-4">
              <form action="">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Cari berdasar nama" />
                  <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                </div>
              </form>
              <div class="dropdown ml-4">
                <button class="btn border dropdown-toggle " type="button" id="triggerId" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Sort by
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                  <a class="dropdown-item capitalize" href="#">terbaru</a>
                  <a class="dropdown-item capitalize" href="#">popularitas</a>
                  <a class="dropdown-item capitalize" href="#">rating</a>
                </div>
              </div>
            </div>
          </div>
          {{-- end shorting --}}

          {{-- list product --}}
          @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
              <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  <img class="img-fluid w-100" src="{{ asset('upload/images/' . $product->getGalleries[0]['file']) }}"
                    alt="" />
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
                      class="fas fa-shopping-cart text-primary mr-1"></i>Add
                    To Cart</a>
                </div>
              </div>
            </div>
          @endforeach
          {{-- <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
              <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                <img class="img-fluid w-100" src="{{ asset('bootstrap-shop-template/img/product-1.jpg') }}"
                  alt="" />
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
                    class="fas fa-shopping-cart text-primary mr-1"></i>Add
                  To Cart</a>
              </div>
            </div>
          </div> --}}
          {{-- end list product --}}
        </div>
      </div>
      <!-- Shop Product End -->
    </div>
  </div>
  <!-- Shop End -->
@endsection
