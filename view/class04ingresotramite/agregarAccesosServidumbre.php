<?php $idservidumbres = $this->class04ingresotramite->getTodasServidumbres(); ?>



      <form method="POST" action="?c=class04ingresotramite&m=editarServidumbres">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04ingresotramite->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04ingresotramite->getAtributo('PU04IDTRA'); ?>

          </div>
          <?php foreach( $idservidumbres as $idservi ): ?>
          <?php $isCheck = $this->class04ingresotramite->tieneServidumbres($idtramite, $idservi['PU38IDSERVIDUMBRE']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idservi<?php echo $idservi['PU38IDSERVIDUMBRE']; ?>"
             <?php if($isCheck['tota130']) {echo "checked";} ?>
            /> <?php echo $idservi['PU38DESCRIPSERVIDUM'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar Acceso</button>
          <br>
        </form>