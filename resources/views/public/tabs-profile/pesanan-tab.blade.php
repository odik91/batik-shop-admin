<div class="tab-pane fade show active" id="tab-pane-1">
  <h4 class="mb-3">List Pesanan</h4>
  <div class="card w-100">
    <div class="card-body">
      <div class="mb-1">
        <b>Belanja </b>
        <span class="text-info">01-01-2023 </span>
        <span class="badge badge-pill badge-success">selesai</span>
        <span class="badge badge-pill badge-secondary">penigiriman</span>
        <span class="badge badge-pill badge-primary">diproses</span>
        <span class="badge badge-pill badge-warning">menunggu konfirmasi</span>
        <span class="badge badge-pill badge-danger">menunggu pembayaran</span>
        <span class="text-success">no-iv/01/01/2023/bt-001</span>
      </div>
      <div class="media mt-2">
        <img src="{{ asset('bootstrap-shop-template/img/product-1.jpg') }}" class="mr-3" alt="..."
          style="max-width: 6rem">
        <div class="media-body">
          <h6 class="mt-0">Media heading</h6>
          <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's
            beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is
            jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
        </div>
      </div>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetailPesanan">
        Detail Pesanan
      </button>
      <!-- Modal -->
      <div class="modal fade" id="modalDetailPesanan" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Detail Pesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                  <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                      <tr>
                        <th>Produk </th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-1.jpg') }}" alt=""
                            style="width: 50px;">
                          Colorful Stylish Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text" class="form-control form-control-sm bg-secondary text-center"
                              value="1" readonly>
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-2.jpg') }}" alt=""
                            style="width: 50px;"> Colorful Stylish
                          Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text" class="form-control form-control-sm bg-secondary text-center"
                              value="1" readonly>
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-3.jpg') }}" alt=""
                            style="width: 50px;"> Colorful Stylish
                          Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text"
                              class="form-control form-control-sm bg-secondary text-center" value="1"
                              readonly>
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-4.jpg') }}" alt=""
                            style="width: 50px;"> Colorful Stylish Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text"
                              class="form-control form-control-sm bg-secondary text-center" value="1"
                              readonly>
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-5.jpg') }}" alt=""
                            style="width: 50px;"> Colorful Stylish Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text"
                              class="form-control form-control-sm bg-secondary text-center" value="1">
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-lg-4">
                  <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                      <h4 class="font-weight-semi-bold m-0">Informasi Belanja</h4>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">Rp150</h6>
                      </div>
                      <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">Rp10</h6>
                      </div>
                      <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Kode Unik</h6>
                        <h6 class="font-weight-medium">Rp10</h6>
                      </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                      <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">Rp160</h5>
                      </div>
                    </div>
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
  <div class="card w-100">
    <div class="card-body">
      <div class="mb-1">
        <b>Belanja </b>
        <span class="text-info">01-01-2023 </span>
        <span class="badge badge-pill badge-success">selesai</span>
        <span class="badge badge-pill badge-secondary">penigiriman</span>
        <span class="badge badge-pill badge-primary">diproses</span>
        <span class="badge badge-pill badge-warning">menunggu konfirmasi</span>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetailPesanan2">
        Detail Pesanan
      </button>
      <!-- Modal -->
      <div class="modal fade" id="modalDetailPesanan2" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Detail Pesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                  <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                      <tr>
                        <th>Produk </th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-1.jpg') }}" alt=""
                            style="width: 50px;">
                          Colorful Stylish Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text" class="form-control form-control-sm bg-secondary text-center"
                              value="1" readonly>
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-2.jpg') }}" alt=""
                            style="width: 50px;"> Colorful Stylish
                          Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text" class="form-control form-control-sm bg-secondary text-center"
                              value="1" readonly>
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-3.jpg') }}" alt=""
                            style="width: 50px;"> Colorful Stylish
                          Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text"
                              class="form-control form-control-sm bg-secondary text-center" value="1"
                              readonly>
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-4.jpg') }}" alt=""
                            style="width: 50px;"> Colorful Stylish Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text"
                              class="form-control form-control-sm bg-secondary text-center" value="1"
                              readonly>
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                      <tr>
                        <td class="align-middle">
                          <img src="{{ asset('bootstrap-shop-template/img/product-5.jpg') }}" alt=""
                            style="width: 50px;"> Colorful Stylish Shirt
                        </td>
                        <td class="align-middle">Rp150</td>
                        <td class="align-middle">
                          <div class="input-group quantity mx-auto" style="width: 100px;">
                            <input type="text"
                              class="form-control form-control-sm bg-secondary text-center" value="1">
                          </div>
                        </td>
                        <td class="align-middle">Rp150</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-lg-4">
                  <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                      <h4 class="font-weight-semi-bold m-0">Informasi Belanja</h4>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">Rp150</h6>
                      </div>
                      <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">Rp10</h6>
                      </div>
                      <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Kode Unik</h6>
                        <h6 class="font-weight-medium">Rp10</h6>
                      </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                      <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">Rp160</h5>
                      </div>
                    </div>
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