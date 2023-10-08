let tableProvince;

$(() => {
  const url = `province-datatable`;
  tableProvince = $("#table-provinsi").DataTable({
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
        name: "province",
        render: (data, type, row) => {
          return `${data.province} <input type="hidden" value="${data.id}">`;
        },
        className: "text-wrap text-capitalize lh-base pointer",
      },
      {
        data: "code",
        name: "code",
        className: "text-wrap text-capitalize lh-base pointer",
      },
    ],
  });
});

const reloadTableProvince = () => {
  tableProvince.ajax.reload();
};
