<!-- jQuery -->
<script src="../vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../vistas/plugins/datatables/jquery.dataTables.js"></script>
<script src="../vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../vistas/dist/js/demo.js"></script>
<!-- page script -->

<!-- Esto es para hacer jalar los botones de exportación de data tables, no vienen con adminLTE -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script>
  $(function () {
    /* Tabla Registros FYM*/
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      /* Esto es para agregar los botones y el orden de mas nuevo a viejo en registros */
      dom: 'Bfrtip',
            order: [[ 6, "desc" ]],
            pageLength : 10,
            buttons: ['copy', 'csv', 'excel']
    });

    /* Tabla de registros Pagos */
    $('#pagos').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      /* Esto es para agregar los botones y el orden de mas nuevo a viejo en registros */
      dom: 'Bfrtip',
            order: [[ 0, "desc" ]],
            pageLength : 10,
            buttons: ['copy', 'csv', 'excel']
    });

  });

</script>
