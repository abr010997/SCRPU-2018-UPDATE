
   <div class="container-fluid">
     
  <center><h2>Guardar datos de Inspección A realizar</h2></center>
    <form method="POST" action="?c=class04inspeccion&m=agregarTrausutra" >
<div class="col-sm-offset-4 col-sm-8">
        <h4>Guardando información del Inspector:</h4>
      <div class="col-xs-5">
  <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>"  readonly> <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
</div>
<br><br>
        <h3>Datos del Inspector:</h3>

     <div class="container-fluid">
          <div class="form-group row">
            <div class="col-xs-5">
                 <label for="PU01CEDUSU">Cédula del Inspector:</label>
                  <input type="text" class="form-control" name="PU01CEDUSU" id="PU01CEDUSU">
            </div>
          </div>
      </div>
      <button type="submit" class="btn btn-success">Guardar Registro Oficina</button> 
      <a id="regresar" class="btn btn-danger" role="button" href="?c=pu04inspeccion&m=index">Regresar</a>  
     </form>


      
</div>
</div>
<br>
<br>
