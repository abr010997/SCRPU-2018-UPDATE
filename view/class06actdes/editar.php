
    <center>
    <h2>Editar Actividad a Desarrollar: <?php echo $this->class06actdes->getAtributo('PU06DESAD');?> </h2>
</center>
        <form action="?c=class06actdes&m=editar" method="post">
      <div class="form-group">
        <label for="PU06IDACTDES">Código Actividad a Desarrollar:</label>
        <input type="text" class="form-control" id="PU06IDACTDES" name="PU06IDACTDES" value="<?php echo $this->class06actdes->getAtributo('PU06IDACTDES');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU06DESAD">Desripción Actividad a Desarrollar:</label>
        <input type="text" class="form-control" id="PU06DESAD" name="PU06DESAD" value="<?php echo $this->class06actdes->getAtributo('PU06DESAD');?> " >
      </div>
     
      <button type="submit" class="btn btn-success">Editar</button> 
      <a href="?c=class06actdes&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>


