$(function() {
    $('#prods').DataTable({
        "sPaginationType": "full_numbers",
        "iDisplayLength": 10,
        "lengthMenu" : [[10, 25, 50, -1], [10, 25, 50, "All" ]],
        "bDestroy": true,
         "order": [[ 1, "asc" ]],
          "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [4] }
                ]      
    });
    $('[data-toggle="tooltip"]').tooltip(); 
});



