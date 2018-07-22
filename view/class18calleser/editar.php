
  <center>
    <h2>Editar Servicio de: <?php echo $this->class18calleser->getAtributo('PU18DESCS');?> </h2>
  </center>
    <form action="?c=class18calleser&m=editar" method="post">
      <div class="form-group">
        <label for="PU18IDCSCLS">Código Existencia de Calle en Servidumbre Frente a Ruta:</label>
        <input type="text" class="form-control" id="PU18IDCSCLS" name="PU18IDCSCLS" value="<?php echo $this->class18calleser->getAtributo('PU18IDCSCLS');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU18DESCS">Desripción Existencia de Calle en Servidumbre Frente a Ruta:</label>
        <input type="text" class="form-control" id="PU18DESCS" name="PU18DESCS" value="<?php echo $this->class18calleser->getAtributo('PU18DESCS');?> " >
      </div>
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class18calleser&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>
