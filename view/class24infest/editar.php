
  <center>

    <h2>Editar Infraestructura: <?php echo $this->class24infest->getAtributo('PU24DESCINF');?> </h2>
  </center>
    <form action="?c=class24infest&m=editar" method="post">
      <div class="form-group">
        <label for="PU24IDINFR">Código de la Infraestructura:</label>
        <input type="text" class="form-control" id="PU24IDINFR" name="PU24IDINFR" value="<?php echo $this->class24infest->getAtributo('PU24IDINFR');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU24DESCINF">Descripción de la Infraestructura:</label>
        <input type="text" class="form-control" id="PU24DESCINF" name="PU24DESCINF" value="<?php echo $this->class24infest->getAtributo('PU24DESCINF');?> " >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class24infest&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>

