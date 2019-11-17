const source = window.location.pathname === "/dashboard" ? "/api/data" : "/api/analysis"
$('#data').DataTable( {
    ajax: source,
    scrollX: true,
    dom: 'Bfrtip',
    buttons: [
        'print','copy', 'excel', 'pdf','colvis'
    ],
});
