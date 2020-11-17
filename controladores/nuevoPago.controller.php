<?php
include('../xcrud/xcrud.php');
session_start();


/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

if($_POST){//SI VENIMOS DE POST

    /* CICLAMOS EL FORM SI VIENEN CAMPOS VACIOS */
    if (empty($_POST['numFactura']) || empty($_POST['proveedor']) || $_POST['valor'] =="" || $_POST['concepto']=="") {
        header('Location:nuevoPago.controller.php');
        die();
    } 

    /* Carga de archivo factura */
    if(isset($_FILES['btnSubirFactura'])){
        $errors= array();
        $file_name = $_FILES['btnSubirFactura']['name'];
        $file_size =$_FILES['btnSubirFactura']['size'];
        $file_tmp =$_FILES['btnSubirFactura']['tmp_name'];
        $file_type=$_FILES['btnSubirFactura']['type'];
        @$file_ext=strtolower(end(explode('.',$_FILES['btnSubirFactura']['name'])));
        
        $extensions= array("jpeg","jpg","png","pdf");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="No se permite esa extension, solo jpg,jpeg, png o pdf.";
        }
        
        if($file_size > 2097152){
           $errors[]='Archivo debe de pesar menos de 2mb';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"../facturas/".$file_name);
           echo "Success";
        }else{
           print_r($errors);
        }
    
     }

    /* Fin de carga de archivo factura */

    /* LLAMAMOS LOS MODELOS SQL PARA INSERTAR EL FOLIO + EL USUARIO SESION LOGUEADO */
    require("../modelos/modelo.php");
    guardarPago($_POST['numFactura'],$_POST['estado'],$_POST['fechaFactura'],$_POST['promesaPago'],$_POST['proveedor'],$_POST['tipo'],$_POST['valor'],$_POST['concepto'],$_SESSION['user'],$_POST['tipoPago'],$_POST['formaPago'],$_POST['incluirIVA'],$_POST['totalConIVA'],$_POST['cuentaGasto']);
    header('Location:pagos.controller.php');

}else{// SI NO VIENE DE POST , LE MOSTRAMOS EL FORMULARIO DE CAPTURA
    /* Preguntamos si es admin para mostrar las cuentas todas las cuentas contables */  
      if($_SESSION['type'] == "admin"){
         /* Generamos el select para la lista de proveedores */
         $db=Xcrud_db::get_instance();
         $db->query("SELECT * FROM proveedores");
         $proveedores = $db->result();

         /* Geramos el select de las cuentas contables */
         $db2=Xcrud_db::get_instance();
         $db2->query("SELECT * FROM cuentascontables");
         $cuentasContables = $db2->result();
      }else{
         /* Generamos el select para la lista de proveedores */
         $db=Xcrud_db::get_instance();
         $db->query("SELECT * FROM proveedores");
         $proveedores = $db->result();

         /* Geramos el select de las cuentas contables */
         $db2=Xcrud_db::get_instance();
         $db2->query("SELECT * FROM cuentascontables WHERE departamento = '".$_SESSION['depto']."' OR departamento='TODOS'");
         $cuentasContables = $db2->result();
         
      }

      require("../vistas/views/nuevoPago.view.php");
}/* Fin POST */

?>