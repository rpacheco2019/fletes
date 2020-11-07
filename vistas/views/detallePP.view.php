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
              <h5>Estado: <?php echo " ".$resultados['estado'];?></h5>

              <!-- Modal de solicitar autorizacion -->
              <?php
              if($resultados['estado']=='Pendiente'){
              require("modalSolicitarAutorizacion.view.php");
              }
              ?>

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
              <h3 class="card-title">Informacion del pago a proveedor: <?php echo $resultados['tipo'];?></h3>
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
                    <p>Promesa: <?php echo $resultados['fechaPromesa'];?></p>
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
              <h3 class="card-title mt-2">Asignacion de gasto a Evento:</h3>
                <!-- Modal para agregar gastos a PP -->
                <?php
                if($resultados['estado'] == 'Pendiente' && $resultados['tipo'] == 'Evento'){
                  require("modalGastoPP.view.php");
                }
                ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
              <div class="table-responsive">
                <table id="pagos" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Folio EP</th>
                      <th>Cod. Planner</th>
                      <th>Valor Asignado</th>
                      <th>Owner</th>
                      <th>Alta</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php //Construcción de tabla desde get_allitems - Archivo de funciones devuelve $datos	que pasamos a $resultados
                          $totalGastosEventos = 0;
                          foreach ($resultadosEventoPP as $fila) {
                              echo "<tr>";
                                  echo "<td>".$fila['id']."</td>";
                                  echo "<td>".$fila['folioEP']."</td>";
                                  echo "<td>".$fila['codigoPlanner']."</td>";
                                  echo "<td>$".$fila['valor']."</td>";
                                  echo "<td>".$fila['user']."</td>";
                                  echo "<td>".$fila['stamp']."</td>";
                                  $totalGastosEventos += $fila['valor'];
                              echo "</tr>";	
                          }//fin del foreach
                      ?>	<!-- Fin de la ejecucion en PHP -->
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>ID</th>
                      <th>Folio EP</th>
                      <th>Cod. Planner</th>
                      <th><h5><span class="badge bg-success">$<?php echo $totalGastosEventos;?></span></h5></th>
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
