const cq = generateRandomKey();
// remove local storage
removeTargetLocalStorage("close-modal", "detail-color");

const viewData = (psudoElement) => {
  // auto view data
  const listUsers = document.querySelectorAll(psudoElement);
  localStorage.removeItem("detail-color");

  listUsers.forEach((item) => {
    item.addEventListener("click", (e) => {
      try {
        // showLoadingAnimation();
        // const parent = e.target.parentNode;
        // const children = parent.querySelectorAll("td");

        // const displayCategory = document.getElementById("category-detail");
        // const displaySubcategory =
        //   document.getElementById("subcategory-detail");

        // displayCategory.value = children[1].innerText || "";
        // displaySubcategory.value = children[2].innerHTML || "";

        // const data = {
        //   id: children[2].dataset.id,
        //   catId: children[2].dataset.catId,
        //   subacategory: children[2].innerText,
        // };

        // localStorage.setItem("detail-color", JSON.stringify(data));

        $("#modalDetailColor").modal("show");
        hideLoadingAnimation();
      } catch (error) {
        hideLoadingAnimation();
        console.log("no action available");
      }
    });
  });
};

let colorTable;

$(() => {
  const url = `color-datatable`;
  colorTable = $("#table-color").DataTable({
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
        name: 'color',
        render: (data, type, row) => {
          return `${data.color} <input type="hidden" value="${data.id}">`;
        },
        className: "text-wrap text-capitalize lh-base pointer",
      },
    ],
  });

  colorTable.on("draw", () => {
    viewData("#table-color > tbody > tr");
  });
});
