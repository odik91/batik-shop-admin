@extends('public.layouts.master')
@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">detail produk</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="{{ route('public.shop') }}">Toko</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0 capitalize">detail produk</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->


  <!-- Shop Detail Start -->
  <div class="container-fluid py-5">
    @if (Route::has('login'))
      @auth
        <input type="hidden" name="is-login" id="is-login" value="yes">
      @else
        <input type="hidden" name="is-login" id="is-login" value="no">
      @endauth
    @endif
    <div class="row px-xl-5">
      <div class="col-lg-5 pb-5">
        <div id="product-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner border">
            @foreach ($product->getGalleries as $key => $gallery)
              <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="max-height: 400px !important">
                <img class="w-100 h-100" src="{{ asset('upload/images/' . $gallery['file']) }}"
                  alt="{{ $gallery['file'] }}" style="object-fit: content">
              </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
            <i class="fa fa-2x fa-angle-left text-dark"></i>
          </a>
          <a class="carousel-control-next" href="#product-carousel" data-slide="next">
            <i class="fa fa-2x fa-angle-right text-dark"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-7 pb-5">
        <form action="#" method="POST" id="add-to-cart">
          @csrf
          <input type="hidden" id="attr" name="attr" value="{{ $product['id'] }}">
          <input type="hidden" id="attr1" value="{{ $product['price'] }}">
          <input type="hidden" id="attr2" value="{{ $product->getUnit['unit'] }}">
          <input type="hidden" id="attr3" value="{{ $product['weight_estimation'] }}">

          <h3 class="font-weight-semi-bold text-capitalize">{{ $product['product'] }}</h3>
          <div class="d-flex mb-3">
            {{-- <div class="text-primary mr-2">
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star"></small>
            <small class="fas fa-star-half-alt"></small>
            <small class="far fa-star"></small>
          </div>
          <small class="pt-1">(50 Reviews)</small> --}}
            <small class="pt-1">Belum ada review</small>
          </div>
          <h3 class="font-weight-semi-bold mb-4">Rp{{ number_format($product['price'], 0, ',', '.') }}</h3>
          <p class="mb-4">
            Kategori: <b>{{ $product->getSubcategory->getCategory['category'] }}</b><br>
            Subkategori: <b>{{ $product->getSubcategory['subcategory'] }}</b><br>
            Satuan: <b>{{ $product->getUnit['unit'] }}</b><br>
            Berat: <b>{{ $product['weight_estimation'] }}</b><br>
            Diskon: <b>{{ $product['discount'] ? $product['discount'] . '%' : '-' }}</b><br>
          </p>
          {{-- ukuran --}}
          <div class="d-flex mb-3">
            <p class="text-dark font-weight-medium mb-0 mr-3">Ukuran:</p>
            @if (sizeof($product->getSizes) > 0)
              @foreach ($product->getSizes as $key => $size)
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="size-{{ $key }}" name="size"
                    value="{{ $size['size_id'] }}">
                  <label class="custom-control-label"
                    for="size-{{ $key }}">{{ $size->getDetailSize['size'] }}</label>
                </div>
              @endforeach
            @else
              <span class="text-capitalize text-info">pilihan ukuran tidak tersedia</span>
            @endif
          </div>
          {{-- end ukuran --}}

          {{-- warna --}}
          <div class="d-flex mb-3">
            <p class="text-dark font-weight-medium mb-0 mr-3">Warna:</p>
            @if (sizeof($product->getColors) > 0)
              @foreach ($product->getColors as $key => $color)
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="color-{{ $key }}" name="color"
                    value="{{ $color['color_id'] }}">
                  <label class="custom-control-label"
                    for="color-{{ $key }}">{{ $color->getDetailColor['color'] }}</label>
                </div>
              @endforeach
            @else
              <span class="text-capitalize text-info">pilihan ukuran tidak tersedia</span>
            @endif
          </div>
          {{-- end warna --}}

          <div class="d-flex align-items-center mb-4 pt-2">
            <div class="input-group quantity mr-3" style="width: 130px;">
              <div class="input-group-btn">
                <button type="button"class="btn btn-primary btn-minus check-info">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
              <input type="text" class="form-control bg-secondary text-center" value="1" id="quantity"
                name="quantity" min="1">
              <div class="input-group-btn">
                <button type="button"class="btn btn-primary btn-plus check-info">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <button type="submit" id="button-add-to-cart" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>
              Tambah Ke
              Keranjang</button>
          </div>

          {{-- shop info --}}
          <div class="row text-primary">
            <div class="col-sm-6">Estimasi berat</div>
            <div class="col-sm-6 font-weight-bold text-right"><span
                id="weight">{{ $product['weight_estimation'] }}</span>Kg</div>
          </div>
          <div class="row text-primary">
            <div class="col-sm-6">Total</div>
            <div class="col-sm-6 font-weight-bold text-right">Rp<span
                id="total-price">{{ number_format($product['price'], 0, ',', '.') }}</span>,00</div>
          </div>
          {{-- shop info --}}
        </form>
      </div>
    </div>
    <div class="row px-xl-5">
      <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
          <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Deskripsi</a>
          {{-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Informasi</a> --}}
          <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
        </div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-pane-1">
            <h4 class="mb-3">Deksripsi Produk</h4>
            {!! $product['description'] !!}
          </div>
          {{-- <div class="tab-pane fade" id="tab-pane-2">
            <h4 class="mb-3">Informasi Tambahan</h4>
            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo
              dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et,
              lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod.
              Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus
              diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd
              invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
            <div class="row">
              <div class="col-md-6">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item px-0">
                    Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                  </li>
                  <li class="list-group-item px-0">
                    Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                  </li>
                  <li class="list-group-item px-0">
                    Duo amet accusam eirmod nonumy stet et et stet eirmod.
                  </li>
                  <li class="list-group-item px-0">
                    Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item px-0">
                    Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                  </li>
                  <li class="list-group-item px-0">
                    Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                  </li>
                  <li class="list-group-item px-0">
                    Duo amet accusam eirmod nonumy stet et et stet eirmod.
                  </li>
                  <li class="list-group-item px-0">
                    Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                  </li>
                </ul>
              </div>
            </div>
          </div> --}}
          <div class="tab-pane fade" id="tab-pane-3">
            <div class="row">
              <div class="col-md-6">
                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                <div class="media mb-4">
                  <img src="{{ asset('bootstrap-shop-template/img/user.jpg') }}" alt="Image"
                    class="img-fluid mr-3 mt-1" style="width: 45px;">
                  <div class="media-body">
                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                    <div class="text-primary mb-2">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                      <i class="far fa-star"></i>
                    </div>
                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam
                      tempor rebum magna dolores sed sed eirmod ipsum.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h4 class="mb-4">Leave a review</h4>
                <small>Your email address will not be published. Required fields are marked *</small>
                <div class="d-flex my-3">
                  <p class="mb-0 mr-2">Your Rating * :</p>
                  <div class="text-primary">
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                  </div>
                </div>
                <form>
                  <div class="form-group">
                    <label for="message">Your Review *</label>
                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="name">Your Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Your Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group mb-0">
                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Shop Detail End -->


  <!-- Products Start -->
  <div class="container-fluid py-5">
    <div class="text-center mb-4">
      <h2 class="section-title px-5"><span class="px-2">Barang yang mungkin anda suka</span></h2>
    </div>
    <div class="row px-xl-5">
      <div class="col">
        <div class="owl-carousel related-carousel">
          <div class="card product-item border-0">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="{{ asset('bootstrap-shop-template/img/product-1.jpg') }}"
                alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>Rp123.00</h6>
                <h6 class="text-muted ml-2"><del>Rp123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i
                  class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
          </div>
          <div class="card product-item border-0">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="{{ asset('bootstrap-shop-template/img/product-2.jpg') }}"
                alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>Rp123.00</h6>
                <h6 class="text-muted ml-2"><del>Rp123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i
                  class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
          </div>
          <div class="card product-item border-0">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="{{ asset('bootstrap-shop-template/img/product-3.jpg') }}"
                alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>Rp123.00</h6>
                <h6 class="text-muted ml-2"><del>Rp123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i
                  class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
          </div>
          <div class="card product-item border-0">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="{{ asset('bootstrap-shop-template/img/product-4.jpg') }}"
                alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>Rp123.00</h6>
                <h6 class="text-muted ml-2"><del>Rp123.00</del></h6>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i
                  class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
          </div>
          <div class="card product-item border-0">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="{{ asset('bootstrap-shop-template/img/product-5.jpg') }}"
                alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
              <div class="d-flex justify-content-center">
                <h6>Rp123.00</h6>
                <h6 class="text-muted ml-2"><del>Rp123.00</del></h6>
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
      </div>
    </div>
  </div>
  <!-- Products End -->
@endsection

@push('js')
  <script src="{{ asset('scripts/public/detail-product.js') }}"></script>
@endpush
