let tableCity;

$(() => {
  const url = `city-datatable`,
    tableCity = $("#table-city").DataTable({
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
          data: "province",
          name: "province",
          className: "text-wrap lh-base pointer",
        },
        {
          data: null,
          name: "city",
          render: (data, type, row) => {
            return `${data.city} <input type="hidden" value="${data.id}">`;
          },
          className: "text-wrap text-capitalize lh-base pointer",
        },
      ],
    });
});
