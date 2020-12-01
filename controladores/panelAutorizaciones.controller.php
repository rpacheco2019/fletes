<?php
session_start();
include("../xcrud/xcrud.php");

if($_SESSION['type'] == "admin" OR $_SESSION['autorizador']){
    $tablaPorAutorizar= Xcrud::get_instance()->table('pagoproveedor')->unset_remove()->unset_add();

    /* Bloqueo de campos en Edit() */
    $tablaPorAutorizar->fields('id',true);
    $tablaPorAutorizar->readonly('numeroFactura,fechaFactura,totalFactura,incluirIVA,totalConIVA,proveedor,tipoPago,creadoPor,stamp');

    /* Columnas mostradas */
    $tablaPorAutorizar->columns("id,numeroFactura,estado,fechaFactura,proveedor,totalFactura,incluirIVA,totalConIVA,creadoPor,tipo");
    
    /* Cambiar nombres de columnas y campos */
    $tablaPorAutorizar->label('id','ID PP');
    $tablaPorAutorizar->label('fechaFactura','Fecha Factura');
    $tablaPorAutorizar->label('totalFactura','Subtotal');
    $tablaPorAutorizar->label('incluirIVA','IVA');
    $tablaPorAutorizar->label('totalConIVA','Total');
    $tablaPorAutorizar->label('tipoPago','Tipo de pago');
    $tablaPorAutorizar->label('creadoPor','Creado Por');
    
    $tablaPorAutorizar->fields('numeroFactura,fechaFactura,totalFactura,incluirIVA,totalConIVA,estado', false, 'Info Factura');
    $tablaPorAutorizar->fields('proveedor,tipoPago', false, 'Proveedor');
    $tablaPorAutorizar->fields('concepto', false, 'Concepto');
    $tablaPorAutorizar->fields('creadoPor,stamp', false, 'Registro de alta');

    /* Cambiar nombre de la tabla */
    $tablaPorAutorizar->table_name('Lista de pagos a proveedores:');

    /* Listas de campos */
    $tablaPorAutorizar->change_type('estado','select','black,white',array('values'=>'Autorizado,Cancelado,Pendiente'));

    /* Pruebas  */
    $tablaPorAutorizar->button('../facturas/{imgPath}');
    
    require ('../vistas/views/panelAutorizaciones.view.php');

}else{
    echo "no tienes permisos para ver esta pagina";
    die();
}

?>