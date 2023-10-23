const logoutElement = document.getElementById("logout-form");
const pilihKurir = document.getElementById("kurir");
pilihKurir.value = "";
const defaultShippingCost = 10000;
const tableBody = document.getElementById("detail-cart");

$(() => {
  pilihKurir.disabled = true;
  try {
    tableBody.innerHTML = `
        <tr>
          <td colspan="7" class="text-center">
            Keranjang kosong. <a href="/shop">Mulai berbelanja</a>
          </td>
        </tr>`;

    if (logoutElement === null) {
      let localData = localStorage.getItem("cart-item");

      if (localData !== null) {
        const url = `checkout-detail-product-in-cart`;
        const csrf_token = $('meta[name="_token"]').attr("content");

        $.ajax({
          url,
          type: "POST",
          data: {
            _token: csrf_token,
            localData,
          },
          success: (data) => {
            if (data.length == 0) {
              tableBody.innerHTML = `
                <tr>
                  <td colspan="7" class="text-center">
                    Keranjang kosong. <a href="/shop">Mulai berbelanja</a>
                  </td>
                </tr>`;

              return;
            }

            let display = "";
            let subtotal = 0;
            data.forEach((item) => {
              const {
                id,
                product,
                size_id,
                size,
                color_id,
                color,
                price,
                weight_estimation,
                image,
                quantity,
                total,
              } = item;
              subtotal += Number(total);
              display += `
              <tr>
                <td class="align-middle text-capitalize">
                  <div class="card">
                    <img class="card-img-top" src="/upload/images/${image}" alt="${image}">
                    <div class="card-body p-0 m-0">
                      <p class="card-text p-1">${product}</p>
                    </div>
                  </div>                
                </td>
                <td class="align-middle">${color || "-"}</td>
                <td class="align-middle">${size || "-"}</td>
                <td class="align-middle">${commify(Number(price))}</td>
                <td class="align-middle">
                  <div class="input-group quantity mx-auto" style="width: 100px;">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-sm btn-primary btn-minus" onclick="decrease(this, '${id}', ${
                size_id ? "'" + size_id + "'" : null
              }, ${color_id ? "'" + color_id + "'" : null})">
                        <i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <input type="text" class="form-control form-control-sm bg-secondary text-center" name="total-peritem[]" value="${commify(
                      Number(quantity)
                    )}" readonly>
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-sm btn-primary btn-plus" onclick="increase(this, '${id}', ${
                size_id ? "'" + size_id + "'" : null
              }, ${color_id ? "'" + color_id + "'" : null})">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </td>
                <td class="align-middle">${commify(
                  Number(quantity) * Number(price)
                )}</td>
                <td class="align-middle"><button type="button" onclick="removeItem(this)" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
              </tr>
              `;
            });
            document.getElementById("subtotal").innerHTML = commify(subtotal);
            tableBody.innerHTML = display;
            localStorage.setItem("detail-cart-item", JSON.stringify(data));
            grandTotal();
          },
          error: (data) => {
            console.log(data);
          },
        });
      } else {
        tableBody.innerHTML = `
        <tr>
          <td colspan="7" class="text-center">
            Keranjang kosong. <a href="/shop">Mulai berbelanja</a>
          </td>
        </tr>`;
      }
    } else {
      showLoadingAnimation();
      const url = `ajax-get-user-cart`;
      const csrf_token = $('meta[name="_token"]').attr("content");
      $.ajax({
        url,
        type: "POST",
        data: { _token: csrf_token },
        success: (data) => {
          hideLoadingAnimation();

          if (data.length == 0) {
            tableBody.innerHTML = `
              <tr>
                <td colspan="7" class="text-center">
                  Keranjang kosong. <a href="/shop">Mulai berbelanja</a>
                </td>
              </tr>`;

            return;
          }

          let display = "";
          let subtotal = 0;
          let item_to_store = [];
          data.forEach((item) => {
            const {
              cart_id,
              id,
              size_id,
              color_id,
              quantity,
              product,
              price,
              weight_estimation,
              color,
              size,
              total,
              image,
            } = item;

            item_to_store = [
              ...item_to_store,
              {
                id,
                product,
                size_id,
                size,
                color_id,
                color,
                price,
                weight_estimation,
                image,
                quantity,
                total,
              },
            ];
            subtotal += Number(total);
            display += `
              <tr>
                <td class="align-middle text-capitalize">
                  <div class="card">
                    <img class="card-img-top" src="/upload/images/${image}" alt="${image}">
                    <div class="card-body p-0 m-0">
                      <p class="card-text p-1">${product}</p>
                    </div>
                  </div>                
                </td>
                <td class="align-middle">${color || "-"}</td>
                <td class="align-middle">${size || "-"}</td>
                <td class="align-middle">${commify(Number(price))}</td>
                <td class="align-middle">
                  <div class="input-group quantity mx-auto" style="width: 100px;">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-sm btn-primary btn-minus" onclick="decrease(this, '${id}', ${
              size_id ? "'" + size_id + "'" : null
            }, ${color_id ? "'" + color_id + "'" : null})">
                        <i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <input type="text" class="form-control form-control-sm bg-secondary text-center" name="total-peritem[]" value="${commify(
                      Number(quantity)
                    )}" readonly>
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-sm btn-primary btn-plus" onclick="increase(this, '${id}', ${
              size_id ? "'" + size_id + "'" : null
            }, ${color_id ? "'" + color_id + "'" : null})">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </td>
                <td class="align-middle">${commify(
                  Number(quantity) * Number(price)
                )}</td>
                <td class="align-middle">
                  <button type="button" class="btn btn-sm btn-primary remove-item" data-cart="${cart_id}" onclick="removeItem(this)">
                    <i class="fa fa-times"></i>
                  </button>
                </td>
              </tr>
              `;
          });
          document.getElementById("subtotal").innerHTML = commify(subtotal);
          tableBody.innerHTML = display;
          localStorage.setItem(
            "detail-cart-item",
            JSON.stringify(item_to_store)
          );
          localStorage.removeItem("cart-item");
          grandTotal();
        },
        error: (data) => {
          hideLoadingAnimation();
          Swal.fire({
            title: "Perhatian!",
            html: data.responseJSON.message,
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Mengerti",
            allowOutsideClick: false,
          });
        },
      });
    }
  } catch (error) {
    console.log("user active");
  }

  // block fetch api from raja ongkir
  try {
    const url = `ajax-fetch-province`;
    const provinsiElement = document.getElementById("provinsi");
    showLoadingAnimation();
    $.ajax({
      url,
      type: "GET",
      processData: false,
      dataType: false,
      success: (data) => {
        let options = `<option value="" selected disabled>Pilih provinsi</option>`;
        hideLoadingAnimation();
        data.forEach((item) => {
          const { id, province } = item;
          options += `<option value="${id}">${province}</option>`;
        });
        provinsiElement.innerHTML = options;
      },
      error: (data) => {
        hideLoadingAnimation();
        console.log(data);
      },
    });

    $("#provinsi")
      .select2({
        // dropdownParent: $("#modalEditSubcategory"),
        width: "resolve",
        theme: "bootstrap-4",
        placeholder: "Pilih provinsi",
      })
      .on("select2:select", (e) => {
        showLoadingAnimation();
        const url = `ajax-fetch-city`;
        const cityElement = document.getElementById("kota");
        $.ajax({
          url,
          type: "GET",
          data: {
            id: e.target.value,
          },
          processData: true,
          dataType: false,
          success: (data) => {
            let options = `<option value="" selected disabled>Pilih kabupaten kota</option>`;
            data.forEach((item) => {
              const { id, city, type } = item;
              options += `<option value="${id}">${type + " " + city}</option>`;
            });
            cityElement.innerHTML = options;
            cityElement.disabled = false;
            hideLoadingAnimation();
          },
          error: (data) => {
            hideLoadingAnimation();
            console.log(data);
          },
        });
        grandTotal();
        document.getElementById("list-layanan").innerHTML = "";
      });

    $("#kota")
      .select2({
        // dropdownParent: $("#modalEditSubcategory"),
        width: "resolve",
        theme: "bootstrap-4",
        placeholder: "Pilih kabupaten",
      })
      .on("select2:select", (e) => {
        document.getElementById("kurir").disabled = false;
        pilihKurir.disabled = false;
        grandTotal();
        document.getElementById("list-layanan").innerHTML = "";
      });
  } catch (error) {
    console.log("fail to fetch raja ongkir");
  }
});

pilihKurir.addEventListener("input", (e) => {
  const getKota = document.getElementById("kota");
  if (e.target.value === "lokal" && getKota.value != 48) {
    e.target.value = "";
    Swal.fire({
      title: "Perhatian!",
      html: "Kurir lokal hanya tersedia untuk area Batam",
      icon: "warning",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Mengerti",
      allowOutsideClick: false,
    });
  }

  document.getElementById("list-layanan").innerHTML = "";
  grandTotal();
});

// fungsi kalkulasi total
const grandTotal = () => {
  const data = JSON.parse(localStorage.getItem("detail-cart-item"));
  const shippingElement = document.getElementById("shipping");
  const subtotalElement = document.getElementById("subtotal");
  const grandTotal = document.getElementById("grand-total");
  const service = document.getElementsByName("service");
  let shippingExpenses = 0;
  let subtotal = 0;

  try {
    service.forEach((item) => {
      if (item.checked) {
        shippingExpenses = item.value;
      }
    });

    if (document.getElementById("kurir").value == "lokal") {
      shippingExpenses = defaultShippingCost;
    }
    data.forEach((item) => {
      subtotal += Number(item.total);
    });
  } catch (error) {
    console.log("service not available");
  }

  subtotalElement.innerHTML = commify(subtotal);
  shippingElement.innerHTML = commify(shippingExpenses);

  grandTotal.innerHTML = commify(Number(subtotal) + Number(shippingExpenses));
};

document.getElementById("check-layanan-kurir").addEventListener("click", () => {
  const getKota = document.getElementById("kota");
  // const selectSevice = document.getElementById("service");
  const listLayanan = document.getElementById("list-layanan");
  const totalWeight = calculateWeight();

  listLayanan.innerHTML = "";

  const url = `ajax-fetch-ongkir`;
  const data = {
    kota: getKota.value,
    kurir: pilihKurir.value,
    // berat: Number(totalWeight) < 1 ? 1 : Number(totalWeight),
    berat: 1,
  };

  if (data.kota == "" || data.kurir == "") {
    Swal.fire({
      title: "Perhatian!",
      html: "Pastikan <b>Provinsi, Kabupaten Kota, dan Kurir</b> telah diisi dengan benar",
      icon: "warning",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Mengerti",
      allowOutsideClick: false,
    });
    return;
  }

  if (data.kurir == "lokal") {
    grandTotal();
    return;
  }

  showLoadingAnimation();
  $.ajax({
    url,
    type: "GET",
    data,
    processData: true,
    dataType: false,
    success: (data) => {
      hideLoadingAnimation();
      const results = data?.rajaongkir?.results[0];
      const { code, costs, name } = results;
      let display = ``;
      costs.forEach((item) => {
        const { service, cost } = item;
        display += `
        <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="service" id="service-${service}" value="${
          cost[0].value
        }">
            <label class="form-check-label" for="service-${service}">
              <span>${service}</span>
              <br>
              <small class="text-info">${cost[0].etd} hari</small>
            </label>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="text-right">
            Rp${commify(cost[0].value)}
          </div>
        </div>
        `;
      });

      listLayanan.innerHTML = display;
      document.getElementsByName("service").forEach((element) => {
        element.addEventListener("input", () => {
          grandTotal();
        });
      });
      grandTotal();
    },
    error: (data) => {
      console.log(data);
      hideLoadingAnimation();
    },
  });
});

const calculateWeight = () => {
  // if (logoutElement === null) {
  const data = JSON.parse(localStorage.getItem("detail-cart-item"));
  try {
    let weightTotal = 0;
    data.forEach((item) => {
      let calculate = Number(item.quantity) * Number(item.weight_estimation);
      weightTotal += calculate;
    });
    return weightTotal;
  } catch (error) {
    console.log("unable to calculate");
  }
  // }
};

const decrease = (e, id, size_id, color_id) => {
  const data = JSON.parse(localStorage.getItem("detail-cart-item"));
  const cartItem = JSON.parse(localStorage.getItem("cart-item"));
  const thisParentElement = e.parentNode.parentNode.parentNode.parentNode;
  const thisChild = thisParentElement.querySelectorAll("td");
  const localTotal = thisChild[5];
  let totalSingleItem = 0;
  const subtotalElement = document.getElementById("subtotal");
  let subtotal = 0;

  const qtyInfo = e.parentNode.nextElementSibling;
  qtyInfo.value <= 1 ? (qtyInfo.value = 1) : qtyInfo.value--;

  const existingData = data.find((item) => {
    return (
      item.id == id && item.size_id == size_id && item.color_id == color_id
    );
  });

  let findCartItem;
  if (cartItem) {
    findCartItem = cartItem.find((item) => {
      return item.id == id && item.size == size_id && item.color == color_id;
    });
  }

  if (existingData) {
    totalSingleItem = Number(qtyInfo.value) * Number(existingData.price);
    localTotal.innerHTML = commify(totalSingleItem);
    existingData.quantity = Number(qtyInfo.value);
    existingData.total = totalSingleItem;
  }

  if (findCartItem) {
    findCartItem.quantity = Number(qtyInfo.value);
  }

  // calculate total
  data.forEach((item) => {
    subtotal += Number(item.total);
  });
  subtotalElement.innerHTML = commify(subtotal);

  localStorage.setItem("detail-cart-item", JSON.stringify(data));
  localStorage.setItem("cart-item", JSON.stringify(cartItem));
  grandTotal();
};

const increase = (e, id, size_id, color_id) => {
  const data = JSON.parse(localStorage.getItem("detail-cart-item"));
  const cartItem = JSON.parse(localStorage.getItem("cart-item")) || null;
  const thisParentElement = e.parentNode.parentNode.parentNode.parentNode;
  const thisChild = thisParentElement.querySelectorAll("td");
  const localTotal = thisChild[5];
  let totalSingleItem = 0;
  const subtotalElement = document.getElementById("subtotal");
  let subtotal = 0;

  const qtyInfo = e.parentNode.previousElementSibling;
  qtyInfo.value++;

  const existingData = data.find((item) => {
    return (
      item.id == id && item.size_id == size_id && item.color_id == color_id
    );
  });

  let findCartItem;
  if (cartItem) {
    findCartItem = cartItem.find((item) => {
      return item.id == id && item.size == size_id && item.color == color_id;
    });
  }

  if (existingData) {
    totalSingleItem = Number(qtyInfo.value) * Number(existingData.price);
    localTotal.innerHTML = commify(totalSingleItem);
    existingData.quantity = Number(qtyInfo.value);
    existingData.total = totalSingleItem;
  }

  if (findCartItem) {
    findCartItem.quantity = Number(qtyInfo.value);
  }

  // calculate total
  data.forEach((item) => {
    subtotal += Number(item.total);
  });
  subtotalElement.innerHTML = commify(subtotal);

  localStorage.setItem("detail-cart-item", JSON.stringify(data));
  localStorage.setItem("cart-item", JSON.stringify(cartItem));
  grandTotal();
};

const removeItem = (event) => {
  const parentItem = event.parentNode.parentNode;
  const tbodyElement = parentItem.parentNode; // .children.length
  const childItems = parentItem.querySelectorAll("td");
  const cart_id = event.dataset.cart || null;
  const data = JSON.parse(localStorage.getItem("detail-cart-item"));
  const local_data = JSON.parse(localStorage.getItem("cart-item"));
  const getData =
    childItems[4].children[0].children[0].children[0].attributes[2].value
      .replaceAll(" ", "")
      .replaceAll("'", "")
      .replaceAll(")", "")
      .split(",");

  const id = Number(getData[1]);
  const size_id = Number(getData[2]);
  const color_id = Number(getData[3]);

  const filteredData = data.filter((item) => {
    return (
      item.id != id || item.size_id != size_id || item.color_id != color_id
    );
  });

  if (local_data) {
    const filterLocalData = local_data.filter((item) => {
      return item.id != id || item.size != size_id || item.color != color_id;
    });

    localStorage.setItem("cart-item", JSON.stringify(filterLocalData));
    Toastify({
      text: data.message || "Barang berhasil dihapus dari keranjang",
      duration: 2000,
      close: true,
      position: "center",
      className: "danger",
      style: {
        background:
          "linear-gradient(90deg, rgba(12,92,0,1) 0%, rgba(32,193,27,1) 41%, rgba(168,255,125,1) 100%)",
        borderRadius: "5px",
      },
    }).showToast();
  }

  if (cart_id) {
    const url = `ajax-update-user-cart`;
    const updateData = {
      _token: $('meta[name="_token"]').attr("content"),
      _method: "PUT",
      id: cart_id,
    };

    $.ajax({
      url,
      type: "POST",
      data: updateData,
      success: (data) => {
        parentItem.remove();
        Toastify({
          text: data.message || "Barang berhasil dihapus dari keranjang",
          duration: 2000,
          close: true,
          position: "center",
          className: "danger",
          style: {
            background:
              "linear-gradient(90deg, rgba(12,92,0,1) 0%, rgba(32,193,27,1) 41%, rgba(168,255,125,1) 100%)",
            borderRadius: "5px",
          },
        }).showToast();
      },
      error: (data) => {
        console.log(data);
        Toastify({
          text: data.responseJSON.message,
          duration: 2000,
          close: true,
          position: "center",
          className: "danger",
          style: {
            background:
              "linear-gradient(90deg, rgba(92,0,0,1) 0%, rgba(193,27,27,1) 41%, rgba(255,125,125,1) 100%)",
            borderRadius: "5px",
          },
        }).showToast();
      },
    });
  }

  localStorage.setItem("detail-cart-item", JSON.stringify(filteredData));

  parentItem.remove();
  if (tbodyElement.children.length == 0) {
    tbodyElement.innerHTML = `
    <tr>
      <td colspan="7" class="text-center">
        Keranjang kosong. <a href="/shop">Mulai berbelanja</a>
      </td>
    </tr>
    `;
  }
  grandTotal();
};

const form_checkout = document.getElementById("form-checkout");
form_checkout.addEventListener("submit", (e) => {
  e.preventDefault();
  const list_id = document.querySelectorAll(".remove-item");
  const form_data = new FormData(form_checkout);

  let id_cart = [];
  list_id.forEach((item) => {
    id_cart = [...id_cart, item.dataset.cart];
  });

  let getService = "";
  const serviceSelected = document.querySelectorAll('input[name="service"]');
  serviceSelected.forEach((item) => {
    if (item.checked) {
      getService = item.attributes.id.value.split("-")[1];
    }
  });

  if (id_cart.length == 0) {
    Swal.fire({
      title: "Perhatian!",
      text: "Maaf keranjang anda kosong",
      icon: "warning",
      confirmButtonText: "Lanjutkan berbelanja",
      showCancelButton: true,
      cancelButtonText: "Batal",
      allowOutsideClick: false,
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace("/shop");
      }
    });
    return;
  }

  const data = {
    _token: form_data.get("_token"),
    total_peritem: form_data.getAll("total-peritem[]"),
    id_item: id_cart,
    province: form_data.get("provinsi"),
    kota: form_data.get("kota"),
    courier: form_data.get("kurir"),
    service: form_data.get("service"),
    service_choice: getService,
  };

  if (data.total_peritem == 0) {
    Swal.fire({
      title: "Perhatian!",
      text: "Mohon lengkapi kuantitas barang pesanan anda",
      icon: "warning",
      confirmButtonText: "Mengerti",
      cancelButtonText: "Batal",
      allowOutsideClick: false,
    });
    return;
  }

  if (data.courier != "lokal" && data.service_choice == "") {
    Swal.fire({
      title: "Perhatian!",
      text: "Mohon pilih layanan pengiriman terlebih dahulu",
      icon: "warning",
      confirmButtonText: "Mengerti",
      cancelButtonText: "Batal",
      allowOutsideClick: false,
    });
    return;
  }

  Swal.fire({
    title: "Perhatian!",
    text: "Patikan anda telah memasukkan informasi dengan benar",
    icon: "warning",
    confirmButtonText: "Lanjutkan ke pemesanan",
    showCancelButton: true,
    cancelButtonText: "Batal",
    allowOutsideClick: false,
  }).then((result) => {
    if (result.isConfirmed) {
      showLoadingAnimation();
      const url = `ajax-cart-checkout`;
      $.ajax({
        url,
        type: "POST",
        data,
        success: (data) => {
          hideLoadingAnimation();
          tableBody.innerHTML = `
          <tr>
            <td colspan="7" class="text-center">
              Keranjang kosong. <a href="/shop">Mulai berbelanja</a>
            </td>
          </tr>`;
          $("#form-checkout")[0].reset();
          document.getElementById("list-layanan").innerHTML = "";
          document.getElementById("subtotal").innerHTML = "0";
          $("#provinsi").val("").trigger("change");
          $("#kota").val("").trigger("change");
          document.getElementById("kota").disabled = true;
          document.getElementById("kurir").disabled = true;
          document.getElementById("total-item-in-cart").innerHTML = 0;
          Swal.fire({
            title: "Berhasil!",
            text: data.message,
            icon: "success",
            confirmButtonText: "Mengerti",
            cancelButtonText: "Batal",
            allowOutsideClick: false,
          });
        },
        error: (data) => {
          hideLoadingAnimation();
          Swal.fire({
            title: "Gagal!",
            html: data.responseJSON.message,
            icon: "error",
            confirmButtonText: "Mengerti",
            cancelButtonText: "Batal",
            allowOutsideClick: false,
          });
        },
      });
    }
  });
});
