<?php $result1 = $this->pu38servi->listar(); ?>
<?php $result2 = $this->pu26planreg->listar(); ?>
<?php $result3 = $this->pu26planreg1->listarNicoya(); ?>
<?php $result4 = $this->pu26planreg2->listarSamara(); ?>
<?php $result5 = $this->pu13aap->listar(); ?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Alerta!</strong> Si estas conectado desde un celular o tablet, preferiblemente utilícelo en forma horizontal.
    </div>

    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Alerta!</strong> Pasos a seguir.
      <br>
      <ul>
        <li>Ingrese el número de trámite.</li>
        <li>Seleccione la fecha de expediente.</li>
        <li>Seleccione el distrito donde ser realizara el estudio.</li>
      </ul>
    </div>
  </div>
  <center><h2>Agregar Nuevo Trámite</h2></center>
  <form action="?c=class04ingresotramite&m=agregar" enctype="multipart/form-data" method="post" >

    <div class="container-fluid">
      <div class="col-sm-offset-4 col-sm-4">
        <div class="form-group row">
          <label for="PU04IDTRA">Código del Trámite:</label>
          <input type="text" class="form-control" id="PU04IDTRA" name="PU04IDTRA">
        </div>


        <div class="form-group row">
          <label for="PU04FETRA">Fecha de Revisión de Expediente:</label>
          <input type="date" class="form-control" name="PU04FETRA" id="">
        </div>


        <div class="form-group row">

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
    </div>
    <br><br><br><br><br><br>
    <div class="container-fluid  well   ">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Alerta!</strong> Pasos a seguir.
        <br>
        <ul>
          <li>Seleccione el tipo de acceso.</li>
        </ul>
      </div>
      <div class="form-group">
        <p><b>Accesos :</b></p>
        <?php while ($row = mysqli_fetch_array($result1)):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $row['PU38IDSERVIDUMBRE'];?>" name="pu38servi[]"><?php echo $row['PU38DESCRIPSERVIDUM']; ?>
          </label>
        <?php endwhile; ?>
      </div>
    </div>


    <div class="container-fluid  well   ">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Alerta!</strong> Pasos a seguir.
        <br>
        <ul>
          <li>Seleccione el plan regulador al que pertenece o si esta fuera del plan regulador.</li>
        </ul>
      </div>
      <div class="form-group">
        <p><b>Plan Regulador :</b></p>
        <?php while ($row = mysqli_fetch_array($result2)):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $row['PU26IDPLAN'];?>" name="pu26planreg[]"><?php echo $row['PU26PLNDESC']; ?>
          </label>
        <?php endwhile; ?>
      </div>
    </div>

    <div class="container-fluid  well">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Alerta!</strong> Pasos a seguir.
        <br>
        <ul>
          <li>Si pertenece al plan regulador Nicoya seleccione los ítems.</li>
          <li>Si no, seleccione: No Aplica.</li>
        </ul>
      </div>
      <div class="form-group">
        <p><b>Nicoya :</b></p>
        <?php while ($row = mysqli_fetch_array($result3)):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $row['PU26IDDESCNICOYASAMA'];?>" name="pu26planreg1[]"><?php echo $row['PU26DESCACNICOYASAMA']; ?>
          </label>
        <?php endwhile; ?>
      </div>
    </div>

    <div class="container-fluid  well">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Alerta!</strong> Pasos a seguir.
        <br>
        <ul>
          <li>Si pertenece al plan regulador Samara seleccione los ítems.</li>
          <li>Si no, seleccione: No Aplica.</li>
        </ul>
      </div>
      <div class="form-group">
        <p><b>Sámara :</b></p>
        <?php while ($row = mysqli_fetch_array($result4)):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $row['PU26IDDESCNICOYASAMA'];?>" name="pu26planreg1[]"><?php echo $row['PU26DESCACNICOYASAMA']; ?>
          </label>
        <?php endwhile; ?>
      </div>
    </div>

    <div class="container-fluid  well">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Alerta!</strong> Pasos a seguir.
        <br>
        <ul>
          <li>Seleccione el tipo de afectación de áreas de protección.</li>
          <li>Si no, seleccione: No Aplica.</li>
        </ul>
      </div>
      <div class="form-group">
        <p><b>Afectación de Áreas de Protección :</b></p>
        <?php while ($row = mysqli_fetch_array($result5)):?>
          <label class="checkbox-inline">
            <input type="checkbox" value="<?php echo $row['PU13IDAAP'];?>" name="pu13aap[]"><?php echo $row['PU13DESCAAP']; ?>
          </label>
        <?php endwhile; ?>
      </div>
    </div>

    <div class="container-fluid  well">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Alerta!</strong> Pasos a seguir.
        <br>
        <ul>
          <li>Seleccione la imagen del terreno.</li>
        </ul>
      </div>
      <tr>
        <td><label class="control-label">Imagen Terreno</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
      </tr>
    </div>

    <button type="submit" name="btnsave" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span>  Guardar Trámite</button>
    <a id="regresar" class="btn btn-danger" role="button" href="?c=class04ingresotramite&m=index">Regresar</a>
  </div>
</form>
</div>
