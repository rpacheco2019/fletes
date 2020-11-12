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
            <h1>Nuevo pago a proveedor</h1>
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
    <form enctype="multipart/form-data" action="../controladores/nuevoPago.controller.php" method="POST">

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
                  <!-- <div class="container"> -->
                    <!-- <fieldset> -->

                      <!-- Form Name -->
                      <legend>Pago a proveedor</legend>

                      <!-- Numero de factura-->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="numFactura">Numero de factura</label>  
                        <div class="col-md-4">
                        <input id="numFactura" name="numFactura" type="text" placeholder="" class="form-control input-md" required="" autocomplete="off">
                        <span class="help-block">Se despliegan facturas cargadas para evitar duplicados:</span>  
                          <div id="suggestions" class="alert alert-danger">
                                <!-- Aqui se generan automaticamente las sugerencias por JS -->
                          </div>
                        </div>
                      </div>

                      <!-- Subir Factura --> 
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="btnSubirFactura">Subir factura</label>
                        <div class="col-md-4">
                          <input id="btnSubirFactura" name="btnSubirFactura" class="input-file" type="file" required>
                        </div>
                      </div>

                      <!-- Fecha Factura-->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="fechaFactura">Fecha</label>  
                        <div class="col-md-4">
                        <input id="fechaFactura" name="fechaFactura" type="date" placeholder="" class="form-control input-md" required="">
                        <span class="help-block">Fecha impresa en la factura</span>  
                        </div>
                      </div>

                      <!-- proveedores -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="proveedor">Proveedor</label>
                        <div class="col-md-4">
                          <select id="proveedor" name="proveedor" class="form-control">
                            <option value="Abasteo MX">Abasteo MX</option>
                            <option value="Office Max">Office Max</option>
                            <option value="Flores Chiltepec">Flores Chiltepec</option>
                          </select>
                        </div>
                      </div>

                      <!-- estado del pp -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="estado">Estado</label>
                        <div class="col-md-4">
                          <select id="estado" name="estado" class="form-control">
                            <option value="Pendiente">Pendiente</option>
                          </select>
                        </div>
                      </div>

                      <!-- Tipo de PP ADM/EVENTO -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="tipo">Pago a proveedor para:</label>
                        <div class="col-md-4">
                          <select id="tipo" name="tipo" class="form-control">
                            <option value="Gasto">Gasto interno</option>
                            <option value="Evento">Evento</option>
                          </select>
                        </div>
                      </div>

                      <!-- Cuenta de gastos -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="tipoGasto">Cuenta de gasto</label>
                        <div class="col-md-4">
                          <select id="tipoGasto" name="tipoGasto" class="form-control">
                            <option value="CH - Uniformes">CH - Uniformes</option>
                            <option value="GASTOS EVENTO">GASTOS EVENTO</option>
                            <option value="OPERACIONES - Mantenimiento">OPERACIONES - Mantenimiento</option>
                            <option value="SISTEMAS - Equipos de computo">SISTEMAS - Equipos de computo</option>
                          </select>
                        </div>
                      </div>

                      <!-- Valor factura-->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="valor">Total de la factura sin IVA</label>  
                        <div class="col-md-4">
                        <input id="valor" name="valor" type="number" min=0 step=".01" placeholder="" class="form-control input-md" required=""> 
                        </div>
                      </div>


                      <!-- Incluir IVA -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="checkboxes">Incluir IVA?</label>
                        <div class="col-md-4">
                        <div class="checkbox">
                          <label for="checkboxes-0">
                            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            Si
                          </label>
                        </div>
                        </div>
                      </div>

                      <!-- Forma de pago -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="formaPago">Tipo de pago</label>
                        <div class="col-md-4">
                          <select id="formaPago" name="formaPago" class="form-control">
                            <option value="Credito">Credito</option>
                            <!-- <option value="Comprobacion tarjeta empresarial">Comprobacion tarjeta empresarial</option> -->
                            <option value="Reembolso">Reembolso</option>
                            <option value="Comprobacion de anticipo">Comprobacion de anticipo</option>
                          </select>
                        </div>
                      </div>

                      <!-- Tipo de pago -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="formaPago">Forma de pago</label>
                        <div class="col-md-4">
                          <select id="formaPago" name="formaPago" class="form-control">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Tarjeta empresarial">Tarjeta empresarial</option>
                          </select>
                        </div>
                      </div>


                      <!-- Promesa de pago-->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="promesaPago">Fecha tentativa de pago</label>  
                        <div class="col-md-4">
                        <input id="promesaPago" name="promesaPago" type="date" placeholder="" class="form-control input-md" required=""> 
                        </div>
                      </div>

                      <!-- concepto -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="concepto">Concepto</label>
                        <div class="col-md-4">                     
                          <textarea class="form-control" id="concepto" name="concepto" required=""></textarea>
                        </div>
                      </div>

                      <!-- Button -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Verifique todos los datos antes de guardar</label>
                        <div class="col-md-4">
                          <button id="pbutton" name="pbutton" class="btn btn-primary">Guardar</button>
                        </div>
                      </div>

                      <!-- </fieldset> -->
                    <!-- </div> --> <!-- .Container -->
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
