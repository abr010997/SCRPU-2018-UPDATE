  <center>
    <h2>Editar Ubicación: <?php echo $this->class32capuso->getAtributo('PU32DESUSO');?> </h2>
  </center>
    <form action="?c=class32capuso&m=editar" method="post">
      <div class="form-group">
        <label for="PU32IDCUSO">Código de Capacidad de Uso de Suelo</label>
        <input type="text" class="form-control" id="PU32IDCUSO" name="PU32IDCUSO" value="<?php echo $this->class32capuso->getAtributo('PU32IDCUSO');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU32DESUSO">Descripción de Capacidad de Uso de Suelo</label>
        <input type="text" class="form-control" id="PU32DESUSO" name="PU32DESUSO" value="<?php echo $this->class32capuso->getAtributo('PU32DESUSO');?> " >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class32capuso&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>

