<!-- Modal -->
<div class="modal fade" id="modalDetailCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailCategoryLabel">Detail Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalDetailCategory"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <label for="detail-category" class="col-sm-4 col-form-label">Kategori</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="detail-category" readonly>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#modalEditCategory" data-bs-toggle="modal" data-bs-dismiss="modal" id="button-edit-category">Edit</button>
        <button class="btn btn-danger" id="button-delete-category">Hapus</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
