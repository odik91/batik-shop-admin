<div class="modal fade" id="modalDetailSubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize" id="modalDetailSubcategoryLabel">detail subkategori</h5>
        <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"
          id="closeModalDetailSubcategory"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <label for="category-detail" class="col-sm-4 col-form-label">Kategori</label>
          <div class="col-sm-8">
            <input type="text" class="form-control text-capitalize" id="category-detail" name="category-detail"
              readonly>
          </div>
        </div>
        <div class="row">
          <label for="subcategory-detail" class="col-sm-4 col-form-label">Subkategori</label>
          <div class="col-sm-8">
            <input type="text" class="form-control text-capitalize" id="subcategory-detail" name="subcategory-detail"
              placeholder="Subkategori" readonly>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="button-modal-edit-subcategory" data-bs-toggle="modal" data-bs-target="#modalEditSubcategory">Edit</button>
        <button type="button" class="btn btn-danger" id="button-delete-subcategory">Hapus</button>
        <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
