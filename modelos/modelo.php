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


function InsertarFolio($folio,$fechaEvento,$flete,$montaje,$user,$cod){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        
        /* SQL Qry */
		$statement = $conn->prepare("INSERT INTO registros (folio,fechaEvento,flete,montaje,user,cod)
        VALUES($folio,'$fechaEvento',$flete,$montaje,'$user','$cod') ");
        
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


function guardarPago($numFactura,$fechaFactura,$proveedor,$valor,$concepto,$user){

    global $nombreBase;
    global $usuarioBase;
    global $passwordBase;

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname='.$nombreBase,$usuarioBase,$passwordBase);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* SQL Qry */
		$statement = $conn->prepare("INSERT INTO pagoproveedor (numeroFactura,fechaFactura,proveedor,totalFactura,concepto,creadoPor)
        VALUES('$numFactura','$fechaFactura','$proveedor',$valor,'$concepto','$user') ");
        
        /* Execute */
        $statement->execute();
		
	} catch (PDOException $e) {
        echo "Error Try Mysql: ".$e->getMessage();
	}
}


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


/* Este Qry es el select distinc para sacar el registro mas nuevo de cada vendedora de forma automatica
SELECT DISTINCT registros.folio AS newfolio,cod,fechaEvento,flete,montaje,USER,max(stamp) FROM registros GROUP BY stamp DESC;
*/

?>