<!-- Modal -->
<form action="#" method="post" id="form-add-color">
  @csrf
  <div class="modal fade" id="modalAddColor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddColorLabel">Tambah Warna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
            id="closeModalAddColor"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <label for="color" class="col-sm-4 col-form-label">Warna</label>
            <div class="col-sm-8">
              <input type="text" class="form-control text-capitalize" id="color" name="color"
                placeholder="Warna" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="button-add-color" disabled>Simpan</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>
