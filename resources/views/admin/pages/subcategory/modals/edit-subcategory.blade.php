<!-- Modal -->
<form action="#" method="post" id="form-edit-subcategory">
  @csrf
  @method('PUT')
  <div class="modal fade" id="modalEditSubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditSubcategoryLabel">Tambah Subkategori</h5>
          <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"
            id="closeModalEditSubcategory"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <label for="category-edit" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
              <select class="form-select" id="category-edit" name="category-edit" required>
                <option value="" selected disabled>Pilih kategori</option>
              </select>
            </div>
          </div>
          <div class="row">
            <label for="subcategory-edit" class="col-sm-4 col-form-label">Subkategori</label>
            <div class="col-sm-8">
              <input type="text" class="form-control text-capitalize" id="subcategory-edit" name="subcategory-edit"
                placeholder="Subkategori" autocomplete="off" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="button-edit-subcategory" disabled>Simpan</button>
          <button type="button" class="btn btn-danger close-modal" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>
