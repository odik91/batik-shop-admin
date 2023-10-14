@push('css')
  <style>
    .select2-selection__rendered {
      height: 42.23px
    }

    span .select2-selection--multiple {
      height: 42.23px;
      border: 1px solid var(--jd-dark_text_color_opacity50) !important;
    }
  </style>
@endpush

<div class="card product d-none" id="add-product">
  <div class="card-header">
    <div class="header-title">
      <h4 class="card-title text-capitalize">tambah produk</h4>
      <small class="text-info"><span class="text-danger">(*)</span> Wajib diisi</small>
    </div>
  </div>
  <div class="card-body" id="main-layout">
    <form action="#" method="POST" class="form-group mt-2 require-form-validation" id="form-add-product" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 row">
        <label for="product-name" class="col-sm-2 col-form-label">Produk <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input type="text" class="form-control text-capitalize" id="product-name" name="product-name" placeholder="Nama Produk"
            required autocomplete="off">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Kategori <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <select class="js-example-responsive" id="category" name="category" required>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="subcategory" class="col-sm-2 col-form-label">Subkategori <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <select class="form-select" id="subcategory" name="subcategory" required>
            <option value="" selected disabled>Pilih subkategori</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="unit" class="col-sm-2 col-form-label">Satuan <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <select class="form-select" id="unit" name="unit" required>
            <option value="" selected disabled>Pilih satuan</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="size" class="col-sm-2 col-form-label">Ukuran</label>
        <div class="col-sm-10">
          <select class="form-select" id="size" name="size[]" multiple="multiple">
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="color" class="col-sm-2 col-form-label">Warna</label>
        <div class="col-sm-10">
          <select class="form-control" id="color" name="color[]" multiple="multiple">
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="images" class="col-sm-2 col-form-label">Gambar <span class="text-danger">*</span>
          <span class="text-info">
            <small> <i>(Pilih banayk gambar)</i></small>
          </span>
        </label>
        <div class="col-sm-10">
          <input type="file" name="images[]" id="images" multiple class="form-control" accept="image/*" required>
        </div>
      </div>
      <div class="mb-3 row">
        <div class="form-group">
          <div id="image_preview" style="width:100%;">
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Deskripsi <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <textarea name="description" id="description" cols="30" rows="4" class="form-control"
            placeholder="description" required></textarea>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="discount" class="col-sm-2 col-form-label">Diskon</label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
            <span class="input-group-text" id="discount-display">%</span>
            <input type="text" name="discount" id="discount" class="form-control number" placeholder="0"
              aria-label="Discount" aria-describedby="discount-display">
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
            <span class="input-group-text" id="price-display">Rp</span>
            <input type="text" name="price" id="price" class="form-control number" placeholder="0"
              aria-label="price" aria-describedby="price-display" required>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="weight" class="col-sm-2 col-form-label">Perkiraan Berat <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <div class="input-group">
            <span class="input-group-text" id="weight-display">Kg</span>
            <input type="text" name="weight" id="weight" class="form-control number" placeholder="0"
              aria-label="weight" aria-describedby="weight-display" required>
          </div>
          <div id="weight-display-help" class="form-text">Digunakan untuk estimasi ongkos kirim</div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-outline-primary" id="submit-add-product" disabled>
          Simpan
        </button>
        <button type="button" id="close-add-product" class="btn btn-outline-secondary" data-targeted="main-layout"
          onclick="showHideProductLayer(this)">
          Batal
        </button>
      </div>
    </form>
  </div>
</div>
