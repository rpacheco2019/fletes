<!-- Header -->
<?php require("cabecera.view.php");?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->

  <!-- Navbar -->
<?php require("navbar.view.php")?> 

<?php require("sidebar.view.php");?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ver registros</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">La tabla se ordena por los registros mas nuevos.</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Folio</th>
                      <th>Cod. P1</th>
                      <th>Fecha de evento</th>
                      <th>Flete MXN</th>
                      <th>Montaje MXN</th>
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
                                  echo "<td>$".$fila['flete']."</td>";
                                  echo "<td>$".$fila['montaje']."</td>";
                                  echo "<td>".$fila['user']."</td>";
                                  echo "<td>".$fila['stamp']."</td>";
                              echo "</tr>";	
                          }//fin del foreach
                      ?>	<!-- Fin de la ejecucion en PHP -->
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Folio</th>
                      <th>Cod. P1</th>
                      <th>Fecha de evento</th>
                      <th>Flete</th>
                      <th>Montaje</th>
                      <th>Owner</th>
                      <th>Subido</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- Div table responsive -->
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

  <?php require("piePagina.view.php");?><!-- Pie de pagina -->

</div>
<!-- ./wrapper -->


<?php require("scripts.view.php");?><!-- Archivo de Scripts -->

</body>
</html>
