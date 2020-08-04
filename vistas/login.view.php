<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
    <form action="../controladores/login.controller.php" method="POST">
        <div class="container border pt-3 mt-5 text-center">
            <h6>Inicie sesión - Registro de folios para FYM P1</h6>
            <div class="mx-auto w-75 border mb-2">
                <label for="user">Usuario:</label>
                <input type="text" class="d-block mx-auto mb-2" placeholder="ejemplo: rpacheco" name="user">
                <label for="password">Password:</label>
                <input type="password" class="d-block mx-auto mb-2" placeholder="" name="password">
                <input type="submit" class="btn btn-primary d-block mx-auto mb-2" value="Iniciar sesión">
            </div>
        </div>
    </form>

</body>
</html>