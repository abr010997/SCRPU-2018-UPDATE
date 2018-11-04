
    <center><h2>Editar propietario: <?php echo $this->class40propietario->getAtributo('PU40NOMPROPIE');?> </h2></center>
    
      <form action="?c=class40propietario&m=editar" method="post">
      <div class="form-group">
        <label for="PU40CEDPROPIE">Cédula:</label>
        <input type="text" class="form-control" id="PU40CEDPROPIE" name="PU40CEDPROPIE" value="<?php echo $this->class40propietario->getAtributo('PU40CEDPROPIE');?>" readonly>
      </div>
      <div class="form-group">
        <label for="PU40NOMPROPIE">Nombre:</label>
        <input type="text" class="form-control" id="PU40NOMPROPIE" name="PU40NOMPROPIE" value="<?php echo $this->class40propietario->getAtributo('PU40NOMPROPIE');?> " >
      </div>
      <div class="form-group">
        <label for="PU40APE1PROPIE">Primer Apellido:</label>
        <input type="text" class="form-control" id="PU40APE1PROPIE" name="PU40APE1PROPIE" value="<?php echo $this->class40propietario->getAtributo('PU40APE1PROPIE');?> ">
      </div>
      <div class="form-group">
        <label for="PU40APE2PROPIE">Segundo Apellido:</label>
        <input type="text" class="form-control" id="PU40APE2PROPIE" name="PU40APE2PROPIE" value="<?php echo $this->class40propietario->getAtributo('PU40APE2PROPIE');?> ">
      </div>
       

      <button type="submit" class="btn btn-success">Editar Propietario</button> 
      <a href="?c=class40propietario&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>
