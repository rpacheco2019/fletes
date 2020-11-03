<!-- Header -->
<?php require("cabecera.view.php");?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php require("navbar.view.php")?> 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require("sidebar.view.php");?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo registro</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Formulario de captura -->
    <form action="../controladores/NuevoRegistro.controller.php" method="POST">

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Por favor llene los datos del formulario:</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div class="container">
                          <div class="row mt-2">
                              <div class="col-lg">Folio Easy Planner:</div>
                              <div class="col-lg"><input type="number" class="form-control" min=0 name="folio" onkeyup="success()" id="key"></div>
                              <div class="col-lg">Fecha del evento: </div>
                              <div class="col-lg"><input type="date" class="form-control" placeholder="D/M/A" name="fecha"></div>
                          </div>

                          <div class="row my-4">
                              <div class="col-lg">Presupuesto para Flete: </div>
                              <div class="col-lg"><input type="number" class="form-control" min=0 placeholder="MXN" name="flete" required=""></div>
                              <div class="col-lg">Presupuesto para Montaje: </div>
                              <div class="col-lg"><input type="number" class="form-control" min=0 placeholder="MXN" name="montaje" required=""></div>
                          </div>

                          <div class="row my-4">
                              <div class="col-lg-3">Código Planner: </div>
                              <div class="col-lg-3"><input type="text" class="form-control" min=0 placeholder="" name="codigo"></div>
                          </div>

                          <input type="submit" id="button" value="Guardar registro" class="btn btn-success mt-3 mb-5">
                          <hr>
                    </div> 
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </form><!-- Fin de formulario -->
  
  <?php require("piePagina.view.php");?><!-- Pie de pagina -->

</div>
<!-- ./wrapper -->

<?php require("scripts.view.php");?><!-- Archivo de Scripts -->

</body>
</html>
