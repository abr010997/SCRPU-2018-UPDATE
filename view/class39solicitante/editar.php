
    <center><h2>Editar solicitante: <?php echo $this->class39solicitante->getAtributo('PU39NOMSOLICI');?> </h2></center>
    
      <form action="?c=class39solicitante&m=editar" method="post">
      <div class="form-group">
        <label for="PU39CEDSOLICI">Cédula:</label>
        <input type="text" class="form-control" id="PU39CEDSOLICI" name="PU39CEDSOLICI" value="<?php echo $this->class39solicitante->getAtributo('PU39CEDSOLICI');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU39NOMSOLICI">Nombre:</label>
        <input type="text" class="form-control" id="PU39NOMSOLICI" name="PU39NOMSOLICI" value="<?php echo $this->class39solicitante->getAtributo('PU39NOMSOLICI');?> " >
      </div>
      <div class="form-group">
        <label for="PU39APE1SOLICI">Primer Apellido:</label>
        <input type="text" class="form-control" id="PU39APE1SOLICI" name="PU39APE1SOLICI" value="<?php echo $this->class39solicitante->getAtributo('PU39APE1SOLICI');?> ">
      </div>
      <div class="form-group">
        <label for="PU39APE2SOLICI">Segundo Apellido:</label>
        <input type="text" class="form-control" id="PU39APE2SOLICI" name="PU39APE2SOLICI" value="<?php echo $this->class39solicitante->getAtributo('PU39APE2SOLICI');?> ">
      </div>
       

      <button type="submit" class="btn btn-success">Editar Solicitante</button> 
      <a href="?c=class39solicitante&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>
