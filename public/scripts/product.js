let dataTableProduct;
const proq = generateRandomKey();

const getDetailProduct = (id) => {
  const url = ``;
  $.ajax({
    url,
    type: "GET",
    processData: false,
    dataType: false,
    success: (data) => {
      localStorage.setItem("detail-product", JSON.stringify(data));
    },
    error: (data) => {
      console.log("something went wrong");
    },
  });
};

const viewDataProduct = (psudoElement) => {
  // auto view data
  const products = document.querySelectorAll(psudoElement);
  localStorage.removeItem("detail-product");

  products.forEach((item) => {
    item.addEventListener("click", (e) => {
      try {
        showLoadingAnimation();
        const parent = e.target.parentNode;
        const children = parent.querySelectorAll("td");
        console.log(children);

        const product = document.getElementById("detail-product-name");
        const category = document.getElementById("detail-category");
        const subcategory = document.getElementById("detail-subcategory");
        const unit = document.getElementById("detail-unit");
        const size = document.getElementById("detail-size");
        const color = document.getElementById("detail-color");
        const images = document.getElementById("detail-images");
        const description = document.getElementById("detail-description");
        const discount = document.getElementById("detail-discount");
        const weight = document.getElementById("detail-weight");
        const active = document.getElementById("detail-active");

        product.value = children[2].innerText || "";
        category.value = children[3].innerText || "";
        subcategory.value = children[4].innerText || "";

        console.log(children[2].dataset.id);

        // const data = {
        //   id: children[2].dataset.id,
        //   catId: children[2].dataset.catId,
        //   subacategory: children[2].innerText,
        // };

        // localStorage.setItem("detail-product", JSON.stringify(data));

        showHideProductLayer("detail-product");
        hideLoadingAnimation();
      } catch (error) {
        hideLoadingAnimation();
        console.log("no action available");
      }
    });
  });
};

$(document).ready(function () {
  const url = `product-datatable`;
  dataTableProduct = $("#table-Product").DataTable({
    destroy: true,
    processing: true,
    serverSide: true,
    deferRender: true,
    bFilter: true,
    ajax: { url },
    responsive: true,
    columns: [
      {
        data: "DT_RowIndex",
        name: "DT_RowIndex",
        className: "text-wrap lh-base pointer",
      },
      {
        data: "files",
        name: "files",
        render: (data, type, row) => {
          let display = "";
          data.forEach((file) => {
            display += `<img src="/upload/images/${file}" class="img-thumbnail rounded mx-auto d-block">`;
          });
          return display;
        },
        className: "text-wrap lh-base pointer",
      },
      {
        data: null,
        name: "product",
        className: "text-wrap lh-base pointer",
        render: (data, type, row) => {
          return data.product;
        },
      },
      {
        data: "category",
        name: "category",
        className: "text-wrap lh-base pointer",
      },
      {
        data: "subcategory",
        name: "subcategory",
        className: "text-wrap lh-base pointer",
      },
      {
        data: "description",
        name: "description",
        className: "text-wrap lh-base pointer",
        render: (data, type, row) => {
          let descriptionHTML = data
            .replace(/&lt;/g, "<")
            .replace(/&gt;/g, ">");
          let replaceAllEnd = descriptionHTML.replaceAll("</p>", "<br>");
          let text = replaceAllEnd.replace(/<[^>]*>/g, "");
          text = text.replaceAll("&amp;nbsp;", " ");
          let truncatedText =
            text.length > 150 ? text.substring(0, 150) + "..." : text;
          return truncatedText;
        },
      },
      {
        data: "price",
        name: "price",
        className: "text-wrap text-end lh-base pointer",
        render: (data, type, row) => {
          return commify(
            Math.round((Number(data) + Number.EPSILON) * 1000) / 1000
          );
        },
      },
      {
        data: "discount",
        name: "discount",
        className: "text-wrap text-end lh-base pointer",
        render: (data, type, row) => {
          return commify(
            Math.round((Number(data) + Number.EPSILON) * 1000) / 1000
          );
        },
      },
      {
        data: "weight_estimation",
        name: "weight_estimation",
        className: "text-wrap text-end lh-base pointer",
        render: (data, type, row) => {
          return commify(
            Math.round((Number(data) + Number.EPSILON) * 1000) / 1000
          );
        },
      },
    ],
    columnDefs: [
      {
        targets: 2,
        createdCell: function (td, cellData, rowData, row, col) {
          const test = cellData.id.toString();
          td.setAttribute("data-id", encryptText(test, proq));
        },
      },
    ],
  });

  dataTableProduct.on("draw", () => {
    viewDataProduct("#table-Product > tbody > tr");
  });

  // fungsi upload and preview
  var fileArr = [];
  $("#images").change(function () {
    // check if fileArr length is greater than 0
    if (fileArr.length > 0) fileArr = [];

    $("#image_preview").html("");
    var total_file = document.getElementById("images").files;
    if (!total_file.length) return;
    for (var i = 0; i < total_file.length; i++) {
      if (total_file[i].size > 1048576) {
        return false;
      } else {
        fileArr.push(total_file[i]);
        $("#image_preview").append(
          "<div class='img-div' id='img-div" +
            i +
            "'><img src='" +
            URL.createObjectURL(event.target.files[i]) +
            "' class='img-responsive image img-thumbnail' title='" +
            total_file[i].name +
            "'><div class='middle'><button id='action-icon' value='img-div" +
            i +
            "' class='btn btn-danger' role='" +
            total_file[i].name +
            "'><i class='fa fa-trash'></i></button></div></div>"
        );
      }
    }
  });

  $("body").on("click", "#action-icon", function (evt) {
    var divName = this.value;
    var fileName = $(this).attr("role");
    $(`#${divName}`).remove();

    for (var i = 0; i < fileArr.length; i++) {
      if (fileArr[i].name === fileName) {
        fileArr.splice(i, 1);
      }
    }
    const imgElement = document.getElementById("images");
    imgElement.files = FileListItem(fileArr);
    if (imgElement.files.length === 0) {
      imgElement.classList.remove("is-valid");
    }
    evt.preventDefault();
  });

  function FileListItem(file) {
    file = [].slice.call(Array.isArray(file) ? file : arguments);
    for (var c, b = (c = file.length), d = !0; b-- && d; )
      d = file[b] instanceof File;
    if (!d)
      throw new TypeError(
        "expected argument to FileList is File or array of File objects"
      );
    for (b = new ClipboardEvent("").clipboardData || new DataTransfer(); c--; )
      b.items.add(file[c]);
    return b.files;
  }
  // end fungsi upload and preview

  const editor = Jodit.make("#description", {
    toolbarButtonSize: "small",
    allowResizeY: true,
  });

  editor.e.on("keyup", (e) => {
    if (e.target.innerText.length > 1) {
      statusOk("description");
      e.target.classList.add("border", "border-success");
    } else {
      statusNone("description");
      e.target.classList.remove("border", "border-success");
    }
  });

  // editor.e.on("change", (e, tagetedElement) => {
  //   console.log(tagetedElement);
  //   if (e.length >= 2) {
  //     statusOk("description");
  //     tagetedElement?.classList.add("border", "border-success");
  //   } else {
  //     statusNone("description");
  //     tagetedElement?.classList.remove("border", "border-success");
  //   }
  // });

  $("#category")
    .select2({
      with: "resolve",
      theme: "bootstrap-5",
      placeholder: "Pilih kategori",
      ajax: {
        url: `product-ajax-get-category`,
        dataType: "json",
        delay: 250,
        data: (params) => {
          return {
            query: params.term,
          };
        },
        processResults: (data) => {
          let results = [];
          if (data.length > 0) {
            results = data.map((item) => {
              return {
                id: item.id,
                text: item.category,
              };
            });
          }

          return { results: results };
        },
        caches: true,
      },
    })
    .on("select2:select", (e) => {
      const url = `product-ajax-get-subcategory`;

      $.ajax({
        url,
        type: "GET",
        data: { category_id: e.target.value },
        processData: true,
        dataType: false,
        success: (data) => {
          const subcategoryElement = document.getElementById("subcategory");
          let display = `<option value="" selected disabled>Pilih subkategori</option>`;
          data.forEach((item) => {
            const { id, subcategory } = item;
            display += `<option value="${id}">${subcategory}</option>`;
          });
          subcategoryElement.innerHTML = display;

          statusOk(e.target.id);
          statusNone("subcategory");
          hideLoadingAnimation();
        },
        error: (data) => {
          console.log("something went wrong");
          hideLoadingAnimation();
        },
      });
    });

  $("#subcategory")
    .select2({
      with: "resolve",
      theme: "bootstrap-5",
      placeholder: "Pilih subkategori",
    })
    .on("select2:select", (e) => {
      statusOk(e.target.id);
    });

  $("#unit")
    .select2({
      with: "resolve",
      theme: "bootstrap-5",
      placeholder: "Pilih satuan",
      ajax: {
        url: `product-ajax-get-unit`,
        dataType: "json",
        delay: 250,
        data: (params) => {
          return {
            query: params.term,
          };
        },
        processResults: function (data) {
          var results = [];

          if (data.length > 0) {
            results = data.map(function (item) {
              return {
                id: item.id,
                text: `${item.unit} (${item.abbrevation})`,
              };
            });
          }

          return {
            results: results,
          };
        },
        cache: true,
      },
    })
    .on("select2:select", (e) => {
      statusOk(e.target.id);
    });

  $("#size")
    .select2({
      width: "resolve",
      ajax: {
        url: `product-ajax-size`,
        dataType: "json",
        delay: 250,
        data: (params) => {
          return {
            query: params.term,
          };
        },
        processResults: function (data) {
          var results = [];

          if (data.length > 0) {
            results = data.map(function (item) {
              return {
                id: item.id,
                text: item.size,
              };
            });
          }

          return {
            results: results,
          };
        },
        cache: true,
      },
    })
    .on("select2:select", (e) => {
      e.target.selectedOptions.length > 0 && statusOk(e.target.id);
    })
    .on("select2:unselecting", (e) => {
      e.target.selectedOptions.length <= 1 && statusNone(e.target.id);
    });

  $("#color")
    .select2({
      width: "resolve",
      ajax: {
        url: `product-ajax-colors`,
        dataType: "json",
        delay: 250,
        data: (params) => {
          return {
            query: params.term,
          };
        },
        processResults: function (data) {
          var results = [];

          if (data.length > 0) {
            results = data.map(function (item) {
              return {
                id: item.id,
                text: item.color,
              };
            });
          }

          return {
            results: results,
          };
        },
        cache: true,
      },
    })
    .on("select2:select", (e) => {
      e.target.selectedOptions.length > 0 && statusOk(e.target.id);
    })
    .on("select2:unselecting", (e) => {
      e.target.selectedOptions.length <= 1 && statusNone(e.target.id);
    });
});

const reloadTableProduct = () => {
  dataTableProduct.ajax.reload();
};

const showHideProductLayer = (e) => {
  const targetElement = e?.dataset?.targeted || e;
  const listLayouts = document.querySelectorAll(".product");
  listLayouts.forEach((element) => {
    if (element.id === targetElement) {
      if (element.classList.contains("scale-down-top")) {
        element.classList.remove("scale-down-top");
      }
      element.classList.remove("d-none");
      element.classList.add("scale-up-top");
    } else {
      !element.classList.contains("d-none") && element.classList.add("d-none");
      if (element.classList.contains("scale-up-top")) {
        element.classList.remove("scale-up-top");
        element.classList.add("scale-down-top");
      }
    }
  });
};

document.getElementById("add-new-product").addEventListener("click", () => {
  resetFormElement("form-add-product", "is-valid", "submit-add-product");
});

$("#form-add-product").on("submit", function (e) {
  e.preventDefault();
  showLoadingAnimation();

  let formData = new FormData(this);

  $.ajax({
    type: "POST",
    url: `product-ajax-store`,
    data: formData,
    contentType: false,
    processData: false,
    success: (data) => {
      hideLoadingAnimation();
      showHideProductLayer("main-layout");
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
        title: "Gagal",
        html: data.responseJSON.message,
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Mengerti",
        allowOutsideClick: false,
      });
    },
  });
});
