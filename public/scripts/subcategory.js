const sq = generateRandomKey();

// remove local storage
removeTargetLocalStorage("close-modal", "detail-subcat");

const viewData = (psudoElement) => {
  // auto view data
  const listUsers = document.querySelectorAll(psudoElement);
  localStorage.removeItem("detail-subcat");

  listUsers.forEach((item) => {
    item.addEventListener("click", (e) => {
      try {
        showLoadingAnimation();
        const parent = e.target.parentNode;
        const children = parent.querySelectorAll("td");

        const displayCategory = document.getElementById("category-detail");
        const displaySubcategory =
          document.getElementById("subcategory-detail");

        displayCategory.value = children[1].innerText || "";
        displaySubcategory.value = children[2].innerHTML || "";

        const data = {
          id: children[2].dataset.id,
          catId: children[2].dataset.catId,
          subacategory: children[2].innerText,
        };

        localStorage.setItem("detail-subcat", JSON.stringify(data));

        $("#modalDetailSubcategory").modal("show");
        hideLoadingAnimation();
      } catch (error) {
        hideLoadingAnimation();
        console.log("no action available");
      }
    });
  });
};

let tableSubcategory;

$(() => {
  const url = `subcategory-datatable`;
  tableSubcategory = $("#table-subcategory").DataTable({
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
        data: "category",
        name: "category",
        className: "text-wrap lh-base pointer",
      },
      {
        data: null,
        name: null,
        render: (data, type, row) => {
          return `${data.subcategory}`;
        },
        className: "text-wrap text-capitalize lh-base pointer",
        searchable: true,
      },
    ],
    columnDefs: [
      {
        targets: 2,
        createdCell: function (td, cellData, rowData, row, col) {
          const test = cellData.id.toString();
          const test2 = cellData.category_id.toString();
          td.setAttribute("data-id", encryptText(test, sq));
          td.setAttribute("data-cat-id", encryptText(test2, sq));
        },
      },
    ],
  });

  tableSubcategory.on("draw", () => {
    viewData("#table-subcategory > tbody > tr");
  });

  $("#category")
    .select2({
      dropdownParent: $("#modalAddSubcategory"),
      width: "resolve",
      theme: "bootstrap-5",
      placeholder: "Pilih kategori",
      ajax: {
        url: `subcategory-ajax-get-categories`,
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
                text: item.category,
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
      stdFormValidation(
        "form-add-subcategory",
        "is-valid",
        [],
        "button-add-subcategory",
        2
      );
    })
    .on("change", (e) => {
      if (e.target.value !== "") {
        statusOk(e.target.id);
      } else {
        statusNone(e.target.id);
      }
    });
});

const reloadTableSubcategory = () => {
  tableSubcategory.ajax.reload();
};

document.getElementById("add-new-subcategory").addEventListener("click", () => {
  resetFormElement(
    "form-add-subcategory",
    "is-valid",
    "button-add-subcategory"
  );
});

stdValidationElement(
  "subcategory",
  "form-add-subcategory",
  "is-valid",
  [],
  "button-add-subcategory",
  2
);

const formAddSubcategory = document.getElementById("form-add-subcategory");
formAddSubcategory.addEventListener("submit", (e) => {
  e.preventDefault();
  showLoadingAnimation();
  const url = `subcategory-ajax-store-subcategories`;

  const formData = new FormData(formAddSubcategory);
  const data = {
    _token: formData.get("_token"),
    category: formData.get("category"),
    subcategory: formData.get("subcategory"),
  };

  $.ajax({
    url,
    type: "POST",
    data,
    success: (data) => {
      hideLoadingAnimation();
      reloadTableSubcategory();
      resetFormElement(
        "form-add-subcategory",
        "is-valid",
        "button-add-subcategory"
      );
      $("#modalAddSubcategory").modal("hide");

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
        didOpen: () => {
          document.getElementById("closeModalAddSubcategory").disabled = true;
        },
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById("closeModalAddSubcategory").disabled = false;
        }
      });
    },
  });
});

const buttonToModalEditCategory = document.getElementById(
  "button-modal-edit-subcategory"
);
buttonToModalEditCategory.addEventListener("click", () => {
  const data = JSON.parse(localStorage.getItem("detail-subcat"));

  if (data) {
    const cateogry = document.getElementById("category-edit");
    const subcateogry = document.getElementById("subcategory-edit");
    const cat_id = decryptText(data.catId, sq);
    const subacategory_value = data.subacategory;

    subcateogry.value = subacategory_value;
    subcateogry.classList.add("is-valid");

    const url = `subcategory-ajax-get-categories`;
    $.ajax({
      url,
      type: "GET",
      dataType: false,
      porcessData: false,
      success: (data) => {
        let display = `<option value="" disabled>Pilih kategori</option>`;

        data.forEach((item) => {
          const { id, category } = item;
          display += `<option value="${id}" class="text-capitalize" ${
            id == cat_id && "selected"
          }>${category}</option>`;
        });

        cateogry.innerHTML = display;
        cateogry.classList.add("is-valid");
        document.getElementById("button-edit-subcategory").disabled = false;
      },
      error: (data) => {
        console.log("data subcategory not available");
      },
    });

    $("#category-edit")
      .select2({
        dropdownParent: $("#modalEditSubcategory"),
        width: "resolve",
        theme: "bootstrap-5",
        placeholder: "Pilih kategori",
      })
      .on("select2:select", (e) => {
        stdFormValidation(
          "form-edit-subcategory",
          "is-valid",
          [],
          "button-edit-subcategory",
          2
        );
      })
      .on("change", (e) => {
        if (e.target.value !== "") {
          statusOk(e.target.id);
        } else {
          statusNone(e.target.id);
        }
      });

    stdValidationElement(
      "subcategory-edit",
      "form-edit-subcategory",
      "is-valid",
      [],
      "button-edit-subcategory",
      2
    );
  }
});

const formEditSubcategory = document.getElementById("form-edit-subcategory");
formEditSubcategory.addEventListener("submit", (e) => {
  e.preventDefault();
  showLoadingAnimation();
  const localData = JSON.parse(localStorage.getItem("detail-subcat"));
  const id = decryptText(localData.id, sq);

  const formData = new FormData(formEditSubcategory);
  const data = {
    _token: formData.get("_token"),
    _method: formData.get("_method"),
    category: formData.get("category-edit"),
    subcategory: formData.get("subcategory-edit"),
    id,
  };

  const url = `subcategory-ajax-update-subcategories`;

  $.ajax({
    url,
    type: "POST",
    data,
    success: (data) => {
      hideLoadingAnimation();
      reloadTableSubcategory();
      $("#modalEditSubcategory").modal("hide");
      localStorage.removeItem("detail-subcat");
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
        didOpen: () => {
          document.getElementById("closeModalEditSubcategory").disabled = true;
        },
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById("closeModalEditSubcategory").disabled = false;
        }
      });
    },
  });
});

const deleteSubcategory = document.getElementById("button-delete-subcategory");
deleteSubcategory.addEventListener("click", () => {
  Swal.fire({
    title: "Apakah anda yakin?",
    text: `Subkategori ${
      document.getElementById("subcategory-detail").value
    } akan dihapus?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
    allowOutsideClick: false,
    didOpen: () => {
      document.getElementById("closeModalDetailSubcategory").disabled = true;
    },
  }).then((result) => {
    if (result.isConfirmed) {
      const localData = JSON.parse(localStorage.getItem("detail-subcat"));
      const id = decryptText(localData.id, sq);
      const url = `subcategory-ajax-delete`;
      const csrf_token = $('meta[name="_token"]').attr("content");

      $.ajax({
        url,
        type: "POST",
        data: {
          _token: csrf_token,
          _method: "DELETE",
          id,
        },
        success: (data) => {
          hideLoadingAnimation();
          reloadTableSubcategory();
          $("#modalDetailSubcategory").modal("hide");
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
          localStorage.removeItem("detail-subcat");
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
            didOpen: () => {
              document.getElementById(
                "closeModalDetailSubcategory"
              ).disabled = true;
            },
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById(
                "closeModalDetailSubcategory"
              ).disabled = false;
            }
          });
        },
      });

      // set close button to enable
      document.getElementById("closeModalDetailSubcategory").disabled = false;

      $("#modalDetailSubcategory").modal("hide");
    }
  });
});
