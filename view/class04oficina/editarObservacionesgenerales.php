<center><h2>Editar observación al Trámite: <?php echo $this->class04oficina->getAtributo('PU04IDTRA');?> </h2></center>
    
<form action="?c=class04oficina&m=editarObservacionesgenerales" method="post">
      <div class="form-group">
        <label for="PU04IDTRA">Código Tramite:</label>
        <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly>
      </div>


      <div class="form-group">
     
        <label for="PU04OBSERVACIONESREVISIONTRA">Observación general</label>

      <textarea  class="form-control" id="PU04OBSERVACIONESREVISIONTRA" name="PU04OBSERVACIONESREVISIONTRA"  rows="10"> <?php echo $this->class04oficina->getAtributo('PU04OBSERVACIONESREVISIONTRA');?></textarea>

        
      </div>

      
      
      <button type="submit" class="btn btn-success">Editar Trámite</button> 
      <a href="?c=class04oficina&m=index" class="btn btn-danger" role="button">Regresar</a>    
</form>
  
