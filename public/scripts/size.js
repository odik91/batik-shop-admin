let sizeTable;

$(() => {
  const url = `size-datatable`;
  sizeTable = $("#table-size").DataTable({
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
        name: "size",
        render: (data, type, row) => {
          return `${data.size} <input type="hidden" value="${data.id}">`;
        },
        className: "text-wrap text-capitalize lh-base pointer",
      },
    ],
  });

  sizeTable.on("draw", () => {
    // sizeTable("#table-color > tbody > tr");
  });
});

const reloadTableSize = () => {
  sizeTable.ajax.reload();
};
