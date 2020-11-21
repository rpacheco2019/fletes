<!-- Header -->
<?php require("cabecera.view.php");?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php require("navbar.view.php")?> 

  <!-- Barra Sidebar -->
  <?php require("sidebar.view.php");?> 


  <!-- Content Wrapper. Aqui esta el contenido de la pagina -->
  <div class="content-wrapper">

    <!-- Header de la pagina -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo pago a proveedor</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Inicio FORM TYPE POST -->
    <form name="formPagoProveedor" enctype="multipart/form-data" action="../controladores/nuevoPago.controller.php" method="POST">
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h3 class="card-title">Por favor llene los datos del formulario:</h3>
                </div><!-- /.card-header -->

                <div class="card-body">
                  <legend>Pago a proveedor</legend>
                  <div class="form-row"><!-- Necesitamos form-row para aplicar las col de las cajas -->

                    <!-- Caja 1 -->
                    <div class="col-md-4">

                      <!-- Numero de factura-->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="numFactura">Numero de factura</label>
                        <div class="col-md-10">
                          <input id="numFactura" name="numFactura" type="text" placeholder="" class="form-control input-md" required="" autocomplete="off">
                          <span class="help-block">Se despliegan facturas cargadas para evitar duplicados:</span>  
                            <div id="suggestions" class="alert alert-danger">
                                  <!-- Aqui se generan automaticamente las sugerencias por JS -->
                            </div>
                        </div>
                      </div>

                      <!-- Subir factura -->
                      <div class="form-group">                    
                        <label class="col-md-10 control-label" for="btnSubirFactura">Subir factura (PDF,JPG,JPEG. MAX 2 MB)</label>
                        <div class="col-md-10">
                          <input id="btnSubirFactura" name="btnSubirFactura" class="input-file" type="file" required>
                        </div>
                      </div>
                      
                      <!-- Fecha de la factura -->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="fechaFactura">Fecha</label>  
                        <div class="col-md-10">
                          <input id="fechaFactura" name="fechaFactura" type="date" placeholder="" class="form-control input-md" required="">
                          <span class="help-block">Fecha impresa en la factura</span>  
                        </div>
                      </div>

                      <!-- Lista de proveedores -->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="proveedor">Proveedor</label>
                        <div class="col-md-10">
                          <select id="proveedor" name="proveedor" class="form-control">
                            <?php
                            foreach($proveedores as $fila){
                              echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
                            }
                            ?>
                            <!-- <option value="Abasteo MX">Abasteo MX</option>
                            <option value="Office Max">Office Max</option>
                            <option value="Flores Chiltepec">Flores Chiltepec</option> -->
                          </select>
                        </div>
                      </div>

                      <!-- Estado del pago a proveedor HIDDEN -->
                      <div class="form-group">
                        <label class="col-md-6 control-label" for="estado" hidden>Estado</label>
                        <div class="col-md-6">
                          <select id="estado" name="estado" class="form-control" hidden>
                            <option value="Pendiente">Pendiente</option>
                          </select>
                        </div>
                      </div>

                      <!-- Tipo de pago a proveedor -->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="tipo">Pago a proveedor para:</label>
                        <div class="col-md-10">
                          <select id="tipo" name="tipo" class="form-control">
                            <option value="Gasto">Gasto interno</option>
                            <option value="Evento">Evento</option>
                          </select>
                        </div>
                      </div>

                      <!-- concepto -->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="concepto">Concepto</label>
                        <div class="col-md-10">                     
                          <textarea class="form-control" id="concepto" name="concepto" required=""></textarea>
                        </div>
                      </div>

                    </div><!-- Fin Col caja 1 -->

                    <!-- Caja 2 -->
                    <div class="col-md-4">

                      <!-- Select Cuenta de gasto -->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="cuentaGasto">Cuenta de gasto</label>
                        <div class="col-md-10">
                          <select id="cuentaGasto" name="cuentaGasto" class="form-control">
                            <?php
                              foreach($cuentasContables as $fila){
                                echo "<option value=".$fila['id'].">".substr($fila['nombreGrupo'],0,2).".".substr($fila['nombreSubGrupo'],0,2).".".$fila['nombreCuenta']."</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <!-- Valor factura-->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="valor">Total de la factura sin IVA</label>  
                        <div class="col-md-10">
                        <input id="valor" name="valor" onkeyup="calcularIVA()" type="number" min=0 step=".01" placeholder="" class="form-control input-md" required=""> 
                        </div>
                      </div>

                      <!--Checkbox Incluir IVA -->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="incluirIVA">Incluir IVA?</label>
                        <div class="col-md-10">
                          <div class="checkbox">
                            <label for="incluirIVA-0">
                              <input type="checkbox" name="incluirIVA" id="incluirIVA-0" value="SI" onclick="calcularIVA()">
                              Si
                            </label>
                          </div>
                          <p class="d-inline">Total con IVA: </p>
                          <input type="num" id="totalConIVA" name="totalConIVA" readonly="readonly" placeholder="...">
                        </div>
                      </div>

                      <!-- Input tipo de pago -->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="tipoPago">Tipo de pago</label>
                        <div class="col-md-10">
                          <select id="tipoPago" name="tipoPago" class="form-control">
                            <option value="Credito">Credito</option>
                            <!-- <option value="Comprobacion tarjeta empresarial">Comprobacion tarjeta empresarial</option> -->
                            <option value="Reembolso">Reembolso</option>
                            <option value="Comprobacion de anticipo">Comprobacion de anticipo</option>
                          </select>
                        </div>
                      </div>

                      <!-- input Forma de pago -->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="formaPago">Forma de pago</label>
                        <div class="col-md-10">
                          <select id="formaPago" name="formaPago" class="form-control">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Tarjeta empresarial">Tarjeta empresarial</option>
                          </select>
                        </div>
                      </div>

                      <!-- Fecha Promesa de pago-->
                      <div class="form-group">
                        <label class="col-md-10 control-label" for="promesaPago">Fecha tentativa de pago</label>  
                        <div class="col-md-10">
                        <input id="promesaPago" name="promesaPago" type="date" placeholder="" class="form-control input-md" required=""> 
                        </div>
                      </div>

                    </div><!-- Fin caja 2 -->

                  </div><!-- Fin Form Row -->
                  
                  <!-- Boton Guardar -->
                  <div class="form-group">
                    <label class="col-md-6 control-label" for="singlebutton">Verifique todos los datos antes de guardar</label>
                    <div class="col-md-6">
                      <button id="pbutton" name="pbutton" class="btn btn-primary">Guardar</button>
                    </div>
                  </div>

                </div><!-- /.card-body -->
              </div><!-- /.card -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
    </form>

  </div><!-- /.content-wrapper -->

  <?php require("piePagina.view.php");?><!-- Pie de pagina -->

</div><!-- ./wrapper principal -->

<?php require("scripts.view.php");?><!-- Archivo de Scripts -->

</body>
</html>