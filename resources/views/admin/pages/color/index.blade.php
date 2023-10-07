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
              <button type="button" class="btn btn-sm btn-outline-primary rounded-pill text-capitalize" id="add-new-color"
                data-bs-toggle="modal" data-bs-target="#modalAddColor">Tambah warna</button>
              <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mx-1"
                onclick="reloadTableColor()">Refresh Table</button>
            </div>
            <div class="table-responsive">
              <table id="table-color" class="table table-striped w-100" data-toggle="data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Warna</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>

              {{-- modal add color --}}
              @include('admin.pages.color.modals.add-color')
              {{-- end modal add category --}}

              {{-- modal edit color --}}
              @include('admin.pages.color.modals.edit-color')
              {{-- end modal edit color --}}

              {{-- modal dettail color --}}
              @include('admin.pages.color.modals.detail-color')
              {{-- end modal dettail color --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('scripts/color.js') }}"></script>
@endpush
