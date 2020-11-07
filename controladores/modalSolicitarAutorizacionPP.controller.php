<?php
session_start();

/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

if($_POST){//SI VENIMOS DE POST

    /* LLAMAMOS LOS MODELOS SQL PARA INSERTAR EL FOLIO + EL USUARIO SESION LOGUEADO */
    require("../modelos/modelo.php");
    solicitarAutorizacionPP($_POST['idPPmodal'],SESSION['user']);
    
    //AL TERMINAR MANDAMOS A LA TABLA DE REGISTROS
    header('Location:detallePP.controller.php?id='.$_POST['idPPmodal']);

}else{// SI NO VIENE DE POST , LE MOSTRAMOS EL FORMULARIO DE CAPTURA
        /* require("../vistas/views/nuevoPago.view.php"); */
}

?>