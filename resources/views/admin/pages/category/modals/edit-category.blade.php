<!-- Modal -->
<form action="#" method="post" id="form-edit-category">
  @csrf
  @method('PUT')
  <div class="modal fade" id="modalEditCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditCategoryLabel">Edit Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalEditCategory"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id-category-edit" id="id-category-edit">
          <div class="row">
            <label for="category-edit" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="category-edit" name="category-edit"
                placeholder="Nama kategori">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submit-edit-category">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>
