<!-- Modal -->

<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">
   Agregar asignacion
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Gasto a PP: <?php echo $id;
                echo " - ".$resultados['numeroFactura'];
                ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form class="form-horizontal" action="../controladores/modalGastoPP.controller.php" method="POST">
            <fieldset>

            <input type="hidden" name="idPPmodal" value=<?php echo $id?>>
            
            <!-- Folio Easy Planner-->
            <div class="form-group">
            <label class="col-lg control-label" for="folioEP">Folio Easy Planner</label>  
            <div class="col-lg">
            <input id="folioEP" name="folioEP" type="text" placeholder="" class="form-control input-md" required="">
            <span class="help-block">Use el folio de evento obtenido de Easy Planner</span>  
            </div>
            </div>

            <!-- Codigo Planner-->
            <div class="form-group">
            <label class="col-lg control-label" for="codigoPlanner">Código Planner</label>  
            <div class="col-lg">
            <input id="codigoPlanner" name="codigoPlanner" type="text" placeholder="" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Valor Asignado-->
            <div class="form-group">
            <label class="col-lg control-label" for="valorAsignacion">Cantidad</label>  
            <div class="col-lg">
            <input id="valorAsignacion" name="valorAsignacion" type="number" min=0 step=".01" placeholder="" class="form-control input-md" required="">
            <span class="help-block">Valor de esta asignación sin IVA</span>  
            </div>
            </div>

            <!-- Comentarios -->
            <div class="form-group">
            <label class="col-lg control-label" for="comentarios">Comentarios</label>
            <div class="col-lg">                     
                <textarea class="form-control" id="comentarios" name="comentarios"></textarea>
            </div>
            </div>

            <!-- Boton Guardar -->
            <div class="form-group">
            <label class="col-lg control-label" for="guardarAsignacion">Presione para guardar</label>
            <div class="col-lg">
                <button id="guardarAsignacion" name="guardarAsignacion" type="submit"class="btn btn-success">Guardar asignación!</button>
            </div>
            </div>

            </fieldset>
            </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>