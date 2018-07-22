
  <center>
      
    <h2>Editar Afectación de Áreas de protección: <?php echo $this->class13aarep->getAtributo('PU13DESCAAP');?> </h2>
  </center>
    <form action="?c=class13aarep&m=editar" method="post">
      <div class="form-group">
        <label for="PU13IDAAP">Código Afectación de Áreas de protección</label>
        <input type="text" class="form-control" id="PU13IDAAP" name="PU13IDAAP" value="<?php echo $this->class13aarep->getAtributo('PU13IDAAP');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU13DESCAAP">Desripción Afectación de Áreas de protección</label>
        <input type="text" class="form-control" id="PU13DESCAAP" name="PU13DESCAAP" value="<?php echo $this->class13aarep->getAtributo('PU13DESCAAP');?> " >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class13aarep&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>

