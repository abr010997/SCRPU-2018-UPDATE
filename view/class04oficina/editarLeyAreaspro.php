<?php $tipoleyareas = $this->class04oficina->getTodasLeyAreaspro(); ?>



<form >
    <div class="container-fluid  well   "> 
      <div class="form-group">
        <p><b>Afectación de Áreas de Protección :</b></p>
          <?php foreach ($aap as $aap):?>
            <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $aap->getAtributo('PU13IDAAP');?>" name="class04oficina1[]" checked disabled><?php echo $aap->getAtributo('PU13DESCAAP');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
</form>



<form method="POST" action="?c=class04oficina&m=editarLeyAreaspro">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleyareas as $tipoleyarea): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyAreaspro($idtramite, $tipoleyarea['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleyareas<?php echo $tipoleyarea['pu45idley']; ?>"
             <?php if($isCheck['total22']) {echo "checked";} ?>
            /> <?php echo $tipoleyarea['pu45objetivo'] ;?> <br> <?php echo $tipoleyarea['pu45descripcion'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>