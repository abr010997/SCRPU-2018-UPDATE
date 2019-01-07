
<div class="container-fluid">
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡Alerta!</strong> Si estas conectado desde un celular o tablet, preferiblemente utilícelo en forma horizontal.
  </div>
  <center><h3>Datos de Inspección a realizar</h3></center>
  <form method="POST" action="?c=class04inspeccion&m=agregarTrausutra" >
    <div class="col-sm-offset-4 col-sm-4">

      <div class="form-group row">
        <label>Tramite a inspeccionar: </label>
        <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA" value="<?php echo $this->pu04inspeccion->getAtributo('PU04IDTRA');?>"  readonly> <?php  $idtramite = $this->pu04inspeccion->getAtributo('PU04IDTRA'); ?>
      </div>

      <h3>Datos del Inspector:</h3>


      <div class="form-group row">
        <label for="PU01CEDUSU">Cédula del Inspector:</label>
        <input type="number" class="form-control" name="PU01CEDUSU" id="PU01CEDUSU" placeholder="Cédula del Inspector" maxlength="11" required>
      </div>

      <button type="submit" class="btn btn-success">Guardar Registro Oficina</button>
      <a id="regresar" class="btn btn-danger" role="button" href="?c=classprincipal&m=index">Regresar</a>
    </div>
  </form>

</div>
<br>
