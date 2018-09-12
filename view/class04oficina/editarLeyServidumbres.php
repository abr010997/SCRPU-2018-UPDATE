<?php $tipoleyServidumbres = $this->class04oficina->getTodasLeyServidumbres(); ?>




<form method="POST" action="?c=class04oficina&m=editarLeyServidumbres">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleyServidumbres as $tipoleyactividade): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyServidumbres($idtramite, $tipoleyactividade['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleyServidumbres<?php echo $tipoleyactividade['pu45idley']; ?>"
             <?php if($isCheck['total28']) {echo "checked";} ?>
            /> <?php echo $tipoleyactividade['pu45objetivo'] ;?> <br>  <?php echo $tipoleyactividade['pu45descripcion'] ;?> 
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>