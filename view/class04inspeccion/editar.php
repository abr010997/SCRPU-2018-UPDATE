

    <div class="container-fluid">
        <form action="?c=class04inspeccion&m=editar" method="post">
      <div class="form-group">
        <label for="PU04IDTRA">Id Trámite:</label>
        <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU04NORTE">Norte:</label>
        <input type="text" class="form-control" id="PU04NORTE" name="PU04NORTE" value="<?php echo $this->pu04inspeccion->getAtributo('PU04NORTE');?> " >
      </div>
      <div class="form-group">
        <label for="PU04ESTE">Este:</label>
        <input type="text" class="form-control" id="PU04ESTE" name="PU04ESTE" value="<?php echo $this->pu04inspeccion->getAtributo('PU04ESTE');?> ">
      </div>
      <div class="form-group">
        <label for="PU04ALTITUD">Altitud:</label>
        <input type="text" class="form-control" id="PU04ALTITUD" name="PU04ALTITUD" value="<?php echo $this->pu04inspeccion->getAtributo('PU04ALTITUD');?> ">
      </div>
       

      <button type="submit" class="btn btn-success">Editar Registro Trámite</button> 
      <a href="?c=class04inspeccion&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>
    </div>