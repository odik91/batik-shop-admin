@extends('admin.pages.layouts.master')
@section('content')
  <div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
      <div class="col-sm-12">

        {{-- main layout --}}
        <div class="card" id="main-layout">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title text-capitalize">Table provinsi</h4>
            </div>
          </div>

          <div class="card-body">
            <div class="d-flex justify-content-start mb-2">
              <button type="button" class="btn btn-sm btn-outline-primary rounded-pill text-capitalize"
                id="add-new-product">tambah produk</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1"
                onclick="reloadTableProduct()">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-Product" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Thumb</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Subkategori</th>
                    <th>Deskripsi</th>
                    <th>Diskon</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        {{-- end main layout --}}

        {{-- add product layout --}}
        <div class="card">
          <div class="card-header">
            <div class="header-title">
              <h4 class="card-title text-capitalize">tambah produk</h4>
            </div>
          </div>
          <div class="card-body" id="main-layout">
            <form action="#" method="POST" class="form-group mt-2" id="form-add-product"
              enctype="multipart/form-data">
              @csrf
              <div class="mb-3 row">
                <label for="product-name" class="col-sm-2 col-form-label">Produk</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product-name" name="product-name"
                    placeholder="Nama Produk" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <select class="form-select" id="category" name="category" required>
                    <option value="" selected disabled>Pilih kategori</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="subcategory" class="col-sm-2 col-form-label">Subkategori</label>
                <div class="col-sm-10">
                  <select class="form-select" id="subcategory" name="subcategory" required>
                    <option value="" selected disabled>Pilih subkategori</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="unit" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-10">
                  <select class="form-select" id="unit" name="unit" required>
                    <option value="" selected disabled>Pilih satuan</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="size" class="col-sm-2 col-form-label">Ukuran</label>
                <div class="col-sm-10">
                  <select class="form-select" id="size" name="size[]">
                    <option value="" selected disabled>Pilih ukuran</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="color" class="col-sm-2 col-form-label">Warna</label>
                <div class="col-sm-10">
                  <select class="form-control" id="color" name="color[]" required>
                    <option value="" selected disabled>Pilih warna</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="images" class="col-sm-2 col-form-label">Gambar
                  <span class="text-info">
                    <small> <i>(Pilih banayk gambar)</i></small>
                  </span>
                </label>
                <div class="col-sm-10">
                  <input type="file" name="images[]" id="images" multiple class="form-control" required>
                </div>
              </div>
              <div class="mb-3 row">
                <div class="form-group">
                  <div id="image_preview" style="width:100%;">
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                  <textarea name="description" id="description" cols="30" rows="4" class="form-control"
                    placeholder="description"></textarea>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="discount" class="col-sm-2 col-form-label">Diskon</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="discount-display">%</span>
                    <input type="text" name="discount" id="discount" class="form-control" placeholder="0"
                      aria-label="Discount" aria-describedby="discount-display">
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="price-display">%</span>
                    <input type="text" name="price" id="price" class="form-control" placeholder="0"
                      aria-label="price" aria-describedby="price-display">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-outline-primary" id="submit-add-product">
                  Simpan
                </button>
                <button type="button" id="close-add-product" class="btn btn-outline-secondary">
                  Batal
                </button>
              </div>
            </form>
          </div>
        </div>
        {{-- end add product layout --}}
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/product.js') }}"></script>
@endpush
