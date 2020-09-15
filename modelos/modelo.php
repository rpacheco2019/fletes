<?php

function getRegistros(){

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=fletes','root','');
        
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

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=fletes','root','');
        
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

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=fletes','root','');
        
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

    try {

         
        /* DB Info */
        $conn = new PDO('mysql:host=localhost;dbname=fletes','root','');
        
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

?>