<?php $tipoleyAccesos = $this->class04oficina->getTodasLeyAccesos(); ?>


<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
      <p><b>Acceso seleccionado :</b></p>
        <?php foreach ($apartados  as $acceso):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $acceso->getAtributo('PU38IDSERVIDUMBRE');?>" name="class04oficina1[]" checked disabled><?php echo $acceso->getAtributo('PU38DESCRIPSERVIDUM');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  

</form> 


<form method="POST" action="?c=class04oficina&m=editarLeyAccesos">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleyAccesos as $tipoleyAcceso): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyAccesos($idtramite, $tipoleyAcceso['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleyAccesos<?php echo $tipoleyAcceso['pu45idley']; ?>"
             <?php if($isCheck['total20']) {echo "checked";} ?>
            /><?php echo $tipoleyAcceso['pu45objetivo'] ;?> <br> <?php echo $tipoleyAcceso['pu45descripcion'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>