<?php
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

    /* LLAMAMOS LOS MODELOS SQL PARA INSERTAR EL FOLIO + EL USUARIO SESION LOGUEADO */
    require("../modelos/modelo.php");
    guardarPago($_POST['numFactura'],$_POST['fechaFactura'],$_POST['proveedor'],$_POST['valor'],$_POST['concepto'],$_SESSION['user']);
    
    //AL TERMINAR MANDAMOS A LA TABLA DE REGISTROS
    header('Location:pagos.controller.php');

}else{// SI NO VIENE DE POST , LE MOSTRAMOS EL FORMULARIO DE CAPTURA
        require("../vistas/views/nuevoPago.view.php");
}

?>