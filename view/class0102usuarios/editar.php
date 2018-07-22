
    <center><h2>Editar usuario: <?php echo $this->class0102usuarios->getAtributo('PU01NOMUSU');?> </h2></center>
    
      <form action="?c=class0102usuarios&m=editar" method="post">
      <div class="form-group">
        <label for="PU01CEDUSU">Cédula:</label>
        <input type="text" class="form-control" id="PU01CEDUSU" name="PU01CEDUSU" value="<?php echo $this->class0102usuarios->getAtributo('PU01CEDUSU');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU01NOMUSU">Nombre:</label>
        <input type="text" class="form-control" id="PU01NOMUSU" name="PU01NOMUSU" value="<?php echo $this->class0102usuarios->getAtributo('PU01NOMUSU');?> " >
      </div>
      <div class="form-group">
        <label for="PU01APE1USU">Primer Apellido:</label>
        <input type="text" class="form-control" id="PU01APE1USU" name="PU01APE1USU" value="<?php echo $this->class0102usuarios->getAtributo('PU01APE1USU');?> ">
      </div>
      <div class="form-group">
        <label for="PU01APE2USU">Segundo Apellido:</label>
        <input type="text" class="form-control" id="PU01APE2USU" name="PU01APE2USU" value="<?php echo $this->class0102usuarios->getAtributo('PU01APE2USU');?> ">
      </div>
       <div class="form-group">
        <label for="PU02TELUSU">Teléfono:</label>
        <input type="text" class="form-control" id="PU02TELUSU" name="PU02TELUSU" value="<?php echo $this->class0102usuarios->getAtributo('PU02TELUSU');?> ">
      </div>
       <div class="form-group">
        <label for="PU02CORUSU">Correo: </label>
        <input type="text" class="form-control" id="PU02CORUSU" name="PU02CORUSU" value="<?php echo $this->class0102usuarios->getAtributo('PU02CORUSU');?> ">
      </div>
         <div class="form-group">
        <label for="PU03IDPUES">Puesto: </label>
        <input type="text" class="form-control" id="PU03IDPUES" name="PU03IDPUES" value="<?php echo $this->class0102usuarios->getAtributo('PU03IDPUES');?> ">
      </div>

      <button type="submit" class="btn btn-success">Editar Usuario</button> 
      <a href="?c=class0102usuarios&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>
