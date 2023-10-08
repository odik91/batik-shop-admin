@extends('admin.pages.layouts.master')
@section('content')
  <div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title text-capitalize">Table provinsi</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-start mb-2">
              <button type="button" class="btn btn-sm btn-outline-primary rounded-pill text-capitalize" id="add-new-size"
                data-bs-toggle="modal" data-bs-target="#modalAddProvince">tambah provinsi</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1"
                onclick="reloadTableProvince()">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-provinsi" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Provinsi</th>
                    <th>Kode BSSN</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>

              {{-- modal add province --}}
              @include('admin.pages.province.modals.add-province')
              {{-- end modal add category --}}

              {{-- modal edit province --}}
              @include('admin.pages.province.modals.edit-province')
              {{-- end modal edit province --}}

              {{-- modal dettail province --}}
              @include('admin.pages.province.modals.detail-province')
              {{-- end modal dettail province --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/province.js') }}"></script>
@endpush
