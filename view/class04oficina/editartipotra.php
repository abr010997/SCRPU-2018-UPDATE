      <center><h3>Editar tipotra :</h3></center>
    
      <form action="?c=class04oficina&m=editartipotra" method="post">
      <div class="form-group">
        <label for="PU04IDTRA">Id Trámite:</label>
        <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly>
      </div>

      

      <div class="form-group">
        <label for="PU04IDTIPOTRA">Tipo Trámite:</label>
        <input type="text" class="form-control" id="PU04IDTIPOTRA" name="PU04IDTIPOTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTIPOTRA');?> ">
      </div>
      <div class="form-group">
        <label for="PU47IDCONSECUTIVO">Consecutivo :</label>
        <input type="text" class="form-control" id="PU47IDCONSECUTIVO" name="PU47IDCONSECUTIVO" value="<?php echo $this->class04oficina->getAtributo('PU47IDCONSECUTIVO');?> " >
      </div>
      


      <button type="submit" class="btn btn-success">Editar Oficina</button> 
      <a href="?c=class04oficina&m=index3" class="btn btn-danger" role="button">Regresar</a>    
    </form>
