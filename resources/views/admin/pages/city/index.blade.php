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
                data-bs-toggle="modal" data-bs-target="#modalAddCity">tambah provinsi</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1"
                onclick="reloadTableCity()">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-city" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Provinsi</th>
                    <th>Kabupaten Kota</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>

              {{-- modal add city --}}
              @include('admin.pages.city.modals.add-city')
              {{-- end modal add category --}}

              {{-- modal edit city --}}
              @include('admin.pages.city.modals.edit-city')
              {{-- end modal edit city --}}

              {{-- modal dettail city --}}
              @include('admin.pages.city.modals.detail-city')
              {{-- end modal dettail city --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/city.js') }}"></script>
@endpush
