
  <center>

    <h2>Editar Ubicacion: <?php echo $this->class27cuinic->getAtributo('PU27DSCUBIC');?> </h2>
  </center>
  <div class="container">
    <form action="?c=class27cuinic&m=editar" method="post">
      <div class="form-group">
        <label for="PU27IDUBIC">Código de la Ubicación</label>
        <input type="text" class="form-control" id="PU27IDUBIC" name="PU27IDUBIC" value="<?php echo $this->class27cuinic->getAtributo('PU27IDUBIC');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU27DSCUBIC">Descripción de la Ubicación:</label>
        <input type="text" class="form-control" id="PU27DSCUBIC" name="PU27DSCUBIC" value="<?php echo $this->class27cuinic->getAtributo('PU27DSCUBIC');?> " >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class27cuinic&m=index" class="btn btn-default" role="button">Regresar</a>    
    </form>
  </div>

