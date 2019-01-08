<div class="container-fluid well">
  <center><h2>Agregar nuevo Propietario</h2></center>
    <form action="?c=class40propietario&m=agregar" method="post">
       <div class="col-sm-offset-4 col-sm-4">
      <div class="form-group">
        <label for="PU40CEDPROPIE">Cédula:</label>
        <input type="text" class="form-control" id="PU40CEDPROPIE" name="PU40CEDPROPIE" placeholder="Cédula" maxlength="50" required>
      </div>
      <div class="form-group">
        <label for="PU40NOMPROPIE">Nombre:</label>
        <input type="text" class="form-control" id="PU40NOMPROPIE" name="PU40NOMPROPIE" placeholder="Nombre" maxlength="50" required>
      </div>
      <div class="form-group">
        <label for="PU40APE1PROPIE">Primer Apellido:</label>
        <input type="text" class="form-control" id="PU40APE1PROPIE" name="PU40APE1PROPIE" placeholder="Primer Apellido" maxlength="50" required>
      </div>
      <div class="form-group">
        <label for="PU40APE2PROPIE">Segundo Apellido:</label>
        <input type="text" class="form-control" id="PU40APE2PROPIE" name="PU40APE2PROPIE" placeholder="Segundo Apellido" maxlength="50" required>
      </div>

      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
      <a href="?c=class40propietario&m=index" class="btn btn-danger" role="button"> Regresar</a>
        </div>
     </form>
<div>
