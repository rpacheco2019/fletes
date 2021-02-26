<!-- Ver registros FYM -->

<?php
session_start();

/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

if($_POST){//SI VENIMOS DE POST

    
}else{// SI NO VIENE DE POST , OBTENEMOS USERTYPE Y MOSTRAMOS TODOS O SOLO SUS REGISTROS
    require("../modelos/modelo.php");

    if($_SESSION['type'] == 'user'){
        $user = $_SESSION['user'];
        $resultados = getRegistrosByUser($user);
        require("../vistas/views/registro.view.php");
    }else{
        $resultados = getRegistros();
        require("../vistas/views/registro.view.php");
    }
    
}

?>
