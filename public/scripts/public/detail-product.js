const detq = generateRandomKey();
let price, unit, weight, localId;

let is_login = "no";

$(() => {
  try {
    const attr = document.getElementById("attr");
    localId = attr.value;
    const attr1 = document.getElementById("attr1");
    const attr2 = document.getElementById("attr2");
    const attr3 = document.getElementById("attr3");
    const attr4 = document.getElementById("is-login");

    price = attr1.value;
    unit = attr2.value;
    weight = attr3.value;
    is_login = attr4.value || "no";

    attr.remove();
    attr1.remove();
    attr2.remove();
    attr3.remove();
    attr4.remove();
  } catch (error) {
    console.log("info not available");
  }
});

const elementsCheckTotal = document.querySelectorAll(".check-info");
const quantityElement = document.getElementById("quantity");
const weight_estimation = document.getElementById("weight");
const totalPrice = document.getElementById("total-price");

quantityElement.value = 1;

elementsCheckTotal.forEach((elem) => {
  elem.addEventListener("click", () => {
    let total = Number(price) * quantityElement.value;
    totalPrice.innerHTML = commify(total);

    let weightEstimate = quantityElement.value * Number(weight);
    weight_estimation.innerHTML = commify(weightEstimate);
  });
});

const addToCart = document.getElementById("add-to-cart");
addToCart.addEventListener("submit", (e) => {
  e.preventDefault();
  const total = Number(price) * quantityElement.value;

  const sizeElement = document.getElementsByName("size");
  const colorElement = document.getElementsByName("color");

  const formData = new FormData(addToCart);
  const data = {
    id: localId,
    size: formData.get("size"),
    color: formData.get("color"),
    quantity: formData.get("quantity"),
  };

  if (sizeElement.length > 0) {
    if (!data.size) {
      Swal.fire({
        title: "Perhatian!",
        html: "Mohon pilih ukuran terlebih dahulu",
        icon: "warning",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Mengerti",
        allowOutsideClick: false,
      });
      return;
    }
  }

  if (colorElement.length > 0) {
    if (!data.color) {
      Swal.fire({
        title: "Perhatian!",
        html: "Mohon pilih warna terlebih dahulu",
        icon: "warning",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Mengerti",
        allowOutsideClick: false,
      });
      return;
    }
  }

  if (Number(data.quantity) === 0) {
    Swal.fire({
      title: "Perhatian!",
      html: "Mohon isi kuantitas barang terlebih dahulu",
      icon: "warning",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Mengerti",
      allowOutsideClick: false,
    });
    return;
  }

  if (is_login === "yes") {
    const url = `/ajax-add-to-cart`;
    data["_token"] = formData.get("_token");
    showLoadingAnimation();
    $.ajax({
      url,
      type: "POST",
      data,
      success: (data) => {
        hideLoadingAnimation();
        document.getElementById('total-item-in-cart').innerHTML = data.cart_count || 0
        Swal.fire({
          title: "Berhasil",
          html: data.message,
          icon: "success",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Mengerti",
          allowOutsideClick: false,
        });
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
  } else {
    let localData = JSON.parse(localStorage.getItem("cart-item"));

    if (localData) {
      const existingData = localData.find((item) => {
        return (
          item.id === data.id &&
          item.size === data.size &&
          item.color === data.color
        );
      });

      if (existingData) {
        existingData.quantity =
          Number(existingData.quantity) + Number(data.quantity);
      } else {
        localData = [...localData, data];
      }
      localStorage.setItem("cart-item", JSON.stringify(localData));
    } else {
      localStorage.setItem("cart-item", JSON.stringify([data]));
    }

    const cartElement = document.getElementById("total-item-in-cart");
    if (localData) {
      cartElement.innerHTML = localData.length;
      Swal.fire({
        title: "Berhasil",
        html: data.message,
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Mengerti",
        allowOutsideClick: false,
      });
    } else {
      cartElement.innerHTML = 1;
      Swal.fire({
        title: "Berhasil",
        html: data.message,
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Mengerti",
        allowOutsideClick: false,
      });
    }
  }
});
