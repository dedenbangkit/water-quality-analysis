const source = window.location.pathname === "/dashboard" ? "/api/data" : "/api/analysis"
$('#data').DataTable( {
    ajax: "/api/data",
    scrollX: true,
    dom: 'Bfrtip',
    buttons: [
        'print','copy', 'excel', 'pdf','colvis'
    ],
});
