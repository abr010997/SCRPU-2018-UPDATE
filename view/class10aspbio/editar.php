
  <center>

    <h2>Editar Espacio Geográfico: <?php echo $this->class10aspbio->getAtributo('PU10DESCABIO');?> </h2>
  </center>
    <form action="?c=class10aspbio&m=editar" method="post">
      <div class="form-group">
        <label for="PU10IDASBIO">Código del Aspecto Biofísico:</label>
        <input type="text" class="form-control" id="PU10IDASBIO" name="PU10IDASBIO" value="<?php echo $this->class10aspbio->getAtributo('PU10IDASBIO');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU10DESCABIO">Desripción del Aspectos Biofísico:</label>
        <input type="text" class="form-control" id="PU10DESCABIO" name="PU10DESCABIO" value="<?php echo $this->class10aspbio->getAtributo('PU10DESCABIO');?> " >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class10aspbio&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>

