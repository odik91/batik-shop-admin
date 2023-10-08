@extends('admin.pages.layouts.master')
@section('content')
  <div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title text-capitalize">Table warna</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-start mb-2">
              <button type="button" class="btn btn-sm btn-outline-primary rounded-pill text-capitalize" id="add-new-size"
                data-bs-toggle="modal" data-bs-target="#modalAddSize">Tambah warna</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1"
                onclick="reloadTableSize()">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-size" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Ukuran</th>
                    <th>Singkatan</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>

              {{-- modal add size --}}
              @include('admin.pages.size.modals.add-size')
              {{-- end modal add category --}}

              {{-- modal edit size --}}
              @include('admin.pages.size.modals.edit-size')
              {{-- end modal edit size --}}

              {{-- modal dettail size --}}
              @include('admin.pages.size.modals.detail-size')
              {{-- end modal dettail size --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/size.js') }}"></script>
@endpush
