<?php $tipoleyplan = $this->class04oficina->getTodasLeyPlanregulador(); ?>


<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
      <p><b>Plan Regulador  :</b></p>
        <?php foreach ($traplanReg as $planreg):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $planreg->getAtributo('PU26IDPLAN');?>" name="class04oficina1[]" checked disabled><?php echo $planreg->getAtributo('PU26PLNDESC');?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
    <br>  
</form>

<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Descripción del tipo construcción :</b></p>
          <?php foreach ($nicosama as $NicoSama):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $NicoSama->getAtributo('PU26IDDESCNICOYASAMA');?>" name="class04oficina1[]" checked disabled><?php echo $NicoSama->getAtributo('PU26DESCACNICOYASAMA');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
    <br>   
 </form> 


<form method="POST" action="?c=class04oficina&m=editarLeyPlanregulador">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleyplan as $tipoleypla): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyPlanregulador($idtramite, $tipoleypla['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleyplan<?php echo $tipoleypla['pu45idley']; ?>"
             <?php if($isCheck['total21']) {echo "checked";} ?>
            /> <?php echo $tipoleypla['pu45objetivo'] ;?> <br> <?php echo $tipoleypla['pu45descripcion'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>