<div class="container-fluid">
  <center><h2>Agregar nuevo Terreno</h2></center>
  <form action="?c=class40terreno&m=agregar" method="post">
    <div class="col-sm-offset-4 col-sm-4">
      <div class="form-group">
        <label for="PU40NFINCA">Finca:</label>
        <input type="text" class="form-control" id="PU40NFINCA" name="PU40NFINCA" maxlength="15" required>
      </div>
      <div class="form-group">
        <label for="PU40NCATASTRO">Catastro:</label>
        <input type="text" class="form-control" id="PU40NCATASTRO" name="PU40NCATASTRO" maxlength="50" required>
      </div>
      <div class="form-group">

        <label for="PU04IDDISTRITO">Distrito al que pertenece: </label>
        <select class="form-control selectpicker" name="PU04IDDISTRITO" id="PU04IDDISTRITO" required>
          <option value="">Seleccione...</option>
          <option value="Nicoya">Nicoya</option>
          <option value="Masión">Masión</option>
          <option value="San Antonio">San Antonio</option>
          <option value="Quebrada Honda">Quebrada Honda</option>
          <option value="Sámara">Sámara</option>
          <option value="Nosara">Nosara</option>
          <option value="Belén">Belén</option>
        </select>
      </div>

      <br> <br> <br> <br>
      <br>
      <div class="form-group">

        <label for="PU39BARRIO">Barrio:</label>
        <input type="text" class="form-control" id="PU39BARRIO" name="PU39BARRIO" maxlength="150" required>
      </div>
      <div class="form-group">
        <label for="PU39DIRECCION">Dirección:</label>
        <input type="text" class="form-control" id="PU39DIRECCION" name="PU39DIRECCION" maxlength="300" required>
      </div>

      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
      <a href="?c=class40terreno&m=index" class="btn btn-danger" role="button"> Regresar</a>
    </div>
  </div>
</form>
</div>
