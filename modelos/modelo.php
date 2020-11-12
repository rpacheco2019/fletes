<?php

$nombreBase = "fletes";
$usuarioBase = "root";
$passwordBase = "";

function getRegistros(){

   global $nombreBase;
   global $usuarioBase;
   global $passwordBase;

    try {

        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        
        /* SQL Qry */
		$statement = $conn->prepare("SELECT * FROM registros");
        
        /* Execute */
        $statement->execute();
        $datos = $statement->fetchAll();
        return $datos;
        
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}
}

function getRegistrosByUser($user){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        
        /* SQL Qry */
		$statement = $conn->prepare("SELECT * FROM registros where user='$user'");
        
        /* Execute */
        $statement->execute();
        $datos = $statement->fetchAll();
        return $datos;
        
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}
}


function InsertarFolio($folio,$fechaEvento,$flete,$montaje,$user,$cod,$viaticos){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        
        /* SQL Qry */
		$statement = $conn->prepare("INSERT INTO registros (folio,fechaEvento,flete,montaje,user,cod,viaticos)
        VALUES($folio,'$fechaEvento',$flete,$montaje,'$user','$cod',$viaticos) ");
        
        /* Execute */
		$statement->execute();
		
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}
}

function login($usuario,$password){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        
        /* SQL Qry */
		$statement = $conn->prepare("SELECT * FROM usuarios where user='$usuario' and pass='$password'");
        
        /* Execute */
        $statement->execute();
        $datos = $statement->fetch();
        return $datos;
        
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}


}


function guardarPago($numFactura,$estado,$fechaFactura,$fechaPromesa,$proveedor,$tipo,$valor,$concepto,$user){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* SQL Qry */
		$statement = $conn->prepare("INSERT INTO pagoproveedor (numeroFactura,estado,fechaFactura,fechaPromesa,proveedor,tipo,totalFactura,concepto,creadoPor)
        VALUES('$numFactura','$estado','$fechaFactura','$fechaPromesa','$proveedor','$tipo',$valor,'$concepto','$user') ");
        
        /* Execute */
        $statement->execute();
		
	} catch (PDOException $e) {
        echo "Error Try Mysql: ".$e->getMessage();
	}
}

/* Agregamos los registros de pagos a proveedores */
function registroPago(){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* SQL Qry */
		$statement = $conn->prepare("SELECT * FROM pagoproveedor");
        
        /* Execute */
        $statement->execute();
        $datos = $statement->fetchAll();
        return $datos;
		
	} catch (PDOException $e) {
        echo "Error Try Mysql: ".$e->getMessage();
	}
}

/* Obtenemos toda la informacion de un PP por ID del mismo */
function getDetallePP($id){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* SQL Qry */
		$statement = $conn->prepare("SELECT * FROM pagoproveedor WHERE id=".$id."");
        
        /* Execute */
        $statement->execute();
        $datos = $statement->fetch();
        return $datos;
        
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}

}

/* Obetenemos todos los gastos a evento por numero de PP asociados */
function getEventoPP($id){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* SQL Qry */
		$statement = $conn->prepare("SELECT * FROM valoreventos WHERE idPP=".$id."");
        
        /* Execute */
        $statement->execute();
        $datos = $statement->fetchAll();
        return $datos;
        
	} catch (PDOException $e) {
		echo "Error Try Mysql: ".$e->getMessage();
	}

}

/* Guardamos el la asignacion de gasto de eventos a un PP */
function guardarAsignacionPP($idPP,$folioEP,$codigoPlanner,$valorAsignacion,$user,$comentario){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* SQL Qry */
		$statement = $conn->prepare("INSERT INTO valoreventos (idPP,folioEP,codigoPlanner,valor,user,comentario)
        VALUES($idPP,$folioEP,'$codigoPlanner',$valorAsignacion,'$user','$comentario') ");
        
        /* Execute */
        $statement->execute();
		
	} catch (PDOException $e) {
        echo "Error Try Mysql: ".$e->getMessage();
	}
}

/* Solicitar autorizacion de un PP */

function solicitarAutorizacionPP($idPP,$user){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* SQL Qry */
		$statement = $conn->prepare("UPDATE pagoproveedor SET estado='Solicitado',solicitadoPor='$user'
        WHERE id=$idPP ");
        
        /* Execute */
        $statement->execute();
		
	} catch (PDOException $e) {
        echo "Error Try Mysql: ".$e->getMessage();
	}
}

/* Este Qry es el select distinc para sacar el registro mas nuevo de cada vendedora de forma automatica
SELECT DISTINCT registros.folio AS newfolio,cod,fechaEvento,flete,montaje,USER,max(stamp) FROM registros GROUP BY stamp DESC;
*/

?>