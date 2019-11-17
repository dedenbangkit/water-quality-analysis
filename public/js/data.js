const source = window.location.pathname === "/dashboard" ? "/api/data" : "/api/analysis"


var data = new Promise ((resolve,reject) => {
    $.get(source, (response) => {
        resolve (response);
    })
});

data.then(x => {
    var database = x.data;
    $('#data').DataTable( {
        data: database,
        scrollX: true,
        dom: 'Bfrtip',
        buttons: [
            'print','copy', 'excel', 'pdf','colvis'
        ],
    });
});

