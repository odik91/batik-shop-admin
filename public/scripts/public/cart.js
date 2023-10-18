const logoutElement = document.getElementById("logout-form");
const pilihKurir = document.getElementById("kurir");
pilihKurir.value = "";

$(() => {
  pilihKurir.disabled = true;
  try {
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
            const tableBody = document.getElementById("detail-cart");
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
                <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
              </tr>
              `;
            });
            document.getElementById("subtotal").innerHTML = commify(subtotal);
            tableBody.innerHTML = display;
            localStorage.setItem("detail-cart-item", JSON.stringify(data));
          },
          error: (data) => {
            console.log(data);
          },
        });
      }
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
        const response = data.rajaongkir.results;
        response.forEach((item) => {
          const { province_id, province } = item;
          options += `<option value="${province_id}">${province}</option>`;
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
            const response = data.rajaongkir.results;
            response.forEach((item) => {
              const { city_id, city_name, type } = item;
              options += `<option value="${city_id}">${
                type + " " + city_name
              }</option>`;
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
});

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
    berat: totalWeight,
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

  showLoadingAnimation();
  $.ajax({
    url,
    type: "GET",
    data,
    processData: true,
    dataType: false,
    success: (data) => {
      const results = data.rajaongkir.results[0];
      console.log(results);
      const { code, costs, name } = results;
      let display = ``;
      costs.forEach((item) => {
        const { service, cost } = item;
        display += `
        <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="service" id="service-${service}" value="option1" checked>
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
      hideLoadingAnimation();
    },
    error: (data) => {
      console.log(data);
      hideLoadingAnimation();
    },
  });
});

const calculateWeight = () => {
  if (logoutElement === null) {
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
  }
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

  const findCartItem = cartItem.find((item) => {
    return item.id == id && item.size == size_id && item.color == color_id;
  });

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
};

const increase = (e, id, size_id, color_id) => {
  const data = JSON.parse(localStorage.getItem("detail-cart-item"));
  const cartItem = JSON.parse(localStorage.getItem("cart-item"));
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

  const findCartItem = cartItem.find((item) => {
    return item.id == id && item.size == size_id && item.color == color_id;
  });

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
};
