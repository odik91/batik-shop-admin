@extends('admin.pages.layouts.master')

@section('content')
  <div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
      <div class="col-sm-12">

        {{-- main layout --}}
        <div class="card product" id="main-layout">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title text-capitalize">Table provinsi</h4>
            </div>
          </div>

          <div class="card-body">
            <div class="d-flex justify-content-start mb-2">
              <button type="button" class="btn btn-sm btn-outline-primary rounded-pill text-capitalize"
                id="add-new-product" data-targeted="add-product" onclick="showHideProductLayer(this)">tambah
                produk</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1"
                onclick="reloadTableProduct()">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-Product" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Thumb</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Subkategori</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Harga (Rp)</th>
                    <th class="text-center">Diskon</th>
                    <th class="text-center">Berat</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        {{-- end main layout --}}

        {{-- add product layout --}}
        @include('admin.pages.products.sections.add-product')
        {{-- end add product layout --}}

        {{-- detail product layout --}}
        @include('admin.pages.products.sections.detail-product')
        {{-- detail product layout --}}
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/product.js') }}"></script>
@endpush
