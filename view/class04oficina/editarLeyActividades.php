<?php $tipoleyactividades = $this->class04oficina->getTodasLeyActividades(); ?>


<form method="POST" action="?c=class04oficina&m=editarLeyActividades">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleyactividades as $tipoleyactividade): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyActividades($idtramite, $tipoleyactividade['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleyactividades<?php echo $tipoleyactividade['pu45idley']; ?>"
             <?php if($isCheck['total28']) {echo "checked";} ?>
            /> <?php echo $tipoleyactividade['pu45descripcion'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>