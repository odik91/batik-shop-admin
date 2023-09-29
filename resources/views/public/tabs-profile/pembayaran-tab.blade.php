<div class="tab-pane fade" id="tab-pane-2">
  <h4 class="mb-3 capitalize">list barang menunggu pembayaran</h4>
  <div class="card w-100">
    <div class="card-body">
      <div class="mb-1">
        <b>Belanja </b>
        <span class="text-info">01-01-2023 </span>
        <span class="badge badge-pill badge-danger">menunggu pembayaran</span>
        <span class="text-success">no-iv/01/01/2023/bt-001</span>
      </div>
      <div class="media mt-2">
        <img src="{{ asset('bootstrap-shop-template/img/product-2.jpg') }}" class="mr-3" alt="..."
          style="max-width: 6rem">
        <div class="media-body">
          <h6 class="mt-0">Item 2</h6>
          <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's
            beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is
            jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
        </div>
      </div>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail-pembayaran">
        Lakukan Pembayaran
      </button>
      <!-- Modal -->
      <div class="modal fade p-0" id="detail-pembayaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Informasi Tagihan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card">
                <h6 class="card-header">Detail Produk</h6>
                <div class="card-body">
                  <div class="media mt-2">
                    <img src="{{ asset('bootstrap-shop-template/img/product-3.jpg') }}" class="mr-3" alt="..."
                      style="max-width: 6rem">
                    <div class="media-body">
                      <h6 class="mt-0">Pesanan</h6>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque est explicabo aliquam assumenda
                        quo eius omnis aperiam impedit quibusdam! Alias? <br>
                        <small class="text-info">Ukuran: 1x</small> |
                        <small class="text-info"> Warna: 1x</small> |
                        <small class="text-info"> Kuantitas: 1x</small>
                      <form action="#" method="post" enctype="multipart/form-data">
                        <label for="bukti">Upload bukti pembayaran</label>
                        <div class="input-group mb-3">
                          <div class="custom-file">
                            <input type="file" name="bukti" id="bukti" accept="image/*,.pdf"
                              class="form-control">
                          </div>
                          <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="submit-bukti">Upload</button>
                          </div>
                        </div>
                      </form>
                      </p>
                    </div>
                  </div>
                  <hr>

                  <h6 class="card-title">Rincian Pembayaran</h6>
                  <div class="row">
                    <div class="col-6">Metode pembayaran</div>
                    <div class="col-6 text-right text-dark">Transfer antar bank</div>
                    <div class="col-6">Total harga (1 barang)</div>
                    <div class="col-6 text-right text-dark">Rp1.234,00</div>
                    <div class="col-6">Total ongkos kirim (1kg)</div>
                    <div class="col-6 text-right text-dark">Rp1.234,00</div>
                    <div class="col-6">Kode unik transfer</div>
                    <div class="col-6 text-right text-dark">Rp1.234,00</div>
                    <div class="col-6"><b>Total Belanja</b></div>
                    <div class="col-6 text-right text-dark"><b>Rp1.234,00</b></div>
                  </div>

                  <hr>
                  <h6 class="card-title">Informasi Pengiriman</h6>
                  <div class="row">
                    <div class="col-6">Kurir</div>
                    <div class="col-6 text-right text-dark">Nama kurir</div>
                    <div class="col-6">No resi</div>
                    <div class="col-6 text-right text-dark">12344</div>
                    <div class="col-6">Alamat</div>
                    <div class="col-6 text-right text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi voluptatum porro saepe? At quaerat repellat excepturi cumque earum. Dolorum, nesciunt?</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
