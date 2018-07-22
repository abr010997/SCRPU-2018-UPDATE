<?php $tipoleytipored = $this->class04oficina->getTodasLeyTipored(); ?>

<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Tipo de Red Vial :</b></p>
          <?php foreach ($tredvial as $TRedVial):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $TRedVial->getAtributo('PU22IDTREDV');?>" name="class04oficina1[]" checked disabled><?php echo $TRedVial->getAtributo('PU22DESCTRV');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
 </form>


<form method="POST" action="?c=class04oficina&m=editarLeyTipored">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleytipored as $tipoleytipo): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyTipored($idtramite, $tipoleytipo['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleytipored<?php echo $tipoleytipo['pu45idley']; ?>"
             <?php if($isCheck['total26']) {echo "checked";} ?>
            /> <?php echo $tipoleytipo['pu45objetivo'] ;?> <br> <?php echo $tipoleytipo['pu45descripcion'] ;?>
            
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>