<?php $tipoleyaspectosbio = $this->class04oficina->getTodasLeyAspectosbio(); ?>

<!--Apartado de Aspectos Biofísicos -->
<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Aspectos Biofísicos :</b></p>
          <?php foreach ($aspbio as $AspBiofisicos):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $AspBiofisicos->getAtributo('PU10IDASBIO');?>" name="class04oficina1[]" checked disabled><?php echo $AspBiofisicos->getAtributo('PU10DESCABIO');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
 </form>


<form method="POST" action="?c=class04oficina&m=editarLeyAspectosbio">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleyaspectosbio as $tipoleyaspectos): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyAspectosbio($idtramite, $tipoleyaspectos['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleyaspectosbio<?php echo $tipoleyaspectos['pu45idley']; ?>"
             <?php if($isCheck['total24']) {echo "checked";} ?>
            /> <?php echo $tipoleyaspectos['pu45objetivo'] ;?> <br> <?php echo $tipoleyaspectos['pu45descripcion'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>