$(document).ready(function () {
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
    // const imgElement = document.getElementById("images");
    // imgElement.files = FileListItem(fileArr);
    // if (imgElement.files.length === 0) {
    //   imgElement.classList.remove("is-valid");
    // }
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

const showHideProductLayer = (e) => {
  const targetElement = e.dataset.targeted;
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

// stdValidationElementArray(
//   [
//     "product-name",
//     "category",
//     "subcategory",
//     "unit",
//     "images",
//     "description",
//     "price",
//     "weight",
//   ],
//   "form-add-product",
//   "is-valid",
//   ["size", "color", "discount"],
//   "submit-add-product",
//   8
// );
