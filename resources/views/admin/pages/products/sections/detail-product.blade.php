@push('css')
  {{-- <style>
    .select2-selection__rendered {
      height: 42.23px
    }

    span .select2-selection--multiple {
      height: 42.23px;
      border: 1px solid var(--jd-dark_text_color_opacity50) !important;
    }
  </style> --}}
@endpush

<div class="card product" id="detail-product">
  <div class="card-header">
    <div class="header-title">
      <h4 class="card-title text-capitalize">detail produk</h4>
    </div>
  </div>
  <div class="card-body">
    <div class="mb-3 row">
      <label for="detail-product-name" class="col-sm-2 col-form-label">Produk</label>
      <div class="col-sm-10">
        <input type="text" class="form-control text-capitalize" id="detail-product-name" name="detail-product-name" readonly>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-category" class="col-sm-2 col-form-label">Kategori</label>
      <div class="col-sm-10">
        <input type="text" class="form-control text-capitalize" id="detail-category" name="detail-category" readonly>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-subcategory" class="col-sm-2 col-form-label">Subkategori</label>
      <div class="col-sm-10">
        <input type="text" class="form-control text-capitalize" id="detail-subcategory" name="detail-subcategory" readonly>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-unit" class="col-sm-2 col-form-label">Satuan </label>
      <div class="col-sm-10">
        <input type="text" class="form-control text-capitalize" id="detail-unit" name="detail-unit" readonly>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-size" class="col-sm-2 col-form-label">Ukuran</label>
      <div class="col-sm-10">
        <div class="d-flex justify-content-start" id="detail-sizes"></div>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-color" class="col-sm-2 col-form-label">Warna</label>
      <div class="col-sm-10">
        <div class="d-flex justify-content-start" id="detail-color"></div>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-images" class="col-sm-2 col-form-label">Gambar
      </label>
      <div class="col-sm-10">
        <div class="d-flex justify-content-start" id="detail-images"></div>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-description" class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10">
        <div id="detail-description"></div>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-discount" class="col-sm-2 col-form-label">Diskon</label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <span class="input-group-text" id="detail-discount-display">%</span>
          <input type="text" name="detail-discount" id="detail-discount" class="form-control number" placeholder="0"
            aria-label="Discount" aria-describedby="detail-discount-display">
        </div>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-price" class="col-sm-2 col-form-label">Harga <span class="text-danger">*</span></label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <span class="input-group-text" id="detail-price-display">Rp</span>
          <input type="text" name="detail-price" id="detail-price" class="form-control number" placeholder="0"
            aria-label="detail-price" aria-describedby="detail-price-display" required>
        </div>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-weight" class="col-sm-2 col-form-label">Perkiraan Berat <span
          class="text-danger">*</span></label>
      <div class="col-sm-10">
        <div class="input-group">
          <span class="input-group-text" id="detail-weight-display">Kg</span>
          <input type="text" name="detail-weight" id="detail-weight" class="form-control number" placeholder="0"
            aria-label="detail-weight" aria-describedby="detail-weight-display" required>
        </div>
        <div id="detail-weight-display-help" class="form-text text-info text-capitalize">
          <i>perkiraan berat digunakan untuk estimasi ongkos kirim</i>
        </div>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="detail-active" class="col-sm-2 col-form-label">Produk Aktif?</label>
      <div class="col-sm-10">
        <select class="form-control" id="detail-active" name="detail-active">
          <option value="Y">Ya</option>
          <option value="T">Tidak</option>
        </select>
      </div>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-outline-primary" onclick="showHideProductLayer(this)" data-targeted="edit-product-layout">
        Edit
      </button>
      <button type="button" id="close-add-product" class="btn btn-outline-secondary" data-targeted="main-layout"
        onclick="showHideProductLayer(this)">
        Batal
      </button>
    </div>
  </div>
</div>
