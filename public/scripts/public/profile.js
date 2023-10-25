const get_detail_orders = document.querySelectorAll(".check-order");
get_detail_orders.forEach((element) => {
  element.addEventListener("click", (e) => {
    showLoadingAnimation();
    const data = {
      _token: $('meta[name="_token"]').attr("content"),
      order_id: e.target.dataset.order,
    };

    const url = `profile-ajax-get-detail-order`;

    $.ajax({
      url,
      type: "POST",
      data,
      success: (data) => {
        hideLoadingAnimation();
        const tableElement = document.getElementById("detail-orders");
        tableElement.innerHTML = "";
        let display = "";
        let subtotal = 0;
        const { order_detail, order } = data;
        order_detail.forEach((item) => {
          const {
            price,
            discount,
            total,
            total_item,
            size,
            color,
            product,
            image,
          } = item;
          display += `
          <tr>
            <td class="align-middle">
              <img src="upload/images/${image}" alt=""
                style="width: 50px;">
              ${product}
            </td>
            <td class="align-middle">${size || "-"}</td>
            <td class="align-middle">${color || "-"}</td>
            <td class="align-middle">Rp${commify(Number(price))}</td>
            <td class="align-middle">
              <div class="input-group quantity mx-auto" style="width: 100px;">
                <input type="text" class="form-control form-control-sm bg-secondary text-center"
                  value="${Number(total_item)}" readonly>
              </div>
            </td>
            <td class="align-middle">Rp${commify(Number(total))}</td>
          </tr>
          `;
          subtotal += Number(total);
        });
        tableElement.innerHTML = display;
        document.getElementById("subtotal").innerHTML = commify(subtotal);

        document.getElementById("shipping").innerHTML = commify(
          Number(order["shipping_expenses"])
        );
        document.getElementById("grand-total").innerHTML = commify(
          Number(order["shipping_expenses"]) + subtotal
        );
        document.getElementById("courier").innerHTML = order["courier"];
        document.getElementById("courier-service").innerHTML = order["service"];
      },
      error: (data) => {
        hideLoadingAnimation();
        console.log(data);
      },
    });
  });
});

const payment_method = document.getElementById("payment-method");
payment_method.addEventListener("click", () => {
  const data = {
    _token: $('meta[name="_token"]').attr("content"),
    order_id: document.getElementById("select-payment-method").value,
  };
  console.log(data);
});
