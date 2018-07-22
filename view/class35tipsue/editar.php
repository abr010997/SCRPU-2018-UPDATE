  <center><h2>Editar Tipo suelo: <?php echo $this->class35tipsue->getAtributo('PU35DESTIP');?> </h2></center>
  <form action="?c=class35tipsue&m=editar" method="post">
      <div class="form-group">
        <label for="PU35IDTIPS">Código de Tipo Suelo:</label>
        <input type="text" class="form-control" id="PU35IDTIPS" name="PU35IDTIPS" value="<?php echo $this->class35tipsue->getAtributo('PU35IDTIPS');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU35DESTIP">Descripción de Tipo Suelo:</label>
        <input type="text" class="form-control" id="PU35DESTIP" name="PU35DESTIP" value="<?php echo $this->class35tipsue->getAtributo('PU35DESTIP');?> " >
      </div>
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class35tipsue&m=index" class="btn btn-danger" role="button">Regresar</a>    
  </form>

