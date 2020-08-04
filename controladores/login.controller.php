<?php
session_start();

/* VALIDAMOS SI YA ESTA LOGUEADO Y LO MANDAMOS AL PANEL DE REGISTROS */
if(@$_SESSION['user']){
    header('Location:registro.controller.php');
        die();  
}

/* EVALUAMOS SI VENIMOS DE POST */
if($_POST){
    /* EVALUAMOS CAMPOS EN BLANCO EN EL FORMULARIO */
    if(empty($_POST['user']) || empty($_POST['password'])){
        header('Location:login.controller.php');
        die();
    }

    /* CARGAMOS MODELOS SQL PARA LOGIN */
    require("../modelos/modelo.php");
    $resultado = login($_POST['user'],$_POST['password']);

    /* EVALUAMOS SI EXISTE EL USUARIO PARA CARGAR VARIABLE DE SESION */
    if(!empty($resultado)){
        $_SESSION['user'] = $resultado['user'];
        header('Location:registro.controller.php');
    }else{
        header('Location:login.controller.php');//SI NO EXISTE, MANDAMOS DE NUEVO A LOGIN
        die();
    }
}else{//SI NO VENIMOS DE POST, LLAMAMOS LA VISTA
    require("../vistas/login.view.php");
}

?>