<!-- Modal -->
<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#estadoPPModal">
  Solicitar autorización
</button>

<div class="modal fade" id="estadoPPModal" tabindex="-1" role="dialog" aria-labelledby="estadoPPModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="estadoPPModalLabel">Solicitud de autorización <?php echo $id;
                echo " - ".$resultados['numeroFactura'];
                ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form class="form-horizontal" action="../controladores/modalSolicitarAutorizacionPP.controller.php" method="POST">
            <fieldset>

            <input type="hidden" name="idPPmodal" value=<?php echo $id?>>
            
            <!-- Boton Mandar autorización -->
            <div class="form-group">
            <label class="col-lg control-label" for="solicitarAutorizacion">Esta acción no se puede revertir, el PP quedará bloqueado hasta su revisión.</label>
            <div class="col-lg">
                <button id="solicitarAutorizacion" name="solicitarAutorizacion" type="submit"class="btn btn-success">Solicitar Autorización</button>
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