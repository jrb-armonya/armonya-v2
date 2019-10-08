$(document).ready(function() {
    $('#data_table').DataTable({
        "deferRender": true,
        stateSave: true,
    });

    //DataTable for permissions in (role edit)
    $("#permissions-data").DataTable({
        "searching": false,
        "bLengthChange": false,
        "bInfo": false,
        "bAutoWidth": false,
    });

    $("#tableFiches").DataTable({
        stateSave: true,
        columnDefs: [
            { "type": "date-eu", targets: [2, 5] }
        ]
    });

    $("#data_table_part").DataTable({
        stateSave: true,
    });

    $("#fiches-table").DataTable({
        dom: 'Bfrtip',
        stateSave: true,
        columnDefs: [
            { "type": "date-eu", targets: [2, 5] }
        ]
    });

    
} );