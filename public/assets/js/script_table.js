// Call the dataTables jQuery plugin
$(document).ready(function() {
	//listado de personas
  	$('#listadopersonatable').DataTable({
	    "scrollCollapse": true,
	    "order": [[ 0, "asc" ]],
	    "iDisplayLength": 10,
	    "paging": false,
        "aLengthMenu": [
            [10, 20, 50, -1],
            [10, 20, 50, "Todos"] // change per page values here
        ],
	    "language": {
	        "sLengthMenu": "_MENU_ registros",
	        "oPaginate": {
	            "sPrevious": "Ant",
	            "sNext": "Sig"
	        },
	        "search":         "Buscar:",
	        "info":           "Del _START_ al _END_ de _TOTAL_ registros",
	        "infoFiltered":   "(filtrado de _MAX_ registros)",
	        "sEmptyTable": "No se encontraron registros."
	    },
	});
});
