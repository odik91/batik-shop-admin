let unitTalbe

$(() => {
  const url = `unit-datatable`
  unitTalbe = $('#table-unit').DataTable({
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
        name: "unit",
        render: (data, type, row) => {
          return `${data.unit} <input type="hidden" value="${data.id}">`;
        },
        className: "text-wrap text-capitalize lh-base pointer",
      },
      {
        data: "abbrevation",
        name: "abbrevation",
        className: "text-wrap lh-base pointer",
      },
    ],
  })
})