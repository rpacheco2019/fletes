<?php

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'fletes');

$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
$connexion->set_charset("utf8");

$html = '';
$key = $_POST['numFactura'];

$result = $connexion->query(
    'SELECT * FROM pagoproveedor 
     WHERE numeroFactura LIKE "%'.strip_tags($key).'%" LIMIT 3'
);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .='<div>
                    <a class="suggest-element" 
                    data="'.$row['numeroFactura'].'" 
                    data2="'.$row['proveedor'].'"
                    data3="'.$row['totalFactura'].'"
                    data4="'.$row['creadoPor'].'" 
                    id="'.$row['id'].'">'.$row['numeroFactura'].' - '.$row['proveedor'].' - '.$row['estado'].'</a>
                </div>';
    }
}
echo $html;

/* asi estaba mostrando caracteres extranos */
/* while ($row = $result->fetch_assoc()) {                
    $html .='<div>
                <a class="suggest-element" 
                data="'.utf8_encode($row['nombre']).'" 
                data2="'.utf8_encode($row['depto']).'"
                data3="'.utf8_encode($row['puesto']).'"
                data4="'.utf8_encode($row['empresa']).'" 
                id="'.$row['id'].'">'.$row['nombre'].'</a>
            </div>';
} */

?>