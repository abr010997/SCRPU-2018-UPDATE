    
  <center><h2>Agregar nuevo usuario</h2></center>
    <form action="?c=class0102usuarios&m=agregar" method="post">
      <div class="form-group">
        <label for="PU01CEDUSU">Cédula:</label>
        <input type="text" class="form-control" id="PU01CEDUSU" name="PU01CEDUSU">
      </div>
      <div class="form-group">
        <label for="PU01NOMUSU">Nombre:</label>
        <input type="text" class="form-control" id="PU01NOMUSU" name="PU01NOMUSU">
      </div>
      <div class="form-group">
        <label for="PU01APE1USU">Primer Apellido:</label>
        <input type="text" class="form-control" id="PU01APE1USU" name="PU01APE1USU">
      </div>
      <div class="form-group">
        <label for="PU01APE2USU">Segundo Apellido:</label>
        <input type="text" class="form-control" id="PU01APE2USU" name="PU01APE2USU">
      </div>
      <div class="form-group">
        <label for="PU02TELUSU">Teléfono:</label>
        <input type="text" class="form-control" id="PU02TELUSU" name="PU02TELUSU">
      </div>
      <div class="form-group">
        <label for="PU02CORUSU">Correo:</label>
        <input type="text" class="form-control" id="PU02CORUSU" name="PU02CORUSU">
      </div>
      <div class="form-group">
        <label for="PU03IDPUES">Puesto:</label>
        <input type="text" class="form-control" id="PU03IDPUES" name="PU03IDPUES">
      </div>
      <div class="form-group">
        <label for="PU02USUARIO">Nombre de Usuario:</label>
        <input type="text" class="form-control" id="PU02USUARIO" name="PU02USUARIO">
      </div>
      <div class="form-group">
        <label for="PU02CLAVE">Contraseña:</label>
        <input type="text" class="form-control" id="PU02CLAVE" name="PU02CLAVE">
      </div>

      <button type="submit" class="btn btn-success">Guardar Usuario</button> 
      <a href="?c=class0102usuarios&m=index" class="btn btn-danger" role="button">Regresar</a>    
     </form>
