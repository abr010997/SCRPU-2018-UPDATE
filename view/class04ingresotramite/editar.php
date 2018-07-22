
   
        <form action="?c=class04ingresotramite&m=editar" method="post">
      <div class="form-group">
        <label for="PU04IDTRA">Código Tramite:</label>
        <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04ingresotramite->getAtributo('PU04IDTRA');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU04DESCRIPCIONLUGAR">Ubicacion</label>
        <input type="text" class="form-control" id="PU04DESCRIPCIONLUGAR" name="PU04DESCRIPCIONLUGAR" value="<?php echo $this->class04ingresotramite->getAtributo('PU04DESCRIPCIONLUGAR');?> " >
      </div>
      
      <button type="submit" class="btn btn-success">Editar Tramite</button> 
      <a href="?c=class04ingresotramite&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>
  
