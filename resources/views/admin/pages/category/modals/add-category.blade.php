<!-- Modal -->
<form action="#" method="post" id="form-add-category">
  @csrf
<div class="modal fade" id="modalAddCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddCategoryLabel">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalAddCategory"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id-category" id="id-category">
          <div class="row">
            <label for="category-add" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="category-add"  name="category-add" placeholder="Nama kategori">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="button-add-category" disabled>Simpan</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>
