<!-- Header -->
<?php require("cabecera.view.php");?>
<?php echo Xcrud::load_css() ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Main Sidebar Container -->

    <!-- Navbar -->
    <?php require("navbar.view.php")?> 
    <!-- Sidebar -->
    <?php require("sidebar.view.php");?> 

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <!-- Tarjeta de informacion del pago a proveedor -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Autorización de pago a proveedor:</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                 <?php echo $tablaPorAutorizar ?>
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