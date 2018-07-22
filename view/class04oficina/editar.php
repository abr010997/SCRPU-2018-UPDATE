      <center><h3>Editar Datos de Oficina:</h3></center>
    
      <form action="?c=class04oficina&m=editar" method="post">
      <div class="form-group">
        <label for="PU04IDTRA">Id Trámite:</label>
        <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>" readonly>
      </div>

      <h3>Datos del solicitante:</h3>

      <div class="form-group">
        <label for="PU39CEDSOLICI">Cédula del Solicitante:</label>
        <input type="text" class="form-control" id="PU39CEDSOLICI" name="PU39CEDSOLICI" value="<?php echo $this->class04oficina->getAtributo('PU39CEDSOLICI');?> " readonly>
      </div>
      <div class="form-group">
        <label for="PU39NOMSOLICI">Nombre del Solicitante:</label>
        <input type="text" class="form-control" id="PU39NOMSOLICI" name="PU39NOMSOLICI" value="<?php echo $this->class04oficina->getAtributo('PU39NOMSOLICI');?> " >
      </div>
      <div class="form-group">
        <label for="PU39APE1SOLICI">1° Apellido del Solicitante:</label>
        <input type="text" class="form-control" id="PU39APE1SOLICI" name="PU39APE1SOLICI" value="<?php echo $this->class04oficina->getAtributo('PU39APE1SOLICI');?> ">
      </div>
      <div class="form-group">
        <label for="PU39APE2SOLICI">2° Apellido del Solicitante:</label>
        <input type="text" class="form-control" id="PU39APE2SOLICI" name="PU39APE2SOLICI" value="<?php echo $this->class04oficina->getAtributo('PU39APE2SOLICI');?> ">
      </div>
       <div class="form-group">
        <label for="PU04IDDISTRITO">Distrito al que pertenece:</label>
        <input type="text" class="form-control" id="PU04IDDISTRITO" name="PU04IDDISTRITO" value="<?php echo $this->class04oficina->getAtributo('PU04IDDISTRITO');?> ">
      </div>
       <div class="form-group">
        <label for="PU39BARRIO">Barrio donde vive: </label>
        <input type="text" class="form-control" id="PU39BARRIO" name="PU39BARRIO" value="<?php echo $this->class04oficina->getAtributo('PU39BARRIO');?> ">
      </div>
         <div class="form-group">
        <label for="PU39DIRECCION">Dirección exacta de recidencia: </label>
        <input type="text" class="form-control" id="PU39DIRECCION" name="PU39DIRECCION" value="<?php echo $this->class04oficina->getAtributo('PU39DIRECCION');?> ">
      </div>

      <h3>Datos del propietario:</h3>

      <div class="form-group">
        <label for="PU40CEDPROPIE">Cédula del Propietario:</label>
        <input type="text" class="form-control" id="PU40CEDPROPIE" name="PU40CEDPROPIE" value="<?php echo $this->class04oficina->getAtributo('PU40CEDPROPIE');?> " readonly>
      </div>
      <div class="form-group">
        <label for="PU40NOMPROPIE">Nombre del Propietario:</label>
        <input type="text" class="form-control" id="PU40NOMPROPIE" name="PU40NOMPROPIE" value="<?php echo $this->class04oficina->getAtributo('PU40NOMPROPIE');?> " >
      </div>
      <div class="form-group">
        <label for="PU40APE1PROPIE">1° Apellido del Propietario:</label>
        <input type="text" class="form-control" id="PU40APE1PROPIE" name="PU40APE1PROPIE" value="<?php echo $this->class04oficina->getAtributo('PU40APE1PROPIE');?> ">
      </div>
      <div class="form-group">
        <label for="PU40APE2PROPIE">2° Apellido del Propietario:</label>
        <input type="text" class="form-control" id="PU40APE2PROPIE" name="PU40APE2PROPIE" value="<?php echo $this->class04oficina->getAtributo('PU40APE2PROPIE');?> ">
      </div>

       <h3>Datos de la propiedad:</h3>

      <div class="form-group">
        <label for="PU40NFINCA">Finca 5-:</label>
        <input type="text" class="form-control" id="PU40NFINCA" name="PU40NFINCA" value="<?php echo $this->class04oficina->getAtributo('PU40NFINCA');?> ">
      </div>
       <div class="form-group">
        <label for="PU40NPLANO">Plano G-:</label>
        <input type="text" class="form-control" id="PU40NPLANO" name="PU40NPLANO" value="<?php echo $this->class04oficina->getAtributo('PU40NPLANO');?> ">
      </div>


      <button type="submit" class="btn btn-success">Editar Oficina</button> 
      <a href="?c=class04oficina&m=index" class="btn btn-danger" role="button">Regresar</a>    
    </form>
