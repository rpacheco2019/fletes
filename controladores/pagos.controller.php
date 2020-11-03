<?php
session_start();

/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

if($_POST){//SI VENIMOS DE POST


}else{// SI NO VIENE DE POST , LE MOSTRAMOS TODOS SUS REGISTROS
    require("../modelos/modelo.php");
    if($_SESSION['type'] == 'user'){
        $user = $_SESSION['user'];
        $resultados = registroPago();
        require("../vistas/views/pagos.view.php");
    }else{
        $resultados = registroPago();
        require("../vistas/views/pagos.view.php");
    }

}




?>