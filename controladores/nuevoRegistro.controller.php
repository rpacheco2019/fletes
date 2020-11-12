<?php
session_start();

/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

if($_POST){//SI VENIMOS DE POST

    /* CICLAMOS EL FORM SI VIENEN CAMPOS VACIOS */
    if (empty($_POST['folio']) || empty($_POST['fecha']) || $_POST['flete'] =="" || $_POST['montaje']=="") {
        header('Location:nuevoRegistro.controller.php');
        die();
    } 

    /* LLAMAMOS LOS MODELOS SQL PARA INSERTAR EL FOLIO + EL USUARIO SESION LOGUEADO */
    require("../modelos/modelo.php");
    InsertarFolio($_POST['folio'],$_POST['fecha'],$_POST['flete'],$_POST['montaje'],$_SESSION['user'],$_POST['codigo'],$_POST['viaticos']);
    header('Location:registro.controller.php');//AL TERMINAR MANDAMOS A LA MISMA PAGINA

}else{// SI NO VIENE DE POST , LE MOSTRAMOS EL FORMULARIO DE CAPTURA
        require("../vistas/views/nuevoRegistro.view.php");
}

?>
