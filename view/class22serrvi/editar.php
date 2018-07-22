  <center>
    <h2>Editar Servicio de Red Vial: <?php echo $this->class22serrvi->getAtributo('PU22DESSVI');?> </h2>
  </center>
    <form action="?c=class22serrvi&m=editar" method="post">
      <div class="form-group">
        <label for="PU22IDREDVI">Código del Servicio de Red Vial:</label>
        <input type="text" class="form-control" id="PU22IDREDVI" name="PU22IDREDVI" value="<?php echo $this->class22serrvi->getAtributo('PU22IDREDVI');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU22DESSVI">Descripción del Servicio de Red Vial:</label>
        <input type="text" class="form-control" id="PU22DESSVI" name="PU22DESSVI" value="<?php echo $this->class22serrvi->getAtributo('PU22DESSVI');?>" >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class22serrvi&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>
