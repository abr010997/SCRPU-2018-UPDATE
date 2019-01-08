
<div class="container fluid well">
  <center><h2>Agregar nuevo Solicitante</h2></center>
  <form action="?c=class39solicitante&m=agregar" method="post">
    <div class="col-sm-offset-4 col-sm-4">
      <div class="form-group">
        <label for="PU39CEDSOLICI">Cédula:</label>
        <input type="text" class="form-control" id="PU39CEDSOLICI" name="PU39CEDSOLICI" placeholder="Cédula" maxlength="50" required>
      </div>
      <div class="form-group">
        <label for="PU39NOMSOLICI">Nombre:</label>
        <input type="text" class="form-control" id="PU39NOMSOLICI" name="PU39NOMSOLICI" placeholder="Nombre" maxlength="50" required>
      </div>
      <div class="form-group">
        <label for="PU39APE1SOLICI">Primer Apellido:</label>
        <input type="text" class="form-control" id="PU39APE1SOLICI" name="PU39APE1SOLICI" placeholder="Primer Apellido" maxlength="50" required>
      </div>
      <div class="form-group">
        <label for="PU39APE2SOLICI">Segundo Apellido:</label>
        <input type="text" class="form-control" id="PU39APE2SOLICI" name="PU39APE2SOLICI" placeholder="Segundo Apellido" maxlength="50" required>
      </div>


      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
      <a href="?c=class39solicitante&m=index" class="btn btn-danger" role="button"> Regresar</a>
    </div>
  </form>
</div>
