@extends('admin.pages.layouts.master')
@section('content')
  <div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title">Bootstrap Datatables</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-start mb-2">
              <button type="button" class="btn btn-sm btn-outline-primary rounded-pill" id="add-new-category" data-bs-toggle="modal" data-bs-target="#modalAddCategory">Tambah Kategori</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1" onclick="reloadTableCategory()">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-category" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>

              {{-- modal add category --}}
              @include('admin.pages.category.modals.add-category')
              {{-- end modal add category --}}

              {{-- modal edit category --}}
              @include('admin.pages.category.modals.edit-category')
              {{-- end modal edit category --}}

              {{-- modal edit category --}}
              @include('admin.pages.category.modals.detail-category')
              {{-- end modal edit category --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/category.js') }}"></script>
@endpush
