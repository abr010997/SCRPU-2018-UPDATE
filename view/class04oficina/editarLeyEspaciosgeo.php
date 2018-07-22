<?php $tipoleyespacio = $this->class04oficina->getTodasLeyEspaciosgeo(); ?>



<form >
  <div class="container-fluid  well   "> 
    <div class="form-group">
        <p><b>Descripción del Espacio Geográfico :</b></p>
          <?php foreach ($deg as $EspacioGeo):?>
            <label class="checkbox-inline">
              <input type="checkbox" value="<?php echo $EspacioGeo->getAtributo('PU09IDDEG');?>" name="class04oficina1[]" checked disabled><?php echo $EspacioGeo->getAtributo('PU09DESCREG');?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
  <br>  
 </form>


<form method="POST" action="?c=class04oficina&m=editarLeyEspaciosgeo">
 <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 

            
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $tipoleyespacio as $tipoleyespa): ?>
          <?php $isCheck = $this->class04oficina->tieneLeyEspaciosgeo($idtramite, $tipoleyespa['pu45idley']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox"  name="idtipoleyespacio<?php echo $tipoleyespa['pu45idley']; ?>"
             <?php if($isCheck['total23']) {echo "checked";} ?>
            /> <?php echo $tipoleyespa['pu45objetivo'] ;?><br><?php echo $tipoleyespa['pu45descripcion'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
</form>