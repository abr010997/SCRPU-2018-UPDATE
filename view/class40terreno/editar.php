<div class="container-fluid">
    <center><h2>Editar Terreno: <?php echo $this->class40terreno->getAtributo('PU40NFINCA');?> </h2></center>

      <form action="?c=class40terreno&m=editar" method="post">
      <div class="col-sm-offset-3 col-sm-6">
      <div class="form-group">
        <label for="PU40NFINCA">Número Finca:</label>
        <input type="text" class="form-control" id="PU40NFINCA" name="PU40NFINCA" value="<?php echo $this->class40terreno->getAtributo('PU40NFINCA');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU40NCATASTRO">Catastro:</label>
        <input type="text" class="form-control" id="PU40NCATASTRO" name="PU40NCATASTRO" value="<?php echo $this->class40terreno->getAtributo('PU40NCATASTRO');?> " required>
      </div>
      <div class="form-group">
        <label for="PU04IDDISTRITO">Distrito:</label>
        <input type="text" class="form-control" id="PU04IDDISTRITO" name="PU04IDDISTRITO" value="<?php echo $this->class40terreno->getAtributo('PU04IDDISTRITO');?> " required>
      </div>
      <div class="form-group">
        <label for="PU39BARRIO">Barrio:</label>
        <input type="text" class="form-control" id="PU39BARRIO" name="PU39BARRIO" value="<?php echo $this->class40terreno->getAtributo('PU39BARRIO');?> " required>
      </div>
       <div class="form-group">
        <label for="PU39DIRECCION">Dirección:</label>
        <input type="text" class="form-control" id="PU39DIRECCION" name="PU39DIRECCION" value="<?php echo $this->class40terreno->getAtributo('PU39DIRECCION');?> " required>
      </div>


      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Editar</button>
      <a href="?c=class40terreno&m=index" class="btn btn-danger" role="button">Regresar</a>
      </div>
    </form>
</div>
