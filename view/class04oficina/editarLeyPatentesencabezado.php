<?php $tipoleypatentesencabezado = $this->class04oficina->getTodasLeyPatenteencabezado(); ?>



<form method="POST" action="?c=class04oficina&m=editarLeyPatentesencabezado">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleypatentesencabezado as $tipoleypatente1): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyPatenteencabezado($idtramite, $tipoleypatente1['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleypatentesencabezado<?php echo $tipoleypatente1['pu45idley']; ?>"
             <?php if($isCheck['total270']) {echo "checked";} ?>
            /> <?php echo $tipoleypatente1['pu45objetivo'] ;?> <br> <?php echo $tipoleypatente1['pu45descripcion'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>