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
        @include('admin.pages.products.sections.add-product')
        {{-- end add product layout --}}
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/product.js') }}"></script>
@endpush
