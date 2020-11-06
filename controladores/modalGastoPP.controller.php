<?php
session_start();

/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

if($_POST){//SI VENIMOS DE POST

    /* CICLAMOS EL FORM SI VIENEN CAMPOS VACIOS */
    if (empty($_POST['folioEP']) || empty($_POST['codigoPlanner']) || $_POST['valorAsignacion'] =="") {
        header('Location:nuevoPago.controller.php');
        die();
    } 

    /* LLAMAMOS LOS MODELOS SQL PARA INSERTAR EL FOLIO + EL USUARIO SESION LOGUEADO */
    require("../modelos/modelo.php");
    guardarAsignacionPP($_POST['idPPmodal'],$_POST['folioEP'],$_POST['codigoPlanner'],$_POST['valorAsignacion'],$_SESSION['user'],$_POST['comentarios']);
    
    //AL TERMINAR MANDAMOS A LA TABLA DE REGISTROS
    header('Location:detallePP.controller.php?id='.$_POST['idPPmodal']);

}else{// SI NO VIENE DE POST , LE MOSTRAMOS EL FORMULARIO DE CAPTURA
        /* require("../vistas/views/nuevoPago.view.php"); */
}

?>