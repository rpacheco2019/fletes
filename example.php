<?php
    include('xcrud/xcrud.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Inventario Sistemas 2020</title>
</head>
 
<body>
 
<div id="suggestions" class="alert alert-danger">
<!-- Aqui se generan automaticamente las sugerencias por JS -->
</div>

<?php
    $xcrud= Xcrud::get_instance()->table('informatica')/* ->unset_remove() */;
    $xcrud->columns('id,usuario,departamento,marca,modelo,procesador,ram,hd,tipo');
    $xcrud->fields('id',true);
    $xcrud->set_attr('usuario',array('id'=>'usuario'));
    $xcrud->change_type('empresa','select','black,white',array('values'=>'Events Pro Mexico S.A. de C.V.,Grupo Planner 1 S.A. de C.V.,HYRUMTEC SA DE CV'));
    $xcrud->change_type('depto','select','black,white',array('values'=>'Ventas,Administracion,Operaciones,Sistemas'));
    echo $xcrud;


   /*  $db=Xcrud_db::get_instance();
    $db->query("SELECT * FROM informatica");
    $resultado = $db->result();
    foreach ($resultado as $fila){
        echo $fila['usuario'];
    } */

?>
 
<p>Hola!</p>
<input type="text" id="pruebaInput" placeholder="Holis">

<script>
 
    jQuery(document).on("xcrudafterrequest",function(event,container){
    if(Xcrud.current_task == 'save')
    {
        Xcrud.show_message(container,'WOW!','success');
    }
});


$("#pruebaInput").click(function(){
  alert("The paragraph was clicked.");
});


/* $(".xcrud").on("click","#usuario",function(){
    valor = $('#usuario').val();
    alert("Estas cambiando el valor de:" + valor);
}); */
</script>


<!-- Script JS para buscar sugerencias de factura duplicada -->
<script>
        $(".xcrud").on("keyup","#usuario",function() {
                var key = $(this).val();		
                var dataString = 'usuario='+key;
            $.ajax({
                    type: "POST",
                    url: "helpers/checkFacturaDuplicada.php",
                    data: dataString,
                    success: function(data) {
                        //Rellenamos la lista de sugerencias con el result del Qry
                        $('#suggestions').fadeIn(1000).html(data);
                        //Al hacer click en alguna de las sugerencias
                        $('.suggest-element').on('click', function(){
                                //Obtenemos la id unica de la sugerencia seleccionada
                                var id = $(this).attr('id');
                                //Rellenamos el textbox con data="" de la sugerencia seleccionada
                                $('#key').val($('#'+id).attr('data'));
                                $('#labelKey').val($('#'+id).attr('data2'));
                                $('#labelDepto').val($('#'+id).attr('data3'));
                                $('#labelEmpresa').val($('#'+id).attr('data4'));
                                //Limpiamos la lista de sugerencias
                                $('#suggestions').fadeOut(1000);
                                /* Mandamos un alert solo para comprobar */
                                /* alert('Has seleccionado el ID: '+id+' con Serial: '+$('#'+id).attr('data')); */
                                return false;
                        });
                    }/* Cierre success */
                });/* Cierre Ajax */
            }); 
</script>


</body>
</html>