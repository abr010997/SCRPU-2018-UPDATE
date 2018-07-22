  <center>
    <h2>Editar Plan Regulador: <?php echo $this->class26planreg->getAtributo('PU26PLNDESC');?> </h2>
  </center>
    <form action="?c=class26planreg&m=editar" method="post">
      <div class="form-group">
        <label for="PU26IDPLAN">código del Plan Regulador</label>
        <input type="text" class="form-control" id="PU26IDPLAN" name="PU26IDPLAN" value="<?php echo $this->class26planreg->getAtributo('PU26IDPLAN');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU26PLNDESC">Desripción del Plan:</label>
        <input type="text" class="form-control" id="PU26PLNDESC" name="PU26PLNDESC" value="<?php echo $this->class26planreg->getAtributo('PU26PLNDESC');?> " >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class26planreg&m=index" class="btn btn-danger" role="button">Regresar</a>    
   </div>

