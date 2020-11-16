<?php
session_start();

/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

if($_POST){//SI VENIMOS DE POST

}else{// SI NO VIENE DE POST MOSTRAMOS LA TABLA USUARIOS POR XCRUD
    if($_SESSION['type'] == "admin"){
        require("../vistas/views/usuarios.view.php");
    }else{
        echo "No tienes permisos para entrar aqui";
    }
}

?>