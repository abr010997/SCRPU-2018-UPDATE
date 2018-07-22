
  <center>
 
    <h2>Editar Tipo de Desarrollo: <?php echo $this->class12tipdesec->getAtributo('PU12TIPODES');?> </h2>
  </center>
    <form action="?c=class12tipdesec&m=editar" method="post">
      <div class="form-group">
        <label for="PU12IDTDESEC">Código Tipo de Desarrollo:</label>
        <input type="text" class="form-control" id="PU12IDTDESEC" name="PU12IDTDESEC" value="<?php echo $this->class12tipdesec->getAtributo('PU12IDTDESEC');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU12TIPODES">Desripción Tipo de Desarrollo:</label>
        <input type="text" class="form-control" id="PU12TIPODES" name="PU12TIPODES" value="<?php echo $this->class12tipdesec->getAtributo('PU12TIPODES');?> " >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class12tipdesec&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>

