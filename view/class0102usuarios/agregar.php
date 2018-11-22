    
  <center><h2>Agregar nuevo usuario</h2></center>
    <form action="?c=class0102usuarios&m=agregar" method="post">
       <div class="col-sm-offset-4 col-sm-4">
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
        <div class="col-md-6 col-sm-6 col-xs-6">
          <label for="PU03IDPUES">Seleccione Puesto: </label>
          <select class="form-control selectpicker" name="PU03IDPUES" id="PU03IDPUES">
            <option value="Seleccione">Seleccione...</option>
            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
            <option value="COORDINADOR">COORDINADOR</option>
            <option value="ASISTENTE">ASISTENTE</option>
             <option value="AUXILIAR">AUXILIAR</option>
              <option value="ALCALDE">ALCALDE(SA)</option>
          </select>
        </div>
      </div>
 <br><br><br>
 <br>

      <div class="form-group">
        <label for="PU02USUARIO">Usuario:</label>
        <input type="text" class="form-control" id="PU02USUARIO" name="PU02USUARIO">
      </div>
      <div class="form-group">
        <label for="PU02CLAVE">Contraseña:</label>
        <input type="password" class="form-control" id="PU02CLAVE" name="PU02CLAVE">
      </div>

      <button type="submit" class="btn btn-success">Guardar Usuario</button> 
      <a href="?c=class0102usuarios&m=index" class="btn btn-danger" role="button">Regresar</a>   </div>    
     </form>
