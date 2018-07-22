<?php $tipoleydesarrollosec = $this->class04oficina->getTodasLeyDesarrollosec(); ?>

<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Tipo de Desarrollo Sector :</b></p>
          <?php foreach ($desector as $DesarrolloSec):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $DesarrolloSec->getAtributo('PU12IDTDESEC');?>" name="class04oficina1[]" checked disabled><?php echo $DesarrolloSec->getAtributo('PU12TIPODES');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
 </form>


<form method="POST" action="?c=class04oficina&m=editarLeyDesarrollosec">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleydesarrollosec as $tipoleydesarrollo): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyDesarrollosec($idtramite, $tipoleydesarrollo['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleydesarrollosec<?php echo $tipoleydesarrollo['pu45idley']; ?>"
             <?php if($isCheck['total25']) {echo "checked";} ?>
            /> <?php echo $tipoleydesarrollo['pu45objetivo'] ;?> <br> <?php echo $tipoleydesarrollo['pu45descripcion'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>