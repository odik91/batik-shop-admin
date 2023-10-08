const viewData = (psudoElement) => {
  // auto view data
  const listUsers = document.querySelectorAll(psudoElement);

  listUsers.forEach((item) => {
    item.addEventListener("click", (e) => {
      document.cookie = `id_cat=; category=;`;
      try {
        showLoadingAnimation();

        const parent = e.target.parentNode;
        const children = parent.querySelectorAll("td");

        // set cookie
        document.cookie = `id_cat=${children[1].childNodes[1].value};`;
        document.cookie = `category=${children[1].childNodes[0].nodeValue};`;

        const displayCategory = document.getElementById("detail-category");
        displayCategory.value = children[1].childNodes[0].nodeValue || "";

        $("#modalDetailCategory").modal("show");
        hideLoadingAnimation();
      } catch (error) {
        hideLoadingAnimation();
        console.log("no action available");
      }
    });
  });
};

let tableCategory;

$(() => {
  const url = `datatable-category`;
  tableCategory = $("#table-category").DataTable({
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
        data: null,
        name: 'category',
        render: (data, type, row) => {
          return `${data.category} <input type="hidden" value="${data.id}">`;
        },
        className: "text-wrap text-capitalize lh-base pointer",
      },
    ],
  });

  tableCategory.on("draw", () => {
    viewData("#table-category > tbody > tr");
  });
});

const reloadTableCategory = () => {
  tableCategory.ajax.reload();
};

// edit category
const newCategory = document.getElementById("add-new-category");
newCategory.addEventListener("click", () => {
  resetFormElement("form-add-category", "is-valid", "button-add-category");
});

stdValidationElement(
  "category-add",
  "form-add-category",
  "is-valid",
  [],
  "button-add-category",
  1
);

// form input category
const formAddCategory = document.getElementById("form-add-category");
formAddCategory.addEventListener("submit", (e) => {
  e.preventDefault();
  showLoadingAnimation();

  const formData = new FormData(formAddCategory);
  const data = {
    _token: formData.get("_token"),
    category: formData.get("category-add"),
  };

  const url = `ajax-add-category`;

  $.ajax({
    url,
    type: "POST",
    data,
    success: (data) => {
      hideLoadingAnimation();
      reloadTableCategory();
      resetFormElement("form-add-category", "is-valid", "button-add-category");
      $("#modalAddCategory").modal("hide");

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
          document.getElementById("closeModalAddCategory").disabled = true;
        },
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById("closeModalAddCategory").disabled = false;
        }
      });
    },
  });
});

document
  .getElementById("button-edit-category")
  .addEventListener("click", () => {
    const cookieData = document.cookie;
    const data = cookieToJson(cookieData);

    const id_category = document.getElementById("id-category-edit");
    const category = document.getElementById("category-edit");

    id_category.value = data.id_cat;
    category.value = data.category;
    category.classList.add("is-valid");
  });

stdValidationElement(
  "category-edit",
  "form-edit-category",
  "is-valid",
  [],
  "submit-edit-category",
  1
);

const formEditCategory = document.getElementById("form-edit-category");
formEditCategory.addEventListener("submit", (e) => {
  e.preventDefault();
  showLoadingAnimation();
  const url = `ajax-update-category`;
  const formData = new FormData(formEditCategory);
  const data = {
    _token: formData.get("_token"),
    _method: formData.get("_method"),
    id: formData.get("id-category-edit"),
    category: formData.get("category-edit"),
  };

  $.ajax({
    url,
    type: "POST",
    data,
    success: (data) => {
      hideLoadingAnimation();
      reloadTableCategory();
      $("#modalEditCategory").modal("hide");
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
          document.getElementById("closeModalEditCategory").disabled = true;
        },
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById("closeModalEditCategory").disabled = false;
        }
      });
    },
  });
});

const buttonDeleteCategory = document.getElementById("button-delete-category");
buttonDeleteCategory.addEventListener("click", () => {
  const csrf_token = $('meta[name="_token"]').attr("content");
  const cookieData = document.cookie;
  const data = cookieToJson(cookieData);

  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Kategori akan dihapus",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
    allowOutsideClick: false,
    didOpen: () => {
      document.getElementById("closeModalDetailCategory").disabled = true;
    },
  }).then((result) => {
    if (result.isConfirmed) {
      const id = data.id_cat;
      const url = `ajax-delete-category`;

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
          reloadTableCategory();
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
              document.getElementById(
                "closeModalDetailCategory"
              ).disabled = true;
            },
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById(
                "closeModalDetailCategory"
              ).disabled = false;
            }
          });
        },
      });

      // set close button to enable
      document.getElementById("closeModalDetailCategory").disabled = false;

      $("#modalDetailCategory").modal("hide");
    }
  });
});
