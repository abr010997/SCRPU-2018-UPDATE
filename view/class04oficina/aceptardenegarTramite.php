<?php $iddesarrollos00 = $this->class04oficina->getTododasEstados(); ?>

  <center><h2>Aplicando actividades al Trámite:</h2></center> 

       <div class="col-xs-2">
  <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>"  readonly> 
  <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
</div><br><br>



<div class="container-fluid">
 
<div id="parentVerticalTab">
  <ul class="resp-tabs-list hor_1">
     <li href="#tabconten00">Prueba</li>
    <!-- <li href="#tabconten20">LEY :v</li> -->
    
    
  </ul> 
  <div class="resp-tabs-container hor_1">

<div class="container-fluid" id="tabconten00">
      <!-- contenido de tab 4 -->
      

          <form method="POST" action="?c=class04oficina&m=editarActividades00">
          <div class="form-group">
            <label for="id">Código Trámite</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly> 
            <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
          </div>
          <?php foreach( $iddesarrollos00 as $idactividad5 ): ?>
          <?php $isCheck = $this->class04oficina->tieneActividades00($idtramite, $idactividad5['PU00IDAD']);?>
          <div class="checkbox">
            <label>
            <input type="checkbox" name="idactdes00<?php echo $idactividad5['PU00IDAD']; ?>"
             <?php if($isCheck['total50']) {echo "checked";} ?>
            /> <?php echo $idactividad5['PUDESAD'] ;?>
            </label>
          </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-success">Guardar</button>
          <br>
        </form>
         
    </div>


 

    </div>
  </div>
 </div>