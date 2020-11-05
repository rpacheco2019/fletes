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
              <h1>
                PP Folio:
                <?php echo $id;
                echo " - ".$resultados['numeroFactura'];
                ?>
              </h1>
              <h5><span class="badge bg-success">
                Estado:
                <?php echo " ".$resultados['estado'];
                ?>
              </span></h5>
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
        <!-- Tarjeta de informacion del pago a proveedor -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title badge bg-primary">Informacion del pago a proveedor: <?php echo $resultados['concepto'];?></h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div class="row">
                  <div class="col-lg">
                    <p>Valor de factura: $<?php echo $resultados['totalFactura'];?></p>
                  </div>
                  <div class="col-lg">
                    <p>Fecha de la factura: <?php echo $resultados['fechaFactura'];?></p>
                  </div>
                  <div class="col-lg">
                    <p>Proveedor: <?php echo $resultados['proveedor'];?></p>
                  </div>
                  <div class="col-lg">
                    <p>Creado: <?php echo $resultados['stamp'];?></p>
                  </div>
                  <div class="col-lg">
                    <p>Creado por: <?php echo $resultados['creadoPor'];?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg">
                   <p>Concepto: <?php echo $resultados['concepto'];?></p>
                  </div>
                </div>

            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->

          <!-- Tarjeta de autorizaciones -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registro de autorizaciones:</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div class="row">
                  <div class="col-lg">
                    <p>Autorizado por: </p>
                  </div>
                  <div class="col-lg">
                    <p>Fecha autorización:</p>
                  </div>
                  <div class="col-lg">
                    <p>Pagado por:</p>
                  </div>
                  <div class="col-lg">
                    <p>Fecha de pago:</p>
                  </div>
                  <div class="col-lg">
                    <p>Cancelado por:</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                   <p>Fecha de cancelación:</p>
                  </div>
                </div>

            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->


          <!-- Tarjeta de tabla de registros -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Asignacion de gasto a Evento:</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="pagos" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Folio</th>
                      <th>Estado</th>
                      <th>Factura</th>
                      <th>Fecha F.</th>
                      <th>Proveedor</th>
                      <th>Total</th>
                      <th>Owner</th>
                      <th>Alta</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php //Construcción de tabla desde get_allitems - Archivo de funciones devuelve $datos	que pasamos a $resultados
                          foreach ($resultados as $fila) {
                              /* echo "<tr>";
                                  echo "<td>".$fila['id']."</td>";
                                  echo "<td><span class='badge bg-success'>".$fila['estado']."</span></td>";
                                  echo "<td>".$fila['numeroFactura']."</td>";
                                  echo "<td>".$fila['fechaFactura']."</td>";
                                  echo "<td>".$fila['proveedor']."</td>";
                                  echo "<td>$".$fila['totalFactura']."</td>";
                                  echo "<td>".$fila['creadoPor']."</td>";
                                  echo "<td>".$fila['stamp']."</td>";
                              echo "</tr>";	 */
                          }//fin del foreach
                      ?>	<!-- Fin de la ejecucion en PHP -->
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Folio</th>
                      <th>Estado</th>
                      <th>Factura</th>
                      <th>Fecha F.</th>
                      <th>Proveedor</th>
                      <th>Total</th>
                      <th>Owner</th>
                      <th>Alta</th>
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
