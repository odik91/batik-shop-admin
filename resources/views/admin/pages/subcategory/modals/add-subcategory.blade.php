<!-- Modal -->
<form action="#" method="post" id="form-add-subcategory">
  @csrf
<div class="modal fade" id="modalAddSubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddSubcategoryLabel">Tambah Subkategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalAddSubcategory"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id-category" id="id-category">
          <div class="row">
            <label for="category" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
              <select class="form-select" id="category"  name="category" required>
                <option value="" selected disabled>Pilih kategori</option>
              </select>
            </div>
          </div>
          <div class="row">
            <label for="subcategory" class="col-sm-4 col-form-label">Subkategori</label>
            <div class="col-sm-8">
              <input type="text" class="form-control text-capitalize" id="subcategory"  name="subcategory" placeholder="Subkategori" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="button-add-subcategory" disabled>Simpan</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>
