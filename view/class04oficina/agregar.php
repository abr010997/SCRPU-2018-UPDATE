<?php $idactividades = $this->class04oficina->getTodasActividades(); ?>
<?php $iddesarrollos = $this->class04oficina->getTodasActividadesDesarrollo(); ?>
<?php $iddesarrollos3 = $this->class04oficina->getTodasActividadesComercial(); ?>
<?php $iddesarrollos4 = $this->class04oficina->getTodasActividadesComercialIndustrial(); ?>
<?php $iddesarrollos5 = $this->class04oficina->getTodasActividadesEstacionDeServicio(); ?>
<?php $idtipopatentes = $this->class04oficina->getTodasPatenteOf(); ?>
<?php $idtipoleyes = $this->class04oficina->getTodasLeyes(); ?>
   <div class="container-fluid">
     
  <center><h2>Guardar datos de Inspección Realizada</h2></center>
    <form method="POST" action="?c=class04oficina&m=agregar" >

        <h4>Guardando información de Oficina al Trámite:</h4>
      <div class="col-xs-5">
  <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->class04oficina->getAtributo('PU04IDTRA');?>"  readonly> <?php  $idtramite = $this->class04oficina->getAtributo('PU04IDTRA'); ?>
</div>
<br><br>
        <h3>Datos del solicitante:</h3>

     <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU39CEDSOLICI">Cédula del Solicitante:</label>
                  <input type="text" class="form-control" name="PU39CEDSOLICI" id="PU39CEDSOLICI">
            </div>
          </div>
      </div>

      <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU39NOMSOLICI">Nombre del Solicitante:</label>
                  <input type="text" class="form-control" name="PU39NOMSOLICI" id="PU39NOMSOLICI">
            </div>
          </div>
      </div>

      <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU39APE1SOLICI">1° Apellido del Solicitante:</label>
                  <input type="text" class="form-control" name="PU39APE1SOLICI" id="PU39APE1SOLICI">
            </div>
          </div>
      </div>

      <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU39APE2SOLICI">2° Apellido del Solicitante:</label>
                  <input type="text" class="form-control" name="PU39APE2SOLICI" id="PU39APE2SOLICI">
            </div>
          </div>
      </div>
      <h3>Datos del terreno:</h3>

      <div class="form-group">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <label for="PU04IDDISTRITO">Distrito al que pertenece: </label>
          <select class="form-control selectpicker" name="PU04IDDISTRITO" id="PU04IDDISTRITO">
            <option value="Seleccione">Seleccione...</option>
            <option value="Nicoya">Nicoya</option>
            <option value="Masión">Masión</option>
            <option value="San Antonio">San Antonio</option>
            <option value="Quebrada Honda">Quebrada Honda</option>
            <option value="Sámara">Sámara</option>
            <option value="Nosara">Nosara</option>
            <option value="Belén">Belén</option>
          </select>
        </div>
      </div>
      <br> <br> <br> <br>

     <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU39BARRIO">Barrio donde se ubica la propiedad:</label>
                  <input type="text" class="form-control" name="PU39BARRIO" id="PU39BARRIO">
            </div>
          </div>
      </div>

       <div class="container-fluid">
        <div class="col-xs-9">
        <label for="PU39DIRECCION">Dirección exacta de la propiedad:</label>
        <textarea class="form-control" id="PU39DIRECCION" name="PU39DIRECCION" rows="5"></textarea>
      </div>
</div>
      <!-- <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU39DIRECCION">Dirección exacta de la propiedad:</label>
                  <input type="text" class="form-control" name="PU39DIRECCION" id="PU39DIRECCION">
            </div>
          </div>
      </div> -->

        <h3>Datos del propietario:</h3>

     <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU40CEDPROPIE">Cédula del Propietario:</label>
                  <input type="text" class="form-control" name="PU40CEDPROPIE" id="PU40CEDPROPIE">
            </div>
          </div>
      </div>

      <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU40NOMPROPIE">Nombre del Propietario:</label>
                  <input type="text" class="form-control" name="PU40NOMPROPIE" id="PU40NOMPROPIE">
            </div>
          </div>
      </div>

     <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU40APE1PROPIE">1° Apellido del Propietario:</label>
                  <input type="text" class="form-control" name="PU40APE1PROPIE" id="PU40APE1PROPIE">
            </div>
          </div>
      </div>

      <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU40APE2PROPIE">2° Apellido del Propietario:</label>
                  <input type="text" class="form-control" name="PU40APE2PROPIE" id="PU40APE2PROPIE">
            </div>
          </div>
      </div>


     <h3>Datos de la propiedad:</h3>

      <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU40NFINCA">Finca 5-:</label>
                  <input type="text" class="form-control" name="PU40NFINCA" id="PU40NFINCA">
            </div>
          </div>
      </div>

      <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU40NPLANO">Plano G-:</label>
                  <input type="text" class="form-control" name="PU40NPLANO" id="PU40NPLANO">
            </div>
          </div>
      </div>


     



      <button type="submit" class="btn btn-success">Guardar Registro Oficina</button> 
      <a id="regresar" class="btn btn-danger" role="button" href="?c=class04oficina&m=index">Regresar</a>  
     </form>


      

</div>
<br>
<br>
