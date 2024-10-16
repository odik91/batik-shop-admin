@extends('admin.pages.layouts.master')
@section('content')
  <div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title text-capitalize">Table satuan</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-start mb-2">
              <button type="button" class="btn btn-sm btn-outline-primary rounded-pill text-capitalize" id="add-new-size"
                data-bs-toggle="modal" data-bs-target="#modalAddUnit">tambah satuan</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1"
                onclick="reloadTableUnit()">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-unit" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Ukuran</th>
                    <th>Singkatan</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>

              {{-- modal add unit --}}
              @include('admin.pages.unit.modals.add-unit')
              {{-- end modal add category --}}

              {{-- modal edit unit --}}
              @include('admin.pages.unit.modals.edit-unit')
              {{-- end modal edit unit --}}

              {{-- modal dettail unit --}}
              @include('admin.pages.unit.modals.detail-unit')
              {{-- end modal dettail unit --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/unit.js') }}"></script>
@endpush
