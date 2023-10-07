const viewData = (psudoElement) => {
  // auto view data
  const listUsers = document.querySelectorAll(psudoElement);

  listUsers.forEach((item) => {
    item.addEventListener("click", (e) => {
      // document.cookie = `id_cat=; category=;}`;
      // try {
      //   showLoadingAnimation();
      //   const parent = e.target.parentNode;
      //   const children = parent.querySelectorAll("td");
      //   // set cookie
      //   document.cookie = `id_cat=${children[1].childNodes[1].value};`;
      //   document.cookie = `category=${children[1].childNodes[0].nodeValue};`;
      //   const displayCategory = document.getElementById("detail-category");
      //   displayCategory.value = children[1].childNodes[0].nodeValue || "";
      //   $("#modalDetailCategory").modal("show");
      //   hideLoadingAnimation();
      // } catch (error) {
      //   hideLoadingAnimation();
      //   console.log("no action available");
      // }
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
          return `${data.subcategory} <input type="hidden" value="${data.id}">`;
        },
        className: "text-wrap text-capitalize lh-base pointer",
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
      console.log(data);
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
