<!-- XCRUD FILE -->
<?php
    include('../xcrud/xcrud.php');
?>
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
            <h1>Menu Maestro - Proceder con precaución</h1>
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
              <h3 class="card-title">Level - Admin</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <!-- Tabla de usuarios -->
                <?php 
                $xcrud= Xcrud::get_instance()->table('usuarios')->unset_remove();
                $xcrud->columns('user,nombre,departamento');
                $xcrud->change_type('departamento','select','black,white',array(
                    'values'=>
                            'ADMINISTRACION,
                            CAPITAL HUMANO,
                            DIRECCION,
                            COMERCIAL,
                            LOGISTICA,
                            OPERACIONES,
                            SISTEMAS
                            '));
                $xcrud->change_type('type','select','black,white',array(
                    'values'=>
                            'user,
                            report,
                            admin
                            '));
                echo $xcrud;
                ?>
                <!-- Tabla de proveedores -->
                <?php 
                $xcrud2= Xcrud::get_instance()->table('proveedores')->unset_remove();
                $xcrud2->columns('nombre,RFC,codigoPostal');
                echo $xcrud2;
                ?>

                <!-- Tabla de cuentas contables -->
                <?php 
                $xcrud3= Xcrud::get_instance()->table('cuentascontables')->unset_remove();
                $xcrud3->change_type('nombreGrupo','select','black,white',array(
                  'values'=>
                          '00 - COSTOS DE VENTAS,
                          01 - GASTOS CAPITAL HUMANO,
                          02 - GASTOS DIRECCION GENERAL,
                          03 - GASTOS FACILITIES,
                          04 - GASTOS ADMINISTRACION,
                          05 - GASTOS VENTAS Y MARKETING,
                          06 - GASTO COORPORATIVO - GRUPO PLANNER
                          '));
                $xcrud3->change_type('nombreSubGrupo','select','black,white',array(
                  'values'=>
                          '01 - COSTO COMERCIAL,
                          02 - COSTOS DE ALMACEN BODEGA Y CRISTALERIA,
                          03 - COSTO FLORES,
                          04 - COSTOS LOGISTICA,
                          05 - COSTOS PRODUCCION,
                          06 - COSTOS COMPRAS,
                          07 - COSTOS PLANEACION,
                          08 - COSTOS CAPITAL HUMANO,
                          09 - EGRESOS U.S.A,
                          01 - SUELDOS Y SALARIOS,
                          02 - UNIFORMES RECLUTAMIENTO Y CAPACITACION,
                          03 - PATROCINIOS Y ENTRETENMIENTO,
                          04 - SALUD Y SEGURIDAD DEL TRABAJO,
                          01 - VIAJES,
                          02 - SERVICIOS DE CONSULTORIAS,
                          01 - SERVICIOS GENERALES,
                          02 - MANTENIMIENTO,
                          03 - OFICINAS,
                          04 - EQUIPOS DE COMPUTO,
                          01 - SEGUROS,
                          02 - GESTORIAS,
                          03 - COMISIONES BANCARIAS,
                          04 - VEHICULOS,
                          05 - DEPRECIACION.
                          01 - PUBLICIDAD Y PROPAGANDA,
                          02 - ASISTENCIA AL CLIENTE,
                          01 - GASTOS GENERALES,
                          02 - INVERSIONES
                          '));
                  $xcrud3->change_type('departamento','select','black,white',array(
                    'values'=>
                            'ADMINISTRACION,
                            BODEGA,
                            CAPITAL HUMANO,
                            COMERCIAL,
                            COMPRAS,
                            DIRECCION,
                            FLORES,
                            LOGISTICA,
                            PRODUCCION,
                            PLANEACION,
                            TODOS
                            '));
                echo $xcrud3;
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


<!-- Archivo de Scripts -->
<?php require("scripts.view.php");?>
<?php echo Xcrud::load_js() ?> 

</body>
</html>