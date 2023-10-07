@extends('admin.pages.layouts.master')
@section('content')
  <div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title">Table Subkategori</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-start mb-2">
              <button type="button" class="btn btn-sm btn-outline-primary rounded-pill" id="add-new-subcategory"
                data-bs-toggle="modal" data-bs-target="#modalAddSubcategory">Tambah Subkategori</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1"
                onclick="">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-subcategory" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Subkategori</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>

              {{-- modal add category --}}
              @include('admin.pages.subcategory.modals.add-subcategory')
              {{-- end modal add category --}}

              {{-- modal edit category --}}
              {{-- @include('admin.pages.category.modals.edit-category') --}}
              {{-- end modal edit category --}}

              {{-- modal edit category --}}
              {{-- @include('admin.pages.category.modals.detail-category') --}}
              {{-- end modal edit category --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/subcategory.js') }}"></script>
@endpush
