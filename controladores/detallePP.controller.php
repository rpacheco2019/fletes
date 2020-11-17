<?php
include('../xcrud/xcrud.php');
session_start();

/* ESTE FORMULARIO ESTA PROTEGIDO, SI NO INICIO SESION SE MANDA A LOGIN Y SE TERMINA LA EXEC */
if(!$_SESSION['user']){
    header('Location:login.controller.php');
        die();  
}

require("../modelos/modelo.php");
//Cargamos los datos de la cuenta contable
$detallePP = getDetallePP($_GET['id']);
$cuentaContable = getCuentaContable($detallePP['idCuentaContable']);

    if($_SESSION['type'] == 'user'){
        $user = $_SESSION['user'];
        $id = $_GET['id'];
        $resultados = getDetallePP($id);

        /* Validamos los estados del PP para bloquear funcionalidades */
        $db=Xcrud_db::get_instance();
        $db->query("SELECT * FROM pagoproveedor WHERE id=".$id."");
        $estado = $db->row('estado');
        /* Generamos las tablas con el boton de eliminar puesto que esta pendiente, ELSE las quita */
        if ($estado['estado'] == 'Pendiente'){
            $xcrud= Xcrud::get_instance()->table('valoreventos')->unset_add()->unset_edit();
            $xcrud->where('idPP =',$id)->where('user =',$_SESSION['user']);
            $xcrud->table_name('Asignaciones de gasto a evento:');
            $xcrud->columns('folioEP,codigoPlanner,valor,user,stamp');
            $xcrud->label(array('folioEP' => 'Folio Easy Planner', 'codigoPlanner' => 'Codigo Planner'));
            $xcrud->fields('idPP,user,stamp', true);

            $tableAutorizaciones = Xcrud::get_instance()->table('pagoproveedor')
            ->unset_add()
            ->unset_edit()
            ->unset_view()
            ->unset_remove()
            ->unset_csv()
            ->unset_search()
            ->unset_print()
            ->unset_limitlist()
            ->unset_pagination();
            $tableAutorizaciones->where('id =',$id);
            $tableAutorizaciones->table_name(' ');
            $tableAutorizaciones->columns('solicitadoPor,solicitadoFecha,autorizadoPor,autorizadoFecha,pagadoPor,pagadoFecha,canceladoPor,canceladoFecha');
            $tableAutorizaciones->label(array(
            'solicitadoPor' => 'Solicitado por:',
            'solicitadoFecha' => 'Fecha solicitud:',
            'autorizadoPor' => 'Autorizado por:',
            'autorizadoFecha' => 'Fecha autorizado:',
            'pagadoPor' => 'Pagado por:',
            'pagadoFecha' => 'Fecha pago:',
            'canceladoPor' => 'Cancelado por:',
            'canceladoFecha' => 'Fecha cancelado:'
            ));
        }else{
            $xcrud= Xcrud::get_instance()->table('valoreventos')->unset_add()->unset_edit()->unset_remove();
            $xcrud->where('idPP =',$id);
            $xcrud->table_name('Asignaciones de gasto a evento:');
            $xcrud->columns('folioEP,codigoPlanner,valor,user,stamp');
            $xcrud->label(array('folioEP' => 'Folio Easy Planner', 'codigoPlanner' => 'Codigo Planner'));
            $xcrud->fields('idPP,user,stamp', true);

            $tableAutorizaciones = Xcrud::get_instance()->table('pagoproveedor')
            ->unset_add()
            ->unset_edit()
            ->unset_view()
            ->unset_remove()
            ->unset_csv()
            ->unset_search()
            ->unset_print()
            ->unset_limitlist()
            ->unset_pagination();
            $tableAutorizaciones->where('id =',$id);
            $tableAutorizaciones->table_name(' ');
            $tableAutorizaciones->columns('solicitadoPor,solicitadoFecha,autorizadoPor,autorizadoFecha,pagadoPor,pagadoFecha,canceladoPor,canceladoFecha');
            $tableAutorizaciones->label(array(
            'solicitadoPor' => 'Solicitado por:',
            'solicitadoFecha' => 'Fecha solicitud:',
            'autorizadoPor' => 'Autorizado por:',
            'autorizadoFecha' => 'Fecha autorizado:',
            'pagadoPor' => 'Pagado por:',
            'pagadoFecha' => 'Fecha pago:',
            'canceladoPor' => 'Cancelado por:',
            'canceladoFecha' => 'Fecha cancelado:'
            ));

        }
        require("../vistas/views/detallePP.view.php");
    }else{
        $id = $_GET['id'];
        $resultados = getDetallePP($id);

        /* Validamos los estados del PP para bloquear funcionalidades */
        $db=Xcrud_db::get_instance();
        $db->query("SELECT * FROM pagoproveedor WHERE id=".$id."");
        $estado = $db->row('estado');
        /* Generamos las tablas con el boton de eliminar puesto que esta pendiente, ELSE las quita */
        if ($estado['estado'] == 'Pendiente'){
            $xcrud= Xcrud::get_instance()->table('valoreventos')->unset_add()->unset_edit();
            $xcrud->where('idPP =',$id);
            $xcrud->table_name('Asignaciones de gasto a evento:');
            $xcrud->columns('folioEP,codigoPlanner,valor,user,stamp');
            $xcrud->label(array('folioEP' => 'Folio Easy Planner', 'codigoPlanner' => 'Codigo Planner'));
            $xcrud->fields('idPP,user,stamp', true);

            $tableAutorizaciones = Xcrud::get_instance()->table('pagoproveedor')
            ->unset_add()
            ->unset_edit()
            ->unset_view()
            ->unset_remove()
            ->unset_csv()
            ->unset_search()
            ->unset_print()
            ->unset_limitlist()
            ->unset_pagination();
            $tableAutorizaciones->where('id =',$id);
            $tableAutorizaciones->table_name(' ');
            $tableAutorizaciones->columns('solicitadoPor,solicitadoFecha,autorizadoPor,autorizadoFecha,pagadoPor,pagadoFecha,canceladoPor,canceladoFecha');
            $tableAutorizaciones->label(array(
            'solicitadoPor' => 'Solicitado por:',
            'solicitadoFecha' => 'Fecha solicitud:',
            'autorizadoPor' => 'Autorizado por:',
            'autorizadoFecha' => 'Fecha autorizado:',
            'pagadoPor' => 'Pagado por:',
            'pagadoFecha' => 'Fecha pago:',
            'canceladoPor' => 'Cancelado por:',
            'canceladoFecha' => 'Fecha cancelado:'
            ));
        }else{
            $xcrud= Xcrud::get_instance()->table('valoreventos')->unset_add()->unset_edit()->unset_remove();
            $xcrud->where('idPP =',$id);
            $xcrud->table_name('Asignaciones de gasto a evento:');
            $xcrud->columns('folioEP,codigoPlanner,valor,user,stamp');
            $xcrud->label(array('folioEP' => 'Folio Easy Planner', 'codigoPlanner' => 'Codigo Planner'));
            $xcrud->fields('idPP,user,stamp', true);

            $tableAutorizaciones = Xcrud::get_instance()->table('pagoproveedor')
            ->unset_add()
            ->unset_edit()
            ->unset_view()
            ->unset_remove()
            ->unset_csv()
            ->unset_search()
            ->unset_print()
            ->unset_limitlist()
            ->unset_pagination();
            $tableAutorizaciones->where('id =',$id);
            $tableAutorizaciones->table_name(' ');
            $tableAutorizaciones->columns('solicitadoPor,solicitadoFecha,autorizadoPor,autorizadoFecha,pagadoPor,pagadoFecha,canceladoPor,canceladoFecha');
            $tableAutorizaciones->label(array(
            'solicitadoPor' => 'Solicitado por:',
            'solicitadoFecha' => 'Fecha solicitud:',
            'autorizadoPor' => 'Autorizado por:',
            'autorizadoFecha' => 'Fecha autorizado:',
            'pagadoPor' => 'Pagado por:',
            'pagadoFecha' => 'Fecha pago:',
            'canceladoPor' => 'Cancelado por:',
            'canceladoFecha' => 'Fecha cancelado:'
            ));

        }

        require("../vistas/views/detallePP.view.php");
    }


?>