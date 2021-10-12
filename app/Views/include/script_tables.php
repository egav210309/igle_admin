<script type="text/javascript">
// Call the dataTables jQuery plugin
$(document).ready(function() {

  $('#dataTable').DataTable();
  $('#listadopersonatable').DataTable({
        "scrollCollapse": true,
        "order": [[ 0, "asc" ]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ records",
            "oPaginate": {
                "sPrevious": "Ant",
                "sNext": "Sig"
            },
            "sEmptyTable": "No se encontraron registros."
        },
    });
});
</script>