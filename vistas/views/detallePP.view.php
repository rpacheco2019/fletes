<!-- Header -->
<?php require("cabecera.view.php");?>
<?php echo Xcrud::load_css() ?>

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
              <h5>
                Folio:
                <?php echo $id;?> -
                Factura: <?php echo " ".$resultados['numeroFactura'];?>
              </h5>
              <!-- Modal de solicitar autorizacion -->
              <?php
              if($resultados['estado']=='Pendiente'){
              require("modalSolicitarAutorizacion.view.php");
              }
              ?>
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
              <h3 class="card-title">Informacion del pago a proveedor: [<?php echo $resultados['tipo'];?>]</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div class="form-row">
                  <div class="col-md-3">
                    <p>Subtotal: $<?php echo $resultados['totalFactura'];?></p>
                    <p>Agregar IVA: <?php echo $resultados['incluirIVA'];?></p>
                    <p>Total: $<?php echo $resultados['totalConIVA'];?></p>
                  </div>
                  <div class="col-md-3">
                    <p>Fecha de la factura: <?php echo $resultados['fechaFactura'];?></p>
                    <p>Tentativa de pago: <?php echo $resultados['fechaPromesa'];?></p>
                    <p>Estado: <?php echo $resultados['estado'];?></p>
                  </div>
                  <div class="col-md-3">
                    <p>Proveedor: <?php echo $resultados['proveedor'];?></p>
                    <p>Ver factura: <a href="<?php echo $resultados['imgPath'];?>">Factura</a></p>
                  </div>
                  <div class="col-md-3">
                    <p>Creado: <?php echo $resultados['stamp'];?></p>
                    <p>Creado por: <?php echo $resultados['creadoPor'];?></p>
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-lg">
                  <p>Cuenta Contable: <?php echo substr($cuentaContable['nombreSubGrupo'],0,2).".".substr($cuentaContable['nombreSubGrupo'],0,2).".".$cuentaContable['nombreCuenta'];?></p>
                  </div>
                </div>

                <div class="form-row">
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
              <!-- Se genera tabla de autorizaciones por XCRUD -->
              <?php echo $tableAutorizaciones?>
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->

          <!-- Tarjeta de tabla de registros -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">+</h3>
                <!-- Modal para agregar gastos a PP -->
                <?php
                if($resultados['estado'] == 'Pendiente' && $resultados['tipo'] == 'Evento'){
                  require("modalGastoPP.view.php");
                }
                ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Tabla de asignaciones con XCRUD -->
              <div class="table-responsive">
                <?php 
                  echo $xcrud;
                ?>
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
<?php echo Xcrud::load_js() ?>

</body>
</html>
