<?php
session_start();

/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

require("../modelos/modelo.php");
    if($_SESSION['type'] == 'user'){
        $user = $_SESSION['user'];
        $id = $_GET['id'];
        $resultados = getDetallePP($id);
        $resultadosEventoPP = getEventoPP($id);
        require("../vistas/views/detallePP.view.php");
    }else{
        $id = $_GET['id'];
        $resultados = getDetallePP($id);
        $resultadosEventoPP = getEventoPP($id);
        require("../vistas/views/detallePP.view.php");
    }


?>