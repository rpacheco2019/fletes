<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Flete y montaje P1</title>

     <!-- Bootstrap CSS Y Jqry Data tables CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.dataTables.min.css"/>
 
     <!-- Se cargan las librerias para Data-tables y exportación PDF -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
     <script src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js" type="text/javascript" ></script>
     <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js" type="text/javascript"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js" type="text/javascript"></script> 
     <!-- Fin de carga de librerias -->
</head>

<body>
<form action="../controladores/registro.controller.php" method="POST">
<div class="container border text-center">
    <h3 class="mt-3 mb-1">Registro Presupuesto Flete y Montaje</h3>
        <p class="mt-2 mr-2 d-inline">Sesión: <?php echo $_SESSION['user'];?></p><a href="../controladores/destroy.controller.php">Cerrar sesión</a>
        <div class="row mt-2">
            <div class="col-lg">Folio Easy Planner:</div>
            <div class="col-lg"><input type="number" min=0 name="folio"></div>
            <div class="col-lg">Fecha del evento: </div>
            <div class="col-lg"><input type="date" placeholder="D/M/A" name="fecha"></div>
            
        </div>

    <div class="row my-4">
        <div class="col-lg">Presupuesto para Flete: </div>
        <div class="col-lg"><input type="number" min=0 placeholder="MXN" name="flete"></div>
        <div class="col-lg">Presupuesto para Montaje: </div>
        <div class="col-lg"><input type="number" min=0 placeholder="MXN" name="montaje"></div>
    </div>

    <div class="row my-4">
        <div class="col-lg-3">Código Planner: </div>
        <div class="col-lg-3"><input type="text" min=0 placeholder="" name="codigo"></div>
    </div>

    <input type="submit" value="Guardar registro" class="btn btn-success mt-3 mb-5">
    <hr>
    <table class="table text-left" id="table1">
        <thead class="thead thead-dark">
            <h5>Mis folios registrados</h5>
            <tr>
                <th>Folio</th>
                <th>Cod. P1</th>
                <th>Fecha de evento</th>
                <th>Flete</th>
                <th>Montaje</th>
                <th>Owner</th>
                <th>Subido</th>
            </tr>
        </thead>
        <tbody>
            <?php //Construcción de tabla desde get_allitems - Archivo de funciones devuelve $datos	que pasamos a $resultados
            foreach ($resultados as $fila) {
                echo "<tr>";
                    echo "<td>".$fila['folio']."</td>";
                    echo "<td>".$fila['cod']."</td>";
                    echo "<td>".$fila['fechaEvento']."</td>";
                    echo "<td>".$fila['flete']."</td>";
                    echo "<td>".$fila['montaje']."</td>";
                    echo "<td>".$fila['user']."</td>";
                    echo "<td>".$fila['stamp']."</td>";
                echo "</tr>";	
            }//fin del foreach
?>	<!-- Fin de la ejecucion en PHP -->
        </tbody>
</div> 

</form>
</body>


<!-- Aplicamos el JS de data tables -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#table1').DataTable( {
            dom: 'Bfrtip',
            order: [[ 0, "desc" ]],
            pageLength : 15,
            buttons: ['copy', 'csv', 'excel']
               } 
        );
    });

</script>

</html>